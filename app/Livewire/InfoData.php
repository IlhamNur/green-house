<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class InfoData extends Component
{
    public $id;
    public $data;
    public $threshold;

    public function mount($id)
    {
        // Fetch initial data on component mount
        $this->id = $id;
        $this->fetchData();
    }

    public function render()
    {
        // Render the Livewire view with data
        return view('livewire.info-data');
    }

    public function fetchData()
    {
        // Fetch data from your database table
        $this->data = DB::selectone('
            SELECT SD.temperature, SD.humidity, SD.ph, SD.soil_moisture, SD.light_intensity, LG.pin_status, SD.id_greenhouse AS id
            FROM sensor_data AS SD
            INNER JOIN list_greenhouses AS LG ON SD.id_greenhouse = LG.id
            WHERE SD.id_greenhouse = ?
            ORDER BY SD.id DESC
            LIMIT 1
        ', [$this->id]);

        $this->threshold = DB::selectone('
            SELECT Lg.id, LG.name AS nama ,TJ.temperature AS tTem, TJ.humidity AS tHum, TJ.soil_min AS tSoil, TJ.light_intensity AS tLig
            FROM tanamanjenis AS TJ
            INNER JOIN list_greenhouses AS LG ON Lg.id_tanaman = TJ.id
            WHERE LG.id = ?
        ', [$this->id]);
    }

    public function updated()
    {
        // Implement auto-refresh every 2 seconds
        $this->fetchData();
    }
}
