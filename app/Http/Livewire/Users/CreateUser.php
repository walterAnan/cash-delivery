<?php

namespace App\Http\Livewire\Users;

use App\Models\Agence;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateUser extends Component
{
    public $state = [];

    public $agences;

    public $validatedData;

    public function mount()
    {
        $this->agences = Agence::all();
    }

    public function store()
    {
//        dd($this->state);
        $this->validatedData = Validator::make($this->state, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191'],
            'agence_id' => ['required', 'numeric', 'exists:agences,id'],
        ])->validate();

        User::create($this->validatedData);

//        $this->dispatchBrowserEvent('swal:success', [
//            'type' => 'success',
//            'title' => 'Modification effectuée avec succès!',
//            'text' => ''
//        ]);

        return redirect()->route('admin.users.index');
    }


    public function render()
    {
        return view('livewire.users.create-user')->layout('layouts.master');
    }
}
