@extends('layouts.master')
@section('page-header')
    <h2 class="h4 font-weight-bold">
        {{ __('Team Settings') }}
    </h2>
@endsection

@section('content')
    <div>
        @livewire('teams.update-team-name-form', ['team' => $team])

        @livewire('teams.team-member-manager', ['team' => $team])

        @if (Gate::check('delete', $team) && ! $team->personal_team)
            <x-jet-section-border />

            <div>
                @livewire('teams.delete-team-form', ['team' => $team])
            </div>
        @endif
    </div>

    <!-- A ne pas supprimer -->
    </div>
    </div>
    <!-- End Main Content-->
@endsection
