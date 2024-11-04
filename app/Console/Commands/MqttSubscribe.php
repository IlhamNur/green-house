<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use App\Models\SensorData;
use App\Models\Period;

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
        $mqtt = $this->setupMqttClient();

        try {
            $mqtt->connect();
            $this->subscribeToTopic($mqtt);
            $mqtt->loop(true); // Keep the connection alive
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        } finally {
            $mqtt->disconnect();
        }
    }

    /**
     * Sets up and returns an MQTT client.
     *
     * @return MqttClient
     */
    private function setupMqttClient(): MqttClient
    {
        return new MqttClient('34.101.88.45', 1883, 'laravel-client');
    }

    /**
     * Subscribes to the MQTT topic and handles incoming messages.
     *
     * @param MqttClient $mqtt
     */
    private function subscribeToTopic(MqttClient $mqtt)
    {
        $mqtt->subscribe('mqtt/data1', function (string $topic, string $message) {
            $this->info("Received message: $message");

            $message = preg_replace('/([{,])(\s*)([a-zA-Z_]+)(\s*):/', '$1"$3":', $message);
            $data = json_decode($message, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->error('Error decoding JSON: ' . json_last_error_msg());
                return;
            }

            // Clean and validate the data
            $cleanData = [
                'greenhouse_id' => $data['id_greenhouse'],
                'temperature'   => $this->cleanNumericValue($data['Suhu'], 'Suhu'),
                'humidity'      => $this->cleanNumericValue($data['Kelembaban'], 'Kelembaban'),
                'nutrition'     => $this->cleanNumericValue($data['TDS'], 'TDS'),
                'ph'            => $this->cleanNumericValue($data['ph'], 'ph'),
                'light'         => $this->cleanNumericValue($data['Light'], 'Light'),
                'water_level'   => $this->cleanNumericValue($data['Jarak'], 'Jarak')
            ];



            // Fetch the period
            $period = Period::where('gh_id', $data['id_greenhouse'])
                ->latest('period')
                ->first();

            if (!$period) {
                $this->error('Period not found for greenhouse ID: ' . $data['id_greenhouse']);
                return;
            }

            $cleanData['period_id'] = $period->id;

            try {
                $sensorData = SensorData::create($cleanData);
                $this->info('Data saved successfully. ID: ' . $sensorData->id);

                // Log the saved data for debugging
                $this->info('Saved data: ' . print_r($cleanData, true));
            } catch (\Exception $e) {
                $this->error('Error saving to database: ' . $e->getMessage());
                // Log the full stack trace for debugging
                $this->error($e->getTraceAsString());
            }
        }, 0);
    }

    /**
     * Clean numeric values, converting "NAN" to specific defaults or 0 for other fields
     *
     * @param mixed $value
     * @param string $field
     * @return float|null
     */
    private function cleanNumericValue($value, $field)
    {
        // Remove any whitespace
        $value = trim($value);

        // Check for "NAN" or empty values and set defaults for specific fields
        if ($value === 'NAN' || $value === '' || $value === null) {
            if ($field === 'Suhu') {
                return 28; // Default for temperature
            } elseif ($field === 'Kelembaban') {
                return 80; // Default for humidity
            }
            return 0; // or return 0.0 if you prefer to store 0 instead of null for other fields
        }

        // Convert to float
        return floatval($value);
    }
}
