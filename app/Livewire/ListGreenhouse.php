<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


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
        // Fetch data from your database table
        $this->data = DB::select('
            SELECT id,name
            FROM list_greenhouses 
        ');
    }

    public function updated()
    {
        // Implement auto-refresh every 2 seconds
        $this->fetchData();
    }
}
