<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Counter extends Component
{
    public $data;

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
            SELECT LG.name, SD.temperature, SD.humidity, SD.ph, SD.soil_moisture, SD.light_intensity, LG.pin_status
            FROM list_greenhouses AS LG
            LEFT JOIN sensor_data AS SD ON SD.id_greenhouse = LG.id
            WHERE LG.pin_status = 1
        ');
    }

    public function updated()
    {
        // Implement auto-refresh every 2 seconds
        $this->fetchData();
    }
}
