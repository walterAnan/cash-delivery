@extends('layouts.master')

@section('page-header')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Modification du Livreur</h2>
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
                    <form action="{{ route('livreurs.update', $livreur) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Nom du Responsable: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="nomResponsable" placeholder="" value="{{$livreur->nomResponsable}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Prenom du Responsable: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="prenomResponsable" placeholder="" value="{{$livreur->prenomResponsable}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Raison Sociale du Livreur: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="raisonSociale" placeholder="" value="{{$livreur->raisonSociale}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Numéro de Téléphone du Responsable: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="telephoneResponsable" placeholder="" value="{{$livreur->telephoneResponsable}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Adresse du Livreur: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="adresseLivreur" placeholder="" value="{{$livreur->adresseLivreur}}" required type="text">
                                </div>


                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Email du Livreur: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="emailLivreur" placeholder="" value="{{$livreur->emailLivreur}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Caution du Livreur: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="cautionLivreur" placeholder="" value="{{$livreur->cautionLivreur}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Téléphone du Livreur: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="telephoneLivreur" placeholder="" value="{{$livreur->telephoneLivreur}}" required type="text">
                                </div>


                                <div class="col-lg-6">
                                    <button class="btn ripple btn-main-primary btn-block" type="submit">Modifier</button>
                                </div>

                                <div class="col-lg-6">
                                    <button class="btn ripple btn-danger btn-block">Annuler</button>
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
