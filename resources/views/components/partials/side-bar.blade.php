<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu"   >
    <div class="sidemenu-logo">
        <div class=" flex justify-between">
            <a class="main-logo flex-1" href="{{ route('dashboard') }}">
                <img src="{{URL::asset('assets/img/cassh-logo1.png')}}" class="header-brand-img desktop-logo" alt="" width="250px">
                <img src="{{URL::asset('assets/img/cassh-logo1.png')}}" class="header-brand-img icon-logo" alt="logo">
                <img src="{{URL::asset('assets/img/cassh-logo1.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
                <img src="{{URL::asset('assets/img/cassh-logo1.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
            </a>
        </div>
    </div>
    <div class="main-sidebar-body" style="font-family: 'Times New Roman'; font-size: large">
        <ul class="nav">
            <li class="nav-label" style="font-family: 'Times New Roman'; font-size: large; color: #4a9e04">Dashboard</li>
            <x-nav-link href="{{ route('dashboard') }}" libelle="Tableau de bord" icon="fe-airplay" />

            <li class="nav-label" style="font-family: 'Times New Roman'; font-size: large; color:#4a9e04">Référentiel</li>
{{--            @editor--}}
            @if(auth()->user()->hasAdminRole() || auth()->user()->hasEditorRole())
            <li class="nav-item">
                <x-nav-link href="{{ route('agences.index') }}" libelle="Agences" icon="fe-home" >
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link href="{{ route('livreurs.index') }}" libelle="Livreurs" icon="fe-home" >
                </x-nav-link>

            </li>
            <li class="nav-item">
                <x-nav-link href="{{ route('agents.index') }}" libelle="Agents Livreurs" icon="fe-users" >
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link href="{{ route('devices.index') }}" libelle="Appreils" icon="icon ion-md-laptop" >
                </x-nav-link>
            </li>
            <li class="nav-label" style="font-family: 'Times New Roman'; font-size: large; color:#4a9e04">Gestion</li>
            <li class="nav-item">
                <x-nav-link href="{{ route('demandes.index') }}" libelle="Demandes reçues" icon="fe-bell">
                    <span class="badge badge-danger side-badge">{{\App\Http\Controllers\DemandeController::demandeInitiee()}}</span>
                </x-nav-link>
            </li>
            @endif
{{--            @endeditor--}}

{{--            @if(auth()->user()->hasSavRole())--}}
            <li class="nav-item">
                <x-nav-link href="{{ route('data_sav') }}" libelle="Rechercher demande" icon="fe-trash">
                </x-nav-link>
            </li>

            <li class="nav-item">
                <x-nav-link href="{{ route('data_annule') }}" libelle="Demandes Annulées" icon="fe-trash">
                </x-nav-link>
            </li>
{{--            @endif--}}

            @if(auth()->user()->hasAdminRole())
            <li class="nav-item">
                <x-nav-link href="{{route('admin.users.index')}}" libelle="Utilisateurs" icon="fe-users">
                </x-nav-link>
            </li>
            @endif

            <li class="nav-item">
                <x-nav-link href="{{route('incidents.index') }}" libelle="Incidents" icon="fe-home">
                </x-nav-link>
            </li>
            @if(auth()->user()->hasAdminRole() || auth()->user()->hasEditorRole())
            <li class="nav-item">
            <li class="nav-label" style="font-family: 'Times New Roman'; font-size: large;color: #4a9e04">Les Stats</li>
                <x-dropdown>
                    <x-slot name="entete">
                        <x-nav-link href="" class="with-sub" libelle="Les Statistiques" icon="fe-bar-chart">
                            <i class="angle fe fe-chevron-right"></i>
                        </x-nav-link>
                    </x-slot>

                    <x-slot name="contenu">
                        <x-sub-link href="{{route('statistiques.num')}}" libelle="Numériques" />
                        <x-sub-link href="{{route('statistiques.graphique')}}" libelle="Graphiques" />
                    </x-slot>
                </x-dropdown>
            </li>
            @endif
        </ul>
    </div>
</div>
<!-- End Sidemenu -->
