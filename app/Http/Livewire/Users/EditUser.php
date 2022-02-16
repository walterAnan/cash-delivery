<?php

namespace App\Http\Livewire\Users;

use App\Models\Agence;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditUser extends Component
{
    public $user;

    public $state = [];

    public $agences;

    public $validatedData;

    public function mount(User $user)
    {
        $this->user = $user;

        $this->state = $this->user->toArray();

        $this->agences = Agence::all();
    }

    public function myFunction()
    {
        dd($this->state);
//        $this->validatedData = Validator::make($this->state, [
//            'name' => ['required', 'string', 'max:191'],
//            'email' => ['required', 'email', 'max:191', Rule::unique('users')->ignore($this->user->id)],
//            'agence_id' => ['required', 'numeric', 'exists:agences,id'],
//        ])->validate();

//        $this->user->update($this->validatedData);

//        $this->dispatchBrowserEvent('swal:success', [
//            'type' => 'success',
//            'title' => 'Modification effectuée avec succès!',
//            'text' => ''
//        ]);

//        return redirect()->route('admin.users.index');
    }


    public function resetPassword()
    {
        dd($this->state);
        $this->user->update(['password' => Hash::make(DEFAULT_PASSWORD)]);

        return redirect()->route('admin.users.index');
    }


    public function render()
    {
//        dd($this->state);
        return view('livewire.users.edit-user')->extends('layouts.master');
    }
}
