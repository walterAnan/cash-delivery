@extends('layouts.master')

@section('page-header')


    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Demandes de Livraison</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
    </div>
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
                                <a class="nav-link active" data-toggle="tab" href="#tab1">Détails de la demande</a>
                            </nav>
                        </div>
                        <div class="card-body tab-content">
                            <div class="tab-pane active show" id="tab1">
                                <ul class="list-unstyled mb-0">
                                    <li class="row">
                                        <div class="col-sm-3 text-muted">Référence de l'opération</div>
                                        <div class="col-sm-8">{{$demande_livraisons->ref_operation}}</div>
                                    </li>
                                    <li class=" row">
                                        <div class="col-sm-3 text-muted">Le code de l'Agence</div>
                                        <div class="col-sm-8">{{$demande_livraisons->code_agence}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Nom du client</div>
                                        <div class="col-sm-8">{{$demande_livraisons->nom_client}}</div>
                                    </li>
{{--                                    <li class="p-b-20 row">--}}
{{--                                        <div class="col-sm-3 text-muted">Prenom du client</div>--}}
{{--                                        <div class="col-sm-8">{{$demande_livraisons->prenom_client}}</div>--}}
{{--                                    </li>--}}
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Téléphone du client</div>
                                        <div class="col-sm-8">{{$demande_livraisons->tel_client}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Nom du Bénéficiaire</div>
                                        <div class="col-sm-8">{{$demande_livraisons->nom_beneficiaire}}</div>
                                    </li>
{{--                                    <li class="p-b-20 row">--}}
{{--                                        <div class="col-sm-3 text-muted">Prenom du Bénéficiaire</div>--}}
{{--                                        <div class="col-sm-8">{{$demande_livraisons->prenom_beneficiaire}}</div>--}}
{{--                                    </li>--}}
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Téléphone du Bénéficiaire</div>
                                        <div class="col-sm-8">{{$demande_livraisons->tel_beneficiaire}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Montant à Livrer au client</div>
                                        <div class="col-sm-8">{{\App\Http\Controllers\DemandeController::prixMill($demande_livraisons->montant_livraison)}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Nombre de Billets de 10000 </div>
                                        <div class="col-sm-8">{{$demande_livraisons->nombreBillet10000}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Nombre de Billets de 5000</div>
                                        <div class="col-sm-8">{{$demande_livraisons->nombreBillet5000}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Frais Prelevée pour la Livraison</div>
                                        <div class="col-sm-8">{{\App\Http\Controllers\DemandeController::prixMill($demande_livraisons->frais_livraison)}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Commission du Livreur</div>
                                        <div class="col-sm-8">{{$demande_livraisons->commission}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Lien GPS</div>
                                        <div class="col-sm-8">{{$demande_livraisons->lien_gps}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Date de Reception de la Demande</div>
                                        <div class="col-sm-8">{{$demande_livraisons->date_reception}}</div>
                                    </li>
{{--                                    <li class="p-b-20 row">--}}
{{--                                        <div class="col-sm-3 text-muted">Heure de Reception de la Demande</div>--}}
{{--                                        <div class="col-sm-8">{{$demande_livraisons->heure_reception}}</div>--}}
{{--                                    </li>--}}
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Date de la Livraison</div>
                                        <div class="col-sm-8">{{$demande_livraisons->date_livraison}}</div>
                                    </li>
{{--                                    <li class="p-b-20 row">--}}
{{--                                        <div class="col-sm-3 text-muted">Heure de Livraison</div>--}}
{{--                                        <div class="col-sm-8">{{$demande_livraisons->heure_livraison}}</div>--}}
{{--                                    </li>--}}

                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Le Livreur</div>

                                        <div class="col-sm-8">{{$demande_livraisons->livreur?->raisonSociale}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">L'Agent Livreur</div>
                                        <div class="col-sm-8">{{$demande_livraisons->agent_livreur?->nomAgent}}</div>
                                    </li>
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Statut de la livraison: </div>
                                        <div class="col-sm-8">{{$demande_livraisons->statutDemande->libelle}}</div>
                                    </li>

                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Utilisateur qui a assigner</div>
                                        <div class="col-sm-8">{{$demande_livraisons->user->name}}</div>
                                    </li>
{{--                                    <li class="p-b-20 row">--}}
{{--                                        <div class="col-sm-3 text-muted">Créer le :</div>--}}
{{--                                        <div class="col-sm-8">{{$demande_livraisons->create_at}}</div>--}}
{{--                                    </li>--}}
                                    <li class="p-b-20 row">
                                        <div class="col-sm-3 text-muted">Mis à jour le: </div>
                                        <div class="col-sm-8">{{$demande_livraisons->updated_at}}</div>
                                    </li>
                                </ul>
                            </div>
                </div>
                        <div class="btn btn-list my-4">
                            <a class="btn ripple btn-light mx-5" href="{{route('demandes.index')}}">Retour</a>
                            @if($demande_livraisons->statut_demande_id == DEMANDE_INITIEE)
                                <a href="{{ route('demandes.edit', $demande_livraisons->id) }}" class="btn ripple btn-success " style="background-color: #4a9e04">Assigner</a>
                            @else
                                <button class="btn ripple btn-success disabled" title="Demande déjà assignée">Assigner</button>
                            @endif
                        </div>
            </div>
        </div>

    </div>
    </div>

    </div>

    </div>
    </div>
    <!-- End Row -->

@endsection
