<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class ShowUser extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
//        dd($this->user);
        return view('livewire.users.show-user')->layout('layouts.master');
    }
}
