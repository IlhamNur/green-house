<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GreenhouseSeeder extends Seeder
{
    /**
     * Run the database seed
     */
    public function run(): void
    {
        DB::table('greenhouses')->insert([
            'name' => 'Greenhouse Sawi',
            'user_id' => 2,
            'plant_type' => 'Sawi',
            'temperature' => 28,
            'humidity' => 80,
            'nutrition' => 200,
            'light' => 800,
            'water_f' => 3,
            'water_e' => 6,
            'pin_status' => 1
        ]);
    }
}
