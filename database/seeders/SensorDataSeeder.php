<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sensor_datas')->insert([
            'greenhouse_id' => 1,
            'temperature' => 28,
            'humidity' => 80,
            'nutrition' => 200,
            'light' => 800,
            'ph' => 8,
            'water_level' => 3
        ]);

        DB::table('sensor_datas')->insert([
            'greenhouse_id' => 1,
            'temperature' => 29,
            'humidity' => 81,
            'nutrition' => 210,
            'light' => 889,
            'ph' => 7,
            'water_level' => 3
        ]);

        DB::table('sensor_datas')->insert([
            'greenhouse_id' => 1,
            'temperature' => 30,
            'humidity' => 78,
            'nutrition' => 250,
            'light' => 800,
            'ph' => 6,
            'water_level' => 4
        ]);

        DB::table('sensor_datas')->insert([
            'greenhouse_id' => 1,
            'temperature' => 35,
            'humidity' => 75,
            'nutrition' => 280,
            'light' => 750,
            'ph' => 8,
            'water_level' => 4
        ]);

        DB::table('sensor_datas')->insert([
            'greenhouse_id' => 1,
            'temperature' => 29,
            'humidity' => 85,
            'nutrition' => 290,
            'light' => 810,
            'ph' => 8,
            'water_level' => 5
        ]);

        DB::table('sensor_datas')->insert([
            'greenhouse_id' => 1,
            'temperature' => 30,
            'humidity' => 84,
            'nutrition' => 300,
            'light' => 859,
            'ph' => 8,
            'water_level' => 5
        ]);

        DB::table('sensor_datas')->insert([
            'greenhouse_id' => 1,
            'temperature' => 36,
            'humidity' => 90,
            'nutrition' => 260,
            'light' => 860,
            'ph' => 8,
            'water_level' => 6
        ]);
    }
}
