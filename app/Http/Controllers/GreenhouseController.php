<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\MqttClient;
use App\Models\{Greenhouse, Period, PlantList, SensorData};
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GreenhouseController extends Controller
{
    protected $mqttHost = '34.101.88.45';
    protected $mqttPort = 1883;
    protected $mqttClientId = 'laravel-publisher';

    public function index()
    {
        $userId = Auth::id();
        return view('greenhouse-manage', [
            'greenhouses' => Greenhouse::where('user_id', $userId)->orderBy('pin_status', 'desc')->get(),
            'periods' => Period::all(),
            'plant_lists' => PlantList::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'plant_type' => 'required',
        ]);

        $plantThreshold = PlantList::where('plant_name', $data['plant_type'])->firstOrFail();

        $greenhouseData = [
            'name' => $data['name'],
            'user_id' => Auth::id(),
            'pin_status' => 0,
        ];

        $periodData = [
            'plant_type' => $data['plant_type'],
            'temperature' => $plantThreshold->temperature,
            'humidity' => $plantThreshold->humidity,
            'nutrition' => $plantThreshold->nutrition,
            'light' => $plantThreshold->light,
            'ph' => $plantThreshold->ph,
            'water_f' => $plantThreshold->water_f,
            'water_e' => $plantThreshold->water_e,
            'harvest_time' => $plantThreshold->harvest_time,
            'period' => 1,
        ];

        $greenhouse = Greenhouse::create($greenhouseData);
        $periodData['gh_id'] = $greenhouse->id;
        Period::create($periodData);

        $this->publishToMqtt($greenhouse->id, $periodData);

        return redirect()->back()->with('success', 'Greenhouse added successfully!');
    }

    public function add(Request $request, $id)
    {
        $data = $request->validate([
            'plant_type' => 'required',
        ]);

        $plantThreshold = PlantList::where('plant_name', $data['plant_type'])->firstOrFail();
        $periodCount = Period::where('gh_id', $id)->count();

        $periodData = [
            'gh_id' => $id,
            'plant_type' => $data['plant_type'],
            'temperature' => $plantThreshold->temperature,
            'humidity' => $plantThreshold->humidity,
            'nutrition' => $plantThreshold->nutrition,
            'light' => $plantThreshold->light,
            'ph' => $plantThreshold->ph,
            'water_f' => $plantThreshold->water_f,
            'water_e' => $plantThreshold->water_e,
            'harvest_time' => $plantThreshold->harvest_time,
            'period' => $periodCount + 1,
        ];

        Period::create($periodData);
        $this->publishToMqtt($id, $periodData);

        return redirect()->back()->with('success', 'New period added successfully!');
    }

    public function updatePin(Request $request, $id)
    {
        $data = $request->validate(['pin_status' => 'required']);

        if ($data['pin_status'] == 1) {
            Greenhouse::where('pin_status', 1)->update(['pin_status' => 0]);
        }
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
        $this->publishToMqtt($id, $data);

        return redirect()->back()->with('success', 'Greenhouse period updated successfully!');
    }

    public function export($id)
    {
        $sensorData = SensorData::where('period_id', $id)->get();

        $response = new StreamedResponse(function () use ($sensorData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Temperature', 'Humidity', 'Nutrition', 'Light', 'PH', 'Water Level', 'Created At']);

            foreach ($sensorData as $data) {
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

    private function publishToMqtt($id, array $data): void
    {
        $payload = json_encode([
            'ts' => $data['temperature'],
            'tc' => $data['light'],
            'ttds' => $data['nutrition'],
            'tka' => $data['water_e'],
            'tpa' => $data['water_f'],
            'tkl' => $data['humidity']
        ]);

        $mqtt = new MqttClient($this->mqttHost, $this->mqttPort, $this->mqttClientId);
        $mqtt->connect();
        $mqtt->publish("mqtt/datasub{$id}", $payload, 0);
        $mqtt->disconnect();
    }
}
