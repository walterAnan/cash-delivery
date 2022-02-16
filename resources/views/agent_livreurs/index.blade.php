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
                                    <div>
                                        <h6 class="card-title mb-1">Liste des Agents Livreurs</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mg-b-0">
                                            <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>code Agent</th>
                                                <th>Nom Agent</th>
                                                <th>Prenom Agent</th>
                                                <th>Caution Agent</th>
                                                <th class="text-center">Actions</th>
                                                <th><a class="btn ripple btn-info" style="background-color: #4a9e04" href="{{route('agents.create')}}">Ajouter</a></th>
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
                                                            <a href="{{ route('agents.destroy', $agent_livreur->id) }}" class="btn badge-primary" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
                                                                Supprimer
                                                            </a>
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
