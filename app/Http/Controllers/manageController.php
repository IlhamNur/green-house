<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Facades\MQTT;
use App\Models\List_Greenhouse;

class manageController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $data = DB::select('
            SELECT LG.name AS greenhouse, TJ.name AS tanaman
            FROM list_greenhouses AS LG
            INNER JOIN tanamanjenis AS TJ ON LG.id_tanaman = TJ.id
            WHERE LG.id_user = ?
        ', [$id]);
        // dd($data);

        return view('manage-greenhouse', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'id_tanaman' => 'required', 
        ]);


        $request['pin_status'] = 0;
        $request['id_user'] = Auth::user()->id;

        List_Greenhouse::create($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post created successfully.');
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
        $this->data = DB::select('
            SELECT SD.temperature AS temperature, SD.humidity AS humidity, SD.ph, SD.soil_moisture AS soil_moisture, SD.light_intensity AS light_intensity, LG.pin_status AS pin_status, SD.id_greenhouse AS id
            FROM sensor_data AS SD
            INNER JOIN list_greenhouses AS LG ON SD.id_greenhouse = LG.id
            WHERE SD.id_greenhouse = ?
        ', [$id]);
    
        $data = List_Greenhouse::find($id);
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
        $data = DB::selectone('
            SELECT SD.temperature, SD.humidity, SD.ph, SD.soil_moisture, SD.light_intensity, LG.pin_status
            FROM sensor_data AS SD
            INNER JOIN list_greenhouses AS LG ON SD.id_greenhouse = LG.id
            WHERE LG.id = ?
            ORDER BY created_at DESC
        ', [$id]);

        return view('info-greenhouse', compact('data'));

    }
    public function publishtresh(Request $request, $id)
    {
        $mqtt = MQTT::connection(); // Use default connection

        $query = 
        "
                SELECT TJ.temperature AS temperature, TJ.humidity AS humidity, TJ.soil_max AS soil_max, TJ.soil_min AS soil_min, TJ.light_intensity AS light_intensity
                FROM list_greenhouses AS GH 
                INNER JOIN tanamanjenis AS TJ ON GH.id_tanaman = TJ.id
                WHERE GH.id = ? 
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
    
}
