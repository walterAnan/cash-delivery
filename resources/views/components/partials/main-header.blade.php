<!-- Main Header-->
				<div class="main-header side-header sticky" style="background-color: #4a9e04";>
					<div class="container-fluid">
						<div class="main-header-left">
							<a class="main-logo d-lg-none" href="{{ url('/' . $page='index') }}">
								<img src="{{URL::asset('assets/img/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
								<img src="{{URL::asset('assets/img/brand/icon.png')}}" class="header-brand-img icon-logo" alt="logo">
								<img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
								<img src="{{URL::asset('assets/img/brand/icon-light.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
							</a>
							<a class="main-header-menu-icon" href="" id="mainSidebarToggle"><span></span></a>
						</div>
						<div class="main-header-right">
                            <form type="get" action="{{url('/recherche')}}">
							<div class="dropdown d-md-flex header-search">
								<a class="nav-link icon header-search">
									<i class="fe fe-search"></i>
								</a>
								<div class="dropdown-menu">
									<div class="main-form-search p-2">
										<input class="form-control" placeholder="Recherche" type="search">
										<button class="btn"><i class="fe fe-search"></i></button>
									</div>
								</div>
							</div>
                            </form>

                            @admin
                            <!-- Teams Dropdown -->
                            <div class="dropdown main-header-notification p-3">
                                <a href=""><i class="fe fe-users"></i></a>
                                <div class="dropdown-menu">
                                    <!-- Team Management -->
                                    <h6 class="dropdown-header">
                                        {{ __('Manage Team') }}
                                    </h6>

                                    <!-- Team Settings -->
                                    <a class="dropdown-item" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        Team Setting
                                    </a>

                                    <hr class="dropdown-divider">

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <!-- New Team -->
                                            <h6 class="dropdown-header">
                                                {{ __('New Team') }}
                                            </h6>
                                        <a class="dropdown-item" href="{{ route('teams.create') }}">
                                            Create a new team
                                        </a>
                                    @endcan

                                    <hr class="dropdown-divider">

                                    <!-- Team Switcher -->
                                    <h6 class="dropdown-header">
                                        {{ __('Switch Teams') }}
                                    </h6>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </div>
                            @endadmin
                            <!-- Settings Dropdown -->
                            <div class="dropdown main-profile-menu">
								<a class="main-img-user" href=""><img alt="avatar" src="{{Auth::user()->profile_photo_url}}"></a>
								<div class="dropdown-menu">
									<div class="header-navheading">
										<h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
										<p class="main-notification-text">{{ Auth::user()->email }}</p>
									</div>
									<a class="dropdown-item border-top" href="{{route('profile.show')}}">
										<i class="fe fe-user"></i> Mon Profile
									</a>

									<a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
										<i class="fe fe-power"></i> Déconnexion
									</a>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- End Main Header-->
