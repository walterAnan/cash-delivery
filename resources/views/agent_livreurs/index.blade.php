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
            <a class="btn ripple btn-outline-primary dropdown-toggle mb-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fe fe-external-link"></i> Export <i class="fas fa-caret-down ml-1"></i>
            </a>
            <div  class="dropdown-menu tx-13">
                <a class="dropdown-item" href="#"><i class="far fa-file-pdf mr-2"></i>Export as Pdf</a>
                <a class="dropdown-item" href="#"><i class="far fa-image mr-2"></i>Export as Image</a>
                <a class="dropdown-item" href="#"><i class="far fa-file-excel mr-2"></i>Export as Excel</a>
            </div>
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
                                                <th>Caution Agent</th>
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
                                                    <td>{{ $agent_livreur->montantCautionAgent }}</td>
                                                    <td class="text-center">
                                                        <div class="flex items-center justify-between">
                                                            <a href="{{ route('agents.show', $agent_livreur->id) }}" class="btn badge-primary" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
                                                                Voir
                                                            </a>
                                                            <a href="{{ route('agents.edit', $agent_livreur->id) }}" class="btn badge-primary" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
                                                                Modifier
                                                            </a>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deletedata" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
                                                                Supprimer
                                                            </button>

                                                            <!-- The Modal -->
                                                            <div class="modal" id="deletedata">
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
                                                                                   onclick="event.preventDefault();document.getElementById('delete-agent').submit();">
                                                                                    OUI
                                                                                </a>
                                                                                <form method="post" id="delete-agent" action="{{ route('agents.destroy', $agent_livreur->id) }}">
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
