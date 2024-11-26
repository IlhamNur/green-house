<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GreenhoseManage extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
        DB::table('list_greenhouses')->insert([
            'name' => 'greenhouseku',
            'id_user' => 1,
            'pin_status' => 1,
        ]);

        DB::table('list_greenhouses')->insert([
            'name' => 'greenhousenya',
            'id_user' => 1,
            'pin_status' => 1,
        ]);


        //
        DB::table('period_greenhouses')->insert([
            'id_greenhouse' => 1,
            'id_tanaman' => 1,
            'tanam_time' => "2024-11-9",
            'done' => 0,
        ]);

        DB::table('period_greenhouses')->insert([
            'id_greenhouse' => 2,
            'id_tanaman' => 1,
            'tanam_time' => "2024-11-9",
            'done' => 0,
        ]);


        //
        DB::table('sensor_data')->insert([
            'id_greenhouse' => 1,
            'id_period' => 1,
            'temperature' => 25,
            'humidity' => 89,
            'ph' => 8,
            'soil_moisture' => 30,    
            'light_intensity' => 900, 
        ]);
        
        DB::table('sensor_data')->insert([
            'id_greenhouse' => 2,
            'id_period' => 2,
            'temperature' => 25,
            'humidity' => 89,
            'ph' => 8,
            'soil_moisture' => 30,    
            'light_intensity' => 900, 
        ]);


        //
        DB::table('tanamanjenis')->insert([
            'id_user' => 1,
            'name' => 'sawi',
            'temperature' => 24,
            'humidity' => 60,
            'light_intensity' => 1500,
            'soil_max' => 30,
            'soil_min' => 20,
        ]);
    }
}
