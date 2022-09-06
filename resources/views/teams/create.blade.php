<x-master-layout>
    @section('page-header')
        <h2 class="h4 font-weight-bold">
            {{ __('Créer Une Equipe') }}
        </h2>
    @endsection

    @section('content')
        <div>
            @livewire('teams.create-team-form')
        </div>

        <!-- A ne pas supprimer -->
        </div>
        </div>
        <!-- End Main Content-->
    @endsection
</x-master-layout>
