<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plant_lists')->insert([
            'plant_name' => 'Mustard',
            'picture' => 'assets/img/plants/sawi.jpeg',
            'latin_name' => 'Brassica juncea',
            'temperature' => 28,
            'humidity' => 80,
            'nutrition' => 200,
            'light' => 800,
            'water_f' => 3,
            'water_e' => 6
        ]);
    }
}
