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
            SELECT Lg.id AS id,  LG.name, SD.temperature, SD.humidity, SD.ph, SD.soil_moisture, SD.light_intensity, LG.pin_status
            FROM list_greenhouses AS LG
            LEFT JOIN sensor_data AS SD ON SD.id_greenhouse = LG.id
            WHERE LG.pin_status = 1
            AND SD.id IN (
                SELECT MAX(SD2.id)
                FROM sensor_data AS SD2
                WHERE SD2.id_greenhouse = SD.id_greenhouse
                GROUP BY SD2.id_greenhouse)
        ');

        $thresholds = DB::select('
            SELECT Lg.id, LG.name AS nama ,TJ.temperature AS tTem, TJ.humidity AS tHum, TJ.soil_min AS tSoil, TJ.light_intensity AS tLig
            FROM tanamanjenis AS TJ
            INNER JOIN list_greenhouses AS LG ON Lg.id_tanaman = TJ.id
            WHERE LG.pin_status = 1
        ');

        // Return the welcome view
        return view('welcome', compact('data', 'thresholds'));
    }

}
