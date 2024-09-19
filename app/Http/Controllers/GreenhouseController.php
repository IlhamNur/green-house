<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Greenhouse;
use App\Models\PlantList;
use App\Models\SensorData;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;


class GreenhouseController extends Controller
{
    public function index()
    {
        $greenhouses = Greenhouse::orderBy('pin_status', 'desc')->get();
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

        $data['user_id'] = $user_id;
        $data['temperature'] = $plant_threshold->temperature;
        $data['humidity'] = $plant_threshold->humidity;
        $data['nutrition'] = $plant_threshold->nutrition;
        $data['light'] = $plant_threshold->light;
        $data['ph'] = $plant_threshold->ph;
        $data['water_f'] = $plant_threshold->water_f;
        $data['water_e'] = $plant_threshold->water_e;
        $data['pin_status'] = 0;

        Greenhouse::create($data);

        return redirect()->back()->with('success', 'Greenhouse added successfully!');
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

        return redirect()->back()->with('success', 'Greenhouse updated successfully!');
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
