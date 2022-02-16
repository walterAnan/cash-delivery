@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Incidents</h2>
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
                                        <h6 class="card-title mb-1">Liste des Incidents</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mg-b-0">
                                            <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>Code</th>
                                                <th>Descption Incident</th>
                                                <th class="text-center">Actions</th>
                                                <th><a class="btn ripple btn-info" style="background-color: #4a9e04" href="{{route('incidents.create')}}">Ajouter</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($incidents as $incident)
                                                <tr>
                                                    <th scope="row">{{ ($loop->index + 1) }}</th>
                                                    <td>{{ $incident->codeIncident }}</td>
                                                    <td>{{ $incident->descriptionIncident }}</td>
                                                    <td class="text-center">
                                                        <div class="flex items-center justify-between">
                                                            <a href="{{ route('incidents.show', $incident->id) }}" class="badge badge-primary" style="height:25px; width:75px; color: #0d6632">
                                                                Voir
                                                            </a>
                                                            <a href="{{ route('incidents.edit', $incident->id) }}" class="badge badge-secondary" style="height:25px; width:75px">
                                                                Modifier
                                                            </a>
                                                            <a href="{{ route('incidents.destroy', $incident->id) }}" class="badge badge-danger" style="height:25px; width:75px">
                                                                Supprimer
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr colspan="" class="">Aucune agence disponible</tr>
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
