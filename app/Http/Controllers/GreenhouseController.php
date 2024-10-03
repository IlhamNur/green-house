<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\MqttClient;
use App\Models\Greenhouse;
use App\Models\PlantList;
use App\Models\SensorData;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;


class GreenhouseController extends Controller
{
    public function index()
    {
        $greenhouses = Greenhouse::where('user_id', Auth::user()->id)->orderBy('pin_status', 'desc')->get();
        $plant_lists = PlantList::all();

        return view('greenhouse-manage', ['greenhouses' => $greenhouses, 'plant_lists' => $plant_lists]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $data = $request->validate([
            'name' => 'required',
            'plant_type' => 'required',
        ]);

        $plant_threshold = PlantList::where('plant_name', $data['plant_type'])->first();

        $data['user_id'] = strval($user_id);
        $data['temperature'] = strval($plant_threshold->temperature);
        $data['humidity'] = strval($plant_threshold->humidity);
        $data['nutrition'] = strval($plant_threshold->nutrition);
        $data['light'] = strval($plant_threshold->light);
        $data['ph'] = strval($plant_threshold->ph);
        $data['water_f'] = strval($plant_threshold->water_f);
        $data['water_e'] = strval($plant_threshold->water_e);
        $data['pin_status'] = strval(0);

        $insertData = Greenhouse::create($data);
        $lastId = $insertData->id;


        // Define MQTT server details
        $mqttHost = '34.101.88.45';
        $mqttPort = 1883; // Default MQTT port
        $mqttClientId = 'laravel-publisher';

        // Create an MQTT client instance
        $mqtt = new MqttClient($mqttHost, $mqttPort, $mqttClientId);

        // Connect to the MQTT broker
        $mqtt->connect();

        // Message payload (replace with dynamic data as needed)
        $payload = json_encode([
            'ts'   => $data['temperature'],
            'tc'   => $data['light'],
            'ttds' => $data['nutrition'],
            'tka'  => $data['water_e'],
            'tpa'  => $data['water_f'],
            'tkl'  => $data['humidity']
        ]);

        // Publish the message to the topic
        // $mqtt->publish('mqtt/datasub', $payload, 0); // QoS level 0
        $mqtt->publish('mqtt/datasub' + strval($lastId), $payload, 0); // QoS level 0

        // Disconnect the client after publishing
        $mqtt->disconnect();

        return redirect()->back()->with(['success', 'Greenhouse added successfully!', 'payload' => $payload]);
    }

    public function updatePin(Request $request, $id)
    {
        $data = $request->validate([
            'pin_status' => 'required'
        ]);

        if ($data['pin_status'] == 1) {
            Greenhouse::where('pin_status', 1)->update(['pin_status' => 0]);
        };
        Greenhouse::where('id', $id)->update($data);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Greenhouse::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Greenhouse deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'plant_type' => 'required',
            'temperature' => 'required',
            'humidity' => 'required',
            'nutrition' => 'required',
            'light' => 'required',
            'water_f' => 'required',
            'water_e' => 'required',
        ]);

        Greenhouse::where('id', $id)->update($data);

        // Define MQTT server details
        $mqttHost = '34.101.88.45';
        $mqttPort = 1883; // Default MQTT port
        $mqttClientId = 'laravel-publisher';

        // Create an MQTT client instance
        $mqtt = new MqttClient($mqttHost, $mqttPort, $mqttClientId);

        // Connect to the MQTT broker
        $mqtt->connect();

        // Message payload (replace with dynamic data as needed)
        $payload = json_encode([
            'ts'   => $data['temperature'],
            'tc'   => $data['light'],
            'ttds' => $data['nutrition'],
            'tka'  => $data['water_e'],
            'tpa'  => $data['water_f'],
            'tkl'  => $data['humidity']
        ]);

        // Publish the message to the topic
        // $mqtt->publish('mqtt/datasub', $payload, 0); // QoS level 0
        $mqtt->publish('mqtt/datasub' + strval($id), $payload, 0); // QoS level 0


        // Disconnect the client after publishing
        $mqtt->disconnect();

        return redirect()->back()->with(['success', 'Greenhouse updated successfully!', 'payload' => $payload]);
    }

    public function export($id)
    {
        $sensorDatas = SensorData::where('greenhouse_id', $id)->get();

        $response = new StreamedResponse(function () use ($sensorDatas) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Temperature', 'Humidity', 'Nutriton', 'Light', 'PH', 'Water Level', 'Created At']);

            foreach ($sensorDatas as $data) {
                fputcsv($handle, [
                    $data->temperature,
                    $data->humidity,
                    $data->nutrition,
                    $data->light,
                    $data->ph,
                    $data->water_level,
                    $data->created_at,
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="sensor_data.csv"');

        return $response;
    }
}
