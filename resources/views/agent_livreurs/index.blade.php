@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Agents Livreurs</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>

    </div>
        <div class="d-flex">
        <div class="mr-2">
            <a class="btn ripple btn-info" style="background-color: #4a9e04; margin-bottom: 25px" href="{{route('data_activites_agents')}}">Activités des Agents</a>

        </div>
    </div>
    </div>

    <!-- End Page Header -->

@endsection



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-1">Liste des Agents Livreurs</h6>
                                        <a class="btn ripple btn-info" style="background-color: #4a9e04; margin-bottom: 25px" href="{{route('agents.create')}}">Ajouter</a>
                                    </div>
                                    <div class="table-responsive">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif

                                        <table class="dataTable my-datatable table table-hover mg-b-0">
                                            <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>code Agent</th>
                                                <th>Nom Agent</th>
                                                <th>Prenom Agent</th>
                                                <th>Ville Agent</th>
                                                <th>Livreur </th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($agent_livreurs as $agent_livreur)
                                                <tr>
                                                    <th scope="row">{{ ($loop->index + 1) }}</th>
                                                    <td>{{ $agent_livreur->codeAgent }}</td>
                                                    <td>{{ $agent_livreur->nomAgent }}</td>
                                                    <td>{{ $agent_livreur->prenomAgent }}</td>
                                                    <td>{{ $agent_livreur->localite?->ville }}</td>
                                                    <td>{{ $agent_livreur->livreur->raisonSociale }}</td>
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center justify-content-between px-1">
                                                            <a href="{{ route('agents.show', $agent_livreur->id) }}">
                                                                <i class="fas fa-bars "></i>
                                                            </a>
                                                            <a href="{{ route('agents.edit', $agent_livreur->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="" data-toggle="modal" data-target="#deletedata{{$agent_livreur->id}}" title="Archiver" onclick="event.preventDefault()">
                                                                <i class="fas fa-archive"></i>
                                                            </a>

                                                            <!-- The Modal -->
                                                            <div class="modal" id="deletedata{{$agent_livreur->id}}">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Suppression de données</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>

                                                                        <!-- Modal body -->
                                                                        <div class="modal-body">
                                                                            Voulez-vous supprimer cet agent livreur ?
                                                                        </div>

                                                                        <!-- Modal footer -->
                                                                        <div class="modal-footer">
                                                                            <div class="justify-content-between">
                                                                                <a href="{{ route('agents.destroy', $agent_livreur->id) }}" class="btn badge-danger" id="swal-warning" style="margin-left: 0px"
                                                                                   onclick="event.preventDefault();document.getElementById('delete-agent{{$agent_livreur->id}}').submit();">
                                                                                    OUI
                                                                                </a>
                                                                                <form method="post" id="delete-agent{{$agent_livreur->id}}" action="{{ route('agents.destroy', $agent_livreur->id) }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                </form>
                                                                            </div>
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">NON</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr colspan="" class="">Aucun Agent disponible</tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
