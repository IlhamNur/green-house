<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DB;
use MQTT;

class SubscribeToMQTT implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        try {
            // Connect to MQTT
            $mqtt = MQTT::connection();

            // Subscribe to the 'mqtt/data1' topic and process messages
            $mqtt->subscribe('mqtt/data1', function (string $topic, string $message) {
                $data = json_decode($message, true);
                
                // Insert data into the database
                if ($data && is_array($data)) {
                    DB::table('sensor_data')->insert([
                        'Suhu' => $data['temperature'] ?? null,
                        'Kelembaban' => $data['humidity'] ?? null,
                        'ph' => $data['ph'] ?? null,
                        'soil_moisture' => $data['soil_moisture'] ?? null,
                        'Light' => $data['light_intensity'] ?? null,
                        'id_greenhouse' => $data['id_greenhouse'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }, 0);

            // Run MQTT loop
            $mqtt->loop(true);
        } catch (\Exception $e) {
            \Log::error('MQTT subscription failed: ' . $e->getMessage());
        }
    }
}
