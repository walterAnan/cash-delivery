<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users;

    /**
     * On récupère la liste des utilisateurs au chargement de la page
     */
    public function mount() {
        $this->users = User::where('id', '<>', 1)
            ->with('agence:id,nomAgence')
            ->get();
    }

    public function render()
    {
//        dd($this->users->toArray());
        return view('livewire.users.index')->layout('layouts.master');
    }
}
