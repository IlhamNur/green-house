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
            SELECT SD.temperature, SD.humidity, SD.ph, SD.soil_moisture, SD.light_intensity, LG.pin_status
            FROM sensor_data AS SD
            INNER JOIN list_greenhouses AS LG ON SD.id_greenhouse = LG.id
            WHERE pin_status = 1
        ');

        // Subscribe to the 'mqtt/data1' topic
        $mqtt = MQTT::connection();

        // Subscribe to the topic and listen for data
        $mqtt->subscribe('mqtt/data1', function (string $topic, string $message) {
            // Decode the JSON message
            $data = json_decode($message, true);

            // Ensure the JSON data is valid
            if ($data && is_array($data)) {
                // Insert the data into the sensor_data table
                DB::table('sensor_data')->insert([
                    'Suhu' => $data['temperature'] ?? null,
                    'Kelembaban' => $data['humidity'] ?? null,
                    'ph' => $data['ph'] ?? null,
                    'soil_moisture' => $data['soil_moisture'] ?? null,
                    'Light' => $data['light_intensity'] ?? null,
                    'id_greenhouse' => $data['id_greenhouse'] ?? null, // Ensure you have this data in your JSON
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }, 0); // QoS level 0

        // Start listening for MQTT messages
        $mqtt->loop(true); // Runs the MQTT event loop to process incoming messages

        // Return the welcome view
        return view('welcome', compact('data'));
    }
}
