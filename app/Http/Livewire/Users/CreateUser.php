<?php

namespace App\Http\Livewire\Users;

use App\Actions\Jetstream\AddTeamMember;
use App\Models\Agence;
use App\Models\Team;
use App\Models\User;
use App\Providers\JetstreamServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Events\AddingTeamMember;
use Laravel\Jetstream\Events\TeamMemberAdded;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class CreateUser extends Component
{
    public $state = [];

    public $agences;

    public $validatedData;

    public $agencePrincipale;

    public function mount()
    {
        $this->agences = Agence::all();

        $this->agencePrincipale = Agence::findOrFail('1');
    }

    public function store()
    {
//        dd($this->state);
        $validatedData = Validator::make($this->state, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email'],
//            'agence_id' => ['required', 'numeric', 'exists:agences,id'],
        ],
        [
            'name.required' => 'Le nom de l\'utilisateur est obligatoire'
        ]
        )->validate();

//        dd($validatedData);

        return DB::transaction(function () use ($validatedData) {
            return tap($newUser = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'agence_id' => $this->agencePrincipale->id,
                'password' => Hash::make(DEFAULT_PASSWORD),
                'current_team_id' => DEFAULT_TEAM_ID,
            ]), function () use ($newUser) {
                $team = Team::firstOrFail();
                AddingTeamMember::dispatch($team, $newUser);
                $team->users()->attach(
                    $newUser,
                    ['role' => 'editor']
                );
                TeamMemberAdded::dispatch($team, $newUser);

                return redirect()->route('admin.users.index');
            });
        });

    }



    public function render()
    {
        return view('livewire.users.create-user')->layout('layouts.master');
    }
}
