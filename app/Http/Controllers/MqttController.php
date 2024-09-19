<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\DB;


class MqttController extends Controller
{
   // Publish a message to an MQTT topic
   public function publishMessage()
   {
        $mqtt = MQTT::connection(); // Use default connection

        $query = 
        "
                SELECT TJ.temperature AS temperature, TJ.humidity AS humidity, TJ.soil_max AS soil_max, TJ.soil_min AS soil_min, TJ.light_intensity AS light_intensity
                FROM list_greenhouses AS GH 
                INNER JOIN tanamanjenis AS TJ ON GH.id_tanaman = TJ.id
                WHERE GH.id = 1 
        ";

        $result = DB::selectone($query);

        // Check if the result is not null
        if ($result) {
            // Convert the result to an associative array and then to a JSON string
            $pub_message = json_encode([
                'temp' => (string)$result->temperature,
                'humid' => (string)$result->humidity,
                'smax' => (string)$result->soil_max,
                'smin' => (string)$result->soil_min,
                'lux' => (string)$result->light_intensity
            ]);

            // Publish to topic 'mqtt/datasub' with the fetched data
            $mqtt->publish('mqtt/datasub', $pub_message, 0);
            $mqtt->disconnect();  // Disconnect after publishing

            return "Message published successfully!";
        }

        return "No data found!";
   }

   // Subscribe to an MQTT topic
   public function subscribeToTopic()
   {
       $mqtt = MQTT::connection();  // Use default connection

       // Subscribe to the topic 'mqtt/data1' and listen for messages
       $mqtt->subscribe('mqtt/data1', function ($topic, $message) {
           echo "Received message on topic [{$topic}]: {$message}";
       }, 0);

       // Keep the subscription alive and listen for messages
       $mqtt->loop(true);
   }
}
