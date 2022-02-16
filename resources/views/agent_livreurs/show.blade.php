@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Détails Agent Livreur </h2>
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
                                        <div class="col-sm-4 text-muted">Code de l'Agent Livreur</div>
                                        <div class="col-sm-4">{{$agent->codeAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Nom de l'Agent</div>
                                        <div class="col-sm-4">{{$agent->nomAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Prenom de l'Agent</div>
                                        <div class="col-sm-4">{{$agent->prenomAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Numéro de Téléphone de l'Agent Livreur</div>
                                        <div class="col-sm-4">{{$agent->telephoneAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Adresse de l'Agence (Quartier)</div>
                                        <div class="col-sm-4">{{$agent->adresseAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Statut de l'Agent Livreur</div>
                                        <div class="col-sm-4">{{$agent->statutAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Le Solde de l'Agent Livreur</div>
                                        <div class="col-sm-4">{{$agent->soldeNetAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Montant de La Caution de L'Agent Livreur</div>
                                        <div class="col-sm-4">{{$agent->montantCautionAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">ID du Livreur auquel L'Agent est rattaché</div>
                                        <div class="col-sm-4">{{$agent->livreur_id}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">Contrôle Sur ces Livraisons</div>
                                        <div class="col-sm-4">{{$agent->controlLivraison_id}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-4 text-muted">ID du Moyen de Deplacement de L'Agent Livreur</div>
                                        <div class="col-sm-4">{{$agent->moyensdedeplacement_id}}</div>
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

