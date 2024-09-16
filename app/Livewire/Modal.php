<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\list_greenhouse;


class Modal extends Component
{
    public $greenhouse;
    public $name;

    protected $listeners = ['modalListener'];

    public function modalListener($id)
    {
        $this->greenhouse = list_greenhouse::find($id);
        $this->name = $this->greenhouse->name;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
