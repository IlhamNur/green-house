<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpMqtt\Client\Facades\MQTT;
use App\Models\TanamanJenis;


class DataSensor extends Controller
{
    public function welcome()
    {
        // Fetch pinned greenhouse data
        $data = DB::selectone('
            SELECT LG.name, SD.temperature, SD.humidity, SD.ph, SD.soil_moisture, SD.light_intensity, LG.pin_status
            FROM list_greenhouses AS LG
            LEFT JOIN sensor_data AS SD ON SD.id_greenhouse = LG.id
            WHERE LG.pin_status = 1
        ');

        // Return the welcome view
        return view('welcome', compact('data'));
    }

}
