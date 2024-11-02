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
            'id_tanaman' => 1,
            'pin_status' => 1,
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
    }
}
