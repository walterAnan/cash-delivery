<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Nouvel utilisateur') }}
    </x-slot>

    <x-slot name="form">

        <div class="w-md-75">
            <!-- Name -->
            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('Nom') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" />
                <x-jet-input-error for="name" />
            </div>

            <!-- Email -->
            <div class="mb-3">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>

            <!-- Agence -->
            <div class="mb-3">
                <x-jet-label for="agence_id" value="{{ __('Agence') }}" />
{{--                <select id="agence_id" class="form-control" wire:model.defer="state.agence_id">--}}
{{--                    @foreach($this->agences as $agence)--}}
{{--                        <option value="{{ $agence->id }}">{{ $agence->nomAgence }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                <x-jet-input-error for="agence_id" />--}}
                <x-jet-input id="agence_id" type="text" value="{{ $this->agencePrincipale->nomAgence }}" disabled="true"/>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-baseline">
            <a href="{{ route('admin.users.index') }}" class="btn ripple btn-light text-uppercase mx-5">
                Annuler
            </a>

            <x-jet-button>
                {{ __('Valider') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>
