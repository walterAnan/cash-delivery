<?php

namespace App\Http\Livewire;

use App\Models\ControlLivraison;
use Livewire\Component;

class Control extends Component
{
    public $controls;

    public function mount(){
        $this->controls = ControlLivraison::all();
    }

    public function render()
    {
        $controls = ControlLivraison::all();
        return view('livewire.control', compact('controls'));
    }
}
