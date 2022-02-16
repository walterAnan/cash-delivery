@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Détails sur le Livreur </h2>
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
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Raison Sociale</div>
                                        <div class="col-sm-4">{{$livreur->raisonSociale}}</div>
                                    </li>
                                    <li class=" row">
                                        <div class="col-sm-4 text-muted">Code du Livreur</div>
                                        <div class="col-sm-4">{{$livreur->codeLivreur}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Nom du Responsable de l'entreprise livreuse</div>
                                        <div class="col-sm-4">{{$livreur->nomResponsable}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Prenom du Responsable </div>
                                        <div class="col-sm-4">{{$livreur->prenomResponsable}}</div>
                                    </li>

                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Téléphone du Responsable</div>
                                        <div class="col-sm-4">{{$livreur->telephoneResponsable}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Adresse du Livreur (Quartier)</div>
                                        <div class="col-sm-4">{{$livreur->adresseLivreur}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Adresse Mail du Livreur</div>
                                        <div class="col-sm-4">{{$livreur->emailLivreur}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Montant de la Caution du Livreur</div>
                                        <div class="col-sm-4">{{$livreur->cautionLivreur}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Téléphone du Livreur</div>
                                        <div class="col-sm-4">{{$livreur->telephoneLivreur}}</div>
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


