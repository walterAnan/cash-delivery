@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Livraisons</h2>
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
                                        <h6 class="card-title mb-1"></h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mg-b-0">
                                            <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>Code</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($livraisons as $livraison)
                                                <tr>
                                                    <th scope="row">{{ ($loop->index + 1) }}</th>
                                                    <td>{{ $livraison->codeLivraison }}</td>
                                                    <td>{{ $livraison->livreur_id }}</td>
                                                    <td class="text-center">
                                                        <div class="flex items-center justify-between">
                                                            <a href="{{ route('agences.show', $livraison->id) }}" class="badge badge-primary" style="height:25px; width:75px">
                                                                Détails
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr colspan="" class="">Aucune livraison disponible</tr>
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

