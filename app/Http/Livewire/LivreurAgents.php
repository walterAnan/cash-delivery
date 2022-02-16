<?php

namespace App\Http\Livewire;

use App\Models\AgentLivreur;
use App\Models\Livreur;
use Livewire\Component;

class LivreurAgents extends Component
{
    public $livreurs;
    public $agents;

    public $selectedLivreur = null;
    public $selectedAgent = null;


    public function mount()
    {
        // Liste des livreurs pour alimenter le dropdown
        $this->livreurs = Livreur::all();

        $this->agents = collect();
    }

    public function updatedSelectedLivreur($livreur_id)
    {
        $this->agents = AgentLivreur::where('livreur_id', $livreur_id)->get();
//        $this->selected = null;
    }


    public function render()
    {
        return view('livewire.livreur-agents');
    }
}
