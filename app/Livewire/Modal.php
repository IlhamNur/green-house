<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\List_Greenhouse;


class Modal extends Component
{
    public $greenhouse;
    public $name;

    protected $listeners = ['modalListener'];

    public function modalListener($id)
    {
        $this->greenhouse = List_Greenhouse::find($id);
        $this->name = $this->greenhouse->name;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
