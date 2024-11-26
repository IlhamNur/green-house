<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ListGreenhouse extends Component
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
        return view('livewire.list-greenhouse');
    }

    public function fetchData()
    {
        $id = Auth::user()->id;

        // Fetch data from your database table
        $this->data = DB::select('
            SELECT LG.id AS id, LG.name AS greenhouse, LG.pin_status AS pin_status
            FROM list_greenhouses AS LG
            WHERE LG.id_user = ?
        ', [$id]);
    }

    public function updated()
    {
        // Implement auto-refresh every 2 seconds
        $this->fetchData();
    }
}
