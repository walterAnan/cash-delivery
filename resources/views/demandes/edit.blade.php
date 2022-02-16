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
                    <form action="{{ route('demandes.update', $demandeLivraison) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Montant de leDemande: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="montantDemande" placeholder="{{$demandeLivraison->montant_livraison}}" readonly="readonly" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Frais de la Demande: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="fraisDemande" placeholder="{{$demandeLivraison->frais_livraison}}" readonly="readonly" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Nombre de Billets de 10000: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="nombreBillet10000" placeholder="{{$demandeLivraison->nombreBillet10000}}" readonly="readonly" required type="text">
                                </div>

                                @livewire('livreur-agents')

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Statut de la Livraison: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="statut" placeholder="{{$demandeLivraison->statut}}" readonly="readonly" required type="text">
                                </div>


                            <div class="col-lg-3 form-group">
                            <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Assigner</button>
                            </div>

                            <div class="col-lg-3 form-group">
                                <a href="{{ route('demandes.index') }}" type="button" class="btn ripple btn-danger btn-block">Annuler</a>
                            </div>
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
