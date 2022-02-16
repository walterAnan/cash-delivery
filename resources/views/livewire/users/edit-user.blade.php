{{--@extends('layouts.master')--}}

@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Utilisateurs</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.users.index')}}">Utilisateurs</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modification</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->
@endsection

@section('content')
    <x-jet-form-section submit="myFunction">
        <x-slot name="title">
            {{ __('Modification') }}
        </x-slot>

        <x-slot name="form">

            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="mb-3">
                    <x-jet-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2">
                        <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                    </div>

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif

            <div class="w-md-75">
                <!-- Name -->
                <div class="mb-3">
                    <x-jet-label for="name" value="{{ __('Nom') }}" />
                    <x-jet-input id="name" type="text" value="{{ $this->state['name'] }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" />
                    <x-jet-input-error for="name" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" value="{{ $this->state['email'] }}" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                    <x-jet-input-error for="email" />
                </div>

                <!-- Agence -->
                <div class="mb-3">
                    <x-jet-label for="agence_id" value="{{ __('Agence') }}" />
                    <select id="agence_id" class="form-control">
                        @foreach($this->agences as $agence)
                            <option wire:model.defer="state.agence_id" value="{{ $agence->id }}">{{ $agence->nomAgence }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="agence_id" />
                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <div class="d-flex align-items-baseline">
                <a href="{{ route('admin.users.index') }}" class="btn ripple btn-light text-uppercase">
                    Annuler
                </a>

                <button wire:click.prevent="resetPassword" class="btn ripple btn-light text-uppercase mx-3">
                    Réinitialiser le mot de passe
                </button>

                <x-jet-button>
                    {{ __('Valider') }}
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-form-section>

    </div>
    </div>
@endsection
