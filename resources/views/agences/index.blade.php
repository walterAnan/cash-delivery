@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Agences</h2>
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
                                        <h6 class="card-title mb-1">Liste des Agences</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mg-b-0">
                                            <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>Code</th>
                                                <th>Nom Agence</th>
                                                <th class="text-center">Statut</th>
                                                <th class="text-center">Actions</th>
                                                <th><a class="btn ripple btn-info" style="background-color: #4a9e04" href="{{route('agences.create')}}">Ajouter</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($agences as $agence)
                                                <tr>
                                                <th scope="row">{{ ($loop->index + 1) }}</th>
                                                <td>{{ $agence->codeAgence }}</td>
                                                <td>{{ $agence->nomAgence }}</td>
                                                <td class="text-center"><span class="badge badge-pill badge-{{ $agence->statutColor }}">{{ $agence->statut->libelle }}</span></td>
                                                <td class="text-center">
                                                    <div class="flex items-center justify-between">
                                                        <a href="{{ route('agences.show', $agence->id) }}" class="btn badge-primary" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
                                                            Voir
                                                        </a>
                                                        <a href="{{ route('agences.edit', $agence->id) }}" class="btn badge-secondary" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
                                                            Modifier
                                                        </a>
                                                        <a href="{{ route('agences.destroy', $agence->id) }}" class="btn badge-secondary" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
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
