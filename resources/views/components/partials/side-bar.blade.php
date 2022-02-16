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

            <li class="nav-label" style="font-family: 'Times New Roman'; font-size: large; color:#4a9e04">Les Tables</li>
            <li class="nav-item">
                <x-nav-link href="{{ route('demandes.index') }}" libelle="Demandes de Livraison" icon="fe-bell">
                    <span class="badge badge-danger side-badge">2</span>
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
                <x-nav-link href="{{route('livraisons.index')}}" libelle="Livraisons" icon="fe-shopping-bag">
                </x-nav-link>
            </li>

            <li class="nav-item">
                <x-nav-link href="{{route('agences.index') }}" libelle="Agences" icon="fe-home">
                </x-nav-link>
            </li>

            <li class="nav-item">
                <x-nav-link href="{{route('incidents.index') }}" libelle="Incidents" icon="fe-home">
                </x-nav-link>
            </li>

            <li class="nav-item">
            <li class="nav-label" style="font-family: 'Times New Roman'; font-size: large;color: #4a9e04">Les Stats</li>
                <x-dropdown>
                    <x-slot name="entete">
                        <x-nav-link href="" class="with-sub" libelle="Les Statistiques" icon="fe-bar-chart">
                            <i class="angle fe fe-chevron-right"></i>
                        </x-nav-link>
                    </x-slot>

                    <x-slot name="contenu">
                        <x-sub-link href="" libelle="Numériques" />
                        <x-sub-link href="" libelle="Graphiques" />
                    </x-slot>
                </x-dropdown>
            </li>

        </ul>
    </div>
</div>
<!-- End Sidemenu -->
