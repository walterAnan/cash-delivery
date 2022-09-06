<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;

class UpdateUser extends Component
{
    protected $state = [];

    public function mount($id)
    {
        $this->state = User::findOrFail($id)->toArray();
    }

    public function updateUser(UpdatesUserProfileInformation $updater)
    {

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function destroy( $updater)
    {
        User::find($updater)->delete();
        return redirect()->route('admin.users.index');
    }
}
