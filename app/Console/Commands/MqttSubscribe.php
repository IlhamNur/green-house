<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use App\Models\SensorData;

class MqttSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to an MQTT topic and store the data in the database';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $mqtt = new MqttClient('34.101.241.144', 1883, 'laravel-client');

        $mqtt->connect();

        // Subscribe to the topic
        $mqtt->subscribe('mqtt/data1', function (string $topic, string $message) {
            $this->info("Received message: $message");

            $message = preg_replace('/([{,])(\s*)([a-zA-Z_]+)(\s*):/', '$1"$3":', $message);

            // Decode the JSON message
            $data = json_decode($message, true);

            $data = json_decode($message, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->error('Error decoding JSON: ' . json_last_error_msg());
                return;
            }

            // Store the data in the database
            SensorData::create([
                'greenhouse_id' => $data['id_greenhouse'],
                'temperature'   => $data['Suhu'],
                'humidity'      => $data['Kelembaban'],
                'nutrition'     => $data['TDS'],
                'ph'            => $data['ph'],
                'light'         => $data['Light'],
                'water_level'   => $data['Jarak'],
            ]);

            $this->info('Data saved to the database.');
        }, 0);

        $mqtt->loop(true); // Keep the connection alive
        $mqtt->disconnect();
    }
}
