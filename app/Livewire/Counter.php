<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Counter extends Component
{
    public $data;
    public $thresholds;

    public function mount()
    {
        // Fetch initial data on component mount
        $this->fetchData();
    }

    public function render()
    {
        // Render the Livewire view with data
        return view('livewire.counter');
    }

    public function fetchData()
    {
        // Fetch data from your database table
        $this->data = DB::select('
            SELECT LG.id AS id, LG.name, SD.temperature, SD.humidity, SD.ph, SD.soil_moisture, SD.light_intensity, LG.pin_status
            FROM list_greenhouses AS LG
            LEFT JOIN sensor_data AS SD ON SD.id_greenhouse = LG.id
            WHERE LG.pin_status = 1
            AND SD.id IN (
                SELECT MAX(SD2.id)
                FROM sensor_data AS SD2
                WHERE SD2.id_greenhouse = SD.id_greenhouse
                GROUP BY SD2.id_greenhouse)
        ');
        $this->thresholds = DB::select('
            SELECT LG.id, LG.name AS nama ,TJ.temperature AS tTem, TJ.humidity AS tHum, TJ.soil_min AS tSoil, TJ.light_intensity AS tLig
            FROM tanamanjenis AS TJ
            INNER JOIN period_greenhouses AS PD ON PD.id_tanaman = TJ.id_user
            INNER JOIN list_greenhouses AS LG ON LG.id = PD.id_greenhouse
            WHERE LG.pin_status = 1
        ');
    }

    public function updated()
    {
        // Implement auto-refresh every 2 seconds
        $this->fetchData();
    }
}
