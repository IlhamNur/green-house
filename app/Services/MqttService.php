<?php

namespace App\Services;

use Mqtt;

class MqttService
{
    // Publish a message to a topic
    public function publish($topic, $message, $qos = 0)
    {
        try {
            Mqtt::publish($topic, $message, $qos);
            Mqtt::disconnect();  // Always disconnect after publishing
        } catch (\Exception $e) {
            throw new \Exception('Error publishing message: ' . $e->getMessage());
        }
    }

    // Subscribe to a topic and listen for messages
    public function subscribe($topic, callable $callback, $qos = 0)
    {
        try {
            Mqtt::subscribe($topic, $callback, $qos);
            Mqtt::loop(true);  // Start listening for messages
        } catch (\Exception $e) {
            throw new \Exception('Error subscribing to topic: ' . $e->getMessage());
        }
    }
}
