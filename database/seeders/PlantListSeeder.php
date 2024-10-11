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
            'picture' => 'assets/img/plants/sawi.png',
            'latin_name' => 'Brassica juncea',
            'temperature' => 24,
            'humidity' => 60,
            'nutrition' => 1050,
            'light' => 15000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 40
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Lettuce',
            'picture' => 'assets/img/plants/selada.png',
            'latin_name' => 'Lactuca sativa',
            'temperature' => 24,
            'humidity' => 50,
            'nutrition' => 560,
            'light' => 15000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 60
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Spinach',
            'picture' => 'assets/img/plants/bayam.png',
            'latin_name' => 'Spinacia oleracea',
            'temperature' => 22,
            'humidity' => 50,
            'nutrition' => 1260,
            'light' => 12000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 40
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Water Spinach',
            'picture' => 'assets/img/plants/Kangkung.png',
            'latin_name' => 'Ipomoea aquatica',
            'temperature' => 26,
            'humidity' => 50,
            'nutrition' => 1050,
            'light' => 15000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 30
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Basil',
            'picture' => 'assets/img/plants/kemangi.png',
            'latin_name' => 'Ocimum basilicum',
            'temperature' => 25,
            'humidity' => 40,
            'nutrition' => 1260,
            'light' => 20000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 75
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Tomato',
            'picture' => 'assets/img/plants/tomat.png',
            'latin_name' => 'Solanum lycopersicum',
            'temperature' => 26,
            'humidity' => 60,
            'nutrition' => 1400,
            'light' => 15000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 85
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Celery',
            'picture' => 'assets/img/plants/seledri.png',
            'latin_name' => 'Apium graveolens',
            'temperature' => 21,
            'humidity' => 55,
            'nutrition' => 1260,
            'light' => 15000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 120
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Cucumber',
            'picture' => 'assets/img/plants/mentimun.png',
            'latin_name' => 'Cucumis sativus',
            'temperature' => 26,
            'humidity' => 60,
            'nutrition' => 1190,
            'light' => 25000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 70
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Bok Choy',
            'picture' => 'assets/img/plants/pakcoy.png',
            'latin_name' => 'Brassica rapa chinensis',
            'temperature' => 22,
            'humidity' => 50,
            'nutrition' => 1050,
            'light' => 10000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 60
        ]);

        DB::table('plant_lists')->insert([
            'plant_name' => 'Broccoli',
            'picture' => 'assets/img/plants/brokoli.png',
            'latin_name' => 'Brassica oleracea italica',
            'temperature' => 24,
            'humidity' => 50,
            'nutrition' => 1960,
            'light' => 15000,
            'water_f' => 4,
            'water_e' => 7,
            'harvest_time' => 100
        ]);
    }
}
