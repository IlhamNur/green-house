<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\List_Greenhouse;

class EditGreenhouseModal extends Component
{
    public $greenhouse;
    public $name;

    protected $listeners = ['editGreenhouse'];

    public function editGreenhouse($id)
    {
        $this->greenhouse = List_Greenhouse::find($id);
        $this->name = $this->greenhouse->name;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function updateGreenhouse()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->greenhouse->update([
            'name' => $this->name,
        ]);

        $this->dispatchBrowserEvent('hide-modal');
        $this->emit('greenhouseUpdated');
    }

    public function render()
    {
        return view('livewire.edit-greenhouse-modal');
    }
}
