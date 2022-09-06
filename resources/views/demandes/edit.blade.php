@extends('layouts.master')

@section('page-header')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Assignation d'une Demande de Livraison</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item"><a href="{{route('demandes.index')}}">Demandes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edition</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    <!--End Navbar -->
@endsection


@section('content')

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <form action="{{ route('demandes.update', $demande_livraisons) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Référence de la Livraison: <span class="tx-danger">*</span></label>
                                    <input class="form-control" style = "font-weight: bold" name="montantDemande" placeholder="{{$demande_livraisons->ref_operation}}" readonly="readonly" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Nom du client: <span class="tx-danger">*</span></label>
                                    <input class="form-control" style = "font-weight: bold" name="fraisDemande" placeholder="{{$demande_livraisons->nom_client}}" readonly="readonly" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Nom du Bénéficiaire: <span class="tx-danger">*</span></label>
                                    <input class="form-control" style = "font-weight: bold" name="nombreBillet10000" placeholder="{{$demande_livraisons->nom_beneficiaire}}" readonly="readonly" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Adresse de la Livraison: <span class="tx-danger">*</span></label>
                                    <input class="form-control" style = "font-weight: bold" name="nombreBillet10000" placeholder="{{$demande_livraisons->adresse_livraison}}" readonly="readonly" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Montant de la Demande: <span class="tx-danger">*</span></label>
                                    <input class="form-control" style = "font-weight: bold" name="nombreBillet10000" placeholder="{{\App\Http\Controllers\DemandeController::prixMill($demande_livraisons->montant_livraison)}}" readonly="readonly" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Statut de la Livraison: <span class="tx-danger">*</span></label>
                                    <input class="form-control" style = "font-weight: bold" name="statut" style = "font-weight: bold" placeholder="{{$demande_livraisons->statutDemande->libelle}}" readonly="readonly" required type="text">
                                </div>
                                <div class="col-lg-6 form-group" margin-top="100px" margin-bottom = "100px">
                                <span class="" style="font-weight: bold" >Assignation</span>
                                @livewire('livreur-agents', [$demande_livraisons->id])
                                </div>

                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6 form-group">
                                <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Assigner</button>
                            </div>

                            <div class="col-lg-6 form-group">
                                <a href="{{ route('demandes.index') }}" type="button" class="btn ripple btn-danger btn-block">Annuler</a>
                            </div>
                        </div>

                    </form>

        </div>
    </div>
    <!-- End Row -->


    </div>
    </div>
    </div>
    </div>

@endsection
