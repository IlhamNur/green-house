<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\MqttClient;
use App\Models\Greenhouse;
use App\Models\Period;
use App\Models\PlantList;
use App\Models\SensorData;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;


class GreenhouseController extends Controller
{
    public function index()
    {
        $greenhouses = Greenhouse::where('user_id', Auth::user()->id)->orderBy('pin_status', 'desc')->get();
        $periods = Period::all();
        $plant_lists = PlantList::all();

        return view('greenhouse-manage', ['greenhouses' => $greenhouses, 'periods' => $periods, 'plant_lists' => $plant_lists]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $data = $request->validate([
            'name' => 'required',
        ]);

        $data1 = $request->validate([
            'plant_type' => 'required',
        ]);

        $plant_threshold = PlantList::where('plant_name', $data1['plant_type'])->first();

        $data['user_id'] = strval($user_id);
        $data1['temperature'] = strval($plant_threshold->temperature);
        $data1['humidity'] = strval($plant_threshold->humidity);
        $data1['nutrition'] = strval($plant_threshold->nutrition);
        $data1['light'] = strval($plant_threshold->light);
        $data1['ph'] = strval($plant_threshold->ph);
        $data1['water_f'] = strval($plant_threshold->water_f);
        $data1['water_e'] = strval($plant_threshold->water_e);
        $data['pin_status'] = strval(0);
        $data1['harvest_time'] = strval($plant_threshold->harvest_time);
        $data1['period'] = strval(1);

        $insertData = Greenhouse::create($data);
        $lastId = $insertData->id;

        $data1['gh_id'] = strval($lastId);

        Period::create($data1);

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
            'ts'   => $data1['temperature'],
            'tc'   => $data1['light'],
            'ttds' => $data1['nutrition'],
            'tka'  => $data1['water_e'],
            'tpa'  => $data1['water_f'],
            'tkl'  => $data1['humidity']
        ]);

        // Publish the message to the topic
        // $mqtt->publish('mqtt/datasub', $payload, 0); // QoS level 0
        $mqtt->publish('mqtt/datasub' . strval($lastId), $payload, 0); // QoS level 0

        // Disconnect the client after publishing
        $mqtt->disconnect();

        return redirect()->back()->with(['success', 'Greenhouse added successfully!', 'payload' => $payload]);
    }

    public function add(Request $request, $id)
    {
        $data = $request->validate([
            'plant_type' => 'required',
        ]);

        $plant_threshold = PlantList::where('plant_name', $data['plant_type'])->first();
        $period = Period::where('gh_id', $id)->count();

        $data['temperature'] = strval($plant_threshold->temperature);
        $data['humidity'] = strval($plant_threshold->humidity);
        $data['nutrition'] = strval($plant_threshold->nutrition);
        $data['light'] = strval($plant_threshold->light);
        $data['ph'] = strval($plant_threshold->ph);
        $data['water_f'] = strval($plant_threshold->water_f);
        $data['water_e'] = strval($plant_threshold->water_e);
        $data['pin_status'] = strval(0);
        $data['harvest_time'] = strval($plant_threshold->harvest_time);
        $data['period'] = strval($period + 1);
        $data['gh_id'] = strval($id);

        Period::create($data);

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
        $mqtt->publish('mqtt/datasub' . strval($id), $payload, 0); // QoS level 0

        // Disconnect the client after publishing
        $mqtt->disconnect();

        return redirect()->back()->with(['success', 'New period added successfully!', 'payload' => $payload]);
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
        Period::where('gh_id', $id)->delete();

        return redirect()->back()->with('success', 'Greenhouse deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'temperature' => 'required',
            'humidity' => 'required',
            'nutrition' => 'required',
            'light' => 'required',
            'water_f' => 'required',
            'water_e' => 'required',
            'harvest_time' => 'required'
        ]);

        Period::where('id', $id)->update($data);

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
        $mqtt->publish('mqtt/datasub' . strval($id), $payload, 0); // QoS level 0


        // Disconnect the client after publishing
        $mqtt->disconnect();

        return redirect()->back()->with(['success', 'Greenhouse period updated successfully!', 'payload' => $payload]);
    }

    public function export($id)
    {
        $sensorDatas = SensorData::where('period_id', $id)->get();

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
