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
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card productdesc">
                <div class="card-body h-100">
                    <div class="border">
                        <div class="bg-light">
                            <nav class="nav nav-tabs">
                                <a class="nav-link active" data-toggle="tab" href="#tab1">Détails Sur les demandes de Livraison</a>
                            </nav>
                        </div>
                        <div class="card-body tab-content">
                        <div class="tab-pane active show" id="tab1">
                            <ul class="list-unstyled mb-0">
                                <li class=" row">
                                    <div class="col-sm-4 text-muted">Code l'Agence</div>
                                    <div class="col-sm-4">{{$agence->codeAgence}}</div>
                                </li>
                                <li class="p-b-20 row">
                                    <div class="col-sm-4 text-muted">Nom de l'Agence</div>
                                    <div class="col-sm-4">{{$agence->nomAgence}}</div>
                                </li>
                                <li class="p-b-20 row">
                                    <div class="col-sm-4 text-muted">Adresse de l'Agence (Quartier)</div>
                                    <div class="col-sm-4">{{$agence->adresseAgence}}</div>
                                </li>

                                <li class="p-b-20 row">
                                    <div class="col-sm-4 text-muted"> Statut de l'Agence</div>
                                    <div class="col-sm-4">{{$agence->statut->libelle}}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
    </div>



@endsection()


<

