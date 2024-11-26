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
        $this->data = DB::select('
            SELECT PG.id AS id, TJ.name AS nama, PG.panen_time AS panen, PG.tanam_time AS tanam, PG.done AS done
            FROM period_greenhouses AS PG 
            INNER JOIN tanamanjenis AS TJ ON TJ.id = PG.id_tanaman
            WHERE PG.id_greenhouse = ?
        ', [$this->id]);

        $this->threshold = DB::selectone('
            SELECT LG.id, LG.name AS nama ,TJ.temperature AS tTem, TJ.humidity AS tHum, TJ.soil_min AS tSoil, TJ.light_intensity AS tLig
            FROM tanamanjenis AS TJ
            INNER JOIN period_greenhouses AS PD ON PD.id_tanaman = TJ.id_user
            INNER JOIN list_greenhouses AS LG ON LG.id = PD.id_greenhouse
            WHERE LG.id = ?
        ', [$this->id]);
    }

    public function updated()
    {
        // Implement auto-refresh every 2 seconds
        $this->fetchData();
    }
}
