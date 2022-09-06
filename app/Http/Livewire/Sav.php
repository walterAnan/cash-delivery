<?php

namespace App\Http\Livewire;

use App\Models\DemandeLivraison;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Sav extends Component
{
    use withPagination;
    public string $search = '';
    public $demande;


    public function mount()
    {
        $this->demande = collect($this->demande);

    }

//    public function updatedSearch($value)
//    {
//        $this->demande = DemandeLivraison::where('ref_operation', 'like', '%'.$value.'%')->first();
//    }

    public function getDemande()
    {
        $this->demande = DemandeLivraison::where('ref_operation', $this->search)->get();
        $this->search = '';

    }

    public function render()
    {
        return view('livewire.sav');
    }
}
