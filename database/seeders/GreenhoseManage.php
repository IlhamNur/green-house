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
            'name' => 'sawi',
            'id_user' => 1,
            'id_tanaman' => 1,
        ]);

        //
        DB::table('sensor_data')->insert([
            'id_greenhouse' => 1,
            'temperature' => 25,
            'humidity' => 89,
            'ph' => 8,
            'soil_moisture' => 30,    
            'light_intensity' => 900, 
        ]);

        //
        //
        DB::table('tanamanjenis')->insert([
            'name' => 'sawi',
            'temperature' => 20,
            'humidity' => 80,
            'soil_max' => 30,
            'soil_min' => 8,    
            'light_intensity' => 800,    
        ]);
    }
}
