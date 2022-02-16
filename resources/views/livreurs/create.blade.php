@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Nouveau Livreur</h2>
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
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row row-sm mg-b-20">
                        <form action="{{ route('livreurs.store') }}" data-parsley-validate="" method="POST">
                            @csrf
                            <div class="">
                                <div class="row">
                                    {{--                                    <div class="col-lg-12 form-group">--}}
                                    {{--                                        <label class="form-label">Code Agence: <span class="tx-danger">*</span></label>--}}
                                    {{--                                        <input class="form-control" name="codeAgence" placeholder="Code Agence" required type="text">--}}
                                    {{--                                    </div>--}}
                                    <div class="col-lg-6 ">
                                        <label class="form-label">Nom du Responssable: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="nomResponsable" placeholder="Nom" required type="text">
                                    </div>

                                    <div class="col-lg-6 ">
                                        <label class="form-label">Prenom du Responsable: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="prenomResponsable" placeholder="Prenom" required type="text">
                                    </div>
                                    <div class="col-lg-6 ">
                                        <label class="form-label">Raison Sociale du Livreur: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="raisonSociale" placeholder="Raison Sociale" required type="text">
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Téléphone du Responsable: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="telephoneResponsable" placeholder="Téléphone" required type="tel">
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Adresse du Livreur: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="adresseLivreur" placeholder="Adresse" required type="text">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Mail du Livreur: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="emailLivreur" placeholder="Adresse" required type="email">
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Montant de la Caution: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="cautionLivreur" placeholder="Caution" required type="number">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Téléphone du Livreur: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="telephoneLivreur" placeholder="Téléphone" required type="tel">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Agence ID: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="agence_id" placeholder="Agence" required type="tel">
                                    </div>
                                </div>
                                <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
