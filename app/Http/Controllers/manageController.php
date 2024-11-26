<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Facades\MQTT;
use App\Models\List_Greenhouse;
use App\Models\Period_Greenhouse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class manageController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $data = DB::select('
            SELECT LG.id AS id, LG.name AS greenhouse, LG.pin_status AS pin_status
            FROM list_greenhouses AS LG
            WHERE LG.id_user = ?
        ', [$id]);

        return view('manage-greenhouse', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'id_tanaman' => 'required', 
        ]);


        $request['id_user'] = Auth::user()->id;

        $gh = List_Greenhouse::create(
            ([
                'name' => $validatedData['name'],
                'pin_status' => 0,
                'id_user' => Auth::user()->id,
            ])
        );

        Period_Greenhouse::create(
            ([
                'id_greenhouse' => $gh -> id,
                'id_tanaman' => $validatedData['id_tanaman'],
                'tanam_time' => now(),
            ])
        );
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post created successfully.');
    }

    public function storeperiode(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_tanaman' => 'required', 
        ]);

        // Check the count of records for the given id_greenhouse
        $recordCount = DB::table('period_greenhouses')
        ->where('id_greenhouse', $id)
        ->count();

        // Update done = 1 only if there is more than one record
        if ($recordCount > 0) {
            DB::table('period_greenhouses')
                ->where('id_greenhouse', $id)
                ->where('done', 0) // Only update records that are not already done
                ->update([
                    'done' => 1,
                    'panen_time' => now(), 
                ]);
        }

        DB::table('period_greenhouses')->insert([
            'id_greenhouse' => $id,
            'id_tanaman' => $validatedData['id_tanaman'],
            'tanam_time' => now(), 
            'done' => 0, 
        ]);

        return redirect()->back()->with('success', 'Post created successfully.');
    }

    public function endperiod($id)
    {
        $data = 
        DB::table('period_greenhouses')
        ->where('id', $id)
        ->update(['done' => 1, 'panen_time' => now()]);
        return redirect()->back()->with('success', 'Post deleted successfully');
    }


    public function editperiod(Request $request, $id)
    {
        // $mqtt = MQTT::connection();

        $query = DB::Select(
        "
                SELECT TJ.temperature AS temperature, TJ.humidity AS humidity, TJ.soil_max AS soil_max, TJ.soil_min AS soil_min, TJ.light_intensity AS light_intensity
                FROM period_greenhouses AS PG
                INNER JOIN tanamanjenis AS TJ ON PG.id_tanaman = TJ.id
                WHERE PG.id = ?             
        ", [$id]);

        $validatedData = $request->validate([
            'edit_id_tanaman' => 'required', 
        ]);
        
        $data = period_greenhouse::find($id);
        $data->update(['id_tanaman' => $validatedData['edit_id_tanaman']]);

        // Check if the result is not null
        // if ($data) {
        //     // Convert the result to an associative array and then to a JSON string
        //     $pub_message = json_encode([
        //         'temp' => (string)$data->temperature,
        //         'humid' => (string)$data->humidity,
        //         'smax' => (string)$data->soil_max,
        //         'smin' => (string)$data->soil_min,
        //         'lux' => (string)$data->light_intensity
        //     ]);
        //     // Publish to topic 'mqtt/datasub' with the fetched data
        //     $mqtt->publish('mqtt/datasub', $pub_message, 0);
        //     $mqtt->disconnect();  // Disconnect after publishing
        // }
        
        return redirect()->back()->with('success', 'Post deleted successfully');
    }


    public function destroy($id)
    {
        $data = List_Greenhouse::find($id);
        $data->delete();
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post deleted successfully');
    }


    public function edit($id)
    {
        // Fetch data from your database table
        $data = DB::select('
            SELECT PG.id_greenhouse AS idgh, PG.id AS id, TJ.name AS nama, PG.panen_time AS panen, PG.tanam_time AS tanam, PG.done AS done
            FROM period_greenhouses AS PG 
            INNER JOIN tanamanjenis AS TJ ON TJ.id = PG.id_tanaman
            WHERE PG.id_greenhouse = ?
        ', [$id]);

        // dd($data);
    
        return view('info-greenhouse', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|max:255',
        'id_tanaman' => 'required',
        ]);
        $request['id_user'] = Auth::user()->id;
        
        $data = List_Greenhouse::find($id);
        $data->update($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post updated successfully.');
    }


    public function pin(Request $request, $id)
    {
        $greenhouse = List_Greenhouse::find($id);

        // Update the pin_status to 1
        $greenhouse->pin_status = 1;
        $greenhouse->save();
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'Pin status updated successfully');
    }

    public function unpin(Request $request, $id)
    {
        $greenhouse = List_Greenhouse::find($id);

        // Update the pin_status to 1
        $greenhouse->pin_status = 0;
        $greenhouse->save();
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'Pin status updated successfully');
    }

    public function infodata(Request $request, $id)
    {
        $data = DB::select('
            SELECT PG.id AS id, TJ.name AS nama, PG.panen_time AS panen, PG.tanam_time AS tanam, PG.done AS done
            FROM period_greenhouses AS PG 
            INNER JOIN tanamanjenis AS TJ ON TJ.id = PG.id_tanaman
            WHERE PG.id_greenhouse = ?
        ', [$id]);

        $threshold = DB::selectone('
            SELECT LG.id, LG.name AS nama ,TJ.temperature AS tTem, TJ.humidity AS tHum, TJ.soil_min AS tSoil, TJ.light_intensity AS tLig
            FROM tanamanjenis AS TJ
            INNER JOIN period_greenhouses AS PD ON PD.id_tanaman = TJ.id_user
            INNER JOIN list_greenhouses AS LG ON LG.id = PD.id_greenhouse
            WHERE LG.id = ?
        ', [$id]);

        return view('info-greenhouse', compact('data', 'threshold'));

    }


    public function publishtresh(Request $request, $id)
    {
        $mqtt = MQTT::connection(); // Use default connection

        $query = 
        "
                SELECT TJ.temperature AS temperature, TJ.humidity AS humidity, TJ.soil_max AS soil_max, TJ.soil_min AS soil_min, TJ.light_intensity AS light_intensity
                FROM period_greenhouses AS PG
                INNER JOIN tanamanjenis AS TJ ON PG.id_tanaman = TJ.id
                WHERE PG.id = 1             
        ";

        $data = DB::selectone($query, [$id]);

        // Check if the result is not null
        if ($data) {
            // Convert the result to an associative array and then to a JSON string
            $pub_message = json_encode([
                'temp' => (string)$data->temperature,
                'humid' => (string)$data->humidity,
                'smax' => (string)$data->soil_max,
                'smin' => (string)$data->soil_min,
                'lux' => (string)$data->light_intensity
            ]);

            // Publish to topic 'mqtt/datasub' with the fetched data
            $mqtt->publish('mqtt/datasub', $pub_message, 0);
            $mqtt->disconnect();  // Disconnect after publishing

            return view('manage-greenhouse', compact('data'));
        }


    }

    public function exportsensordata($id)
    {
        $sensorData = 
        DB::table('sensor_data') 
        -> where('id_period', $id)
        ->get();

        $response = new StreamedResponse(function () use ($sensorData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Temperature', 'Humidity', 'Soil Moisture', 'Light', 'PH', 'Created At']);

            foreach ($sensorData as $data) {
                fputcsv($handle, [
                    $data->temperature,
                    $data->humidity,
                    $data->soil_moisture,
                    $data->light_intensity,
                    $data->ph,
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
