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
                                        @error('nomResponsable')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 ">
                                        <label class="form-label">Prenom du Responsable: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="prenomResponsable" placeholder="Prenom" required type="text">
                                        @error('prenomResponsable')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 ">
                                        <label class="form-label">Raison Sociale du Livreur: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="raisonSociale" placeholder="Raison Sociale" required type="text">
                                        @error('raisonSociale')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Téléphone du Responsable: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="telephoneResponsable" placeholder="Téléphone" required type="tel">
                                        @error('telephoneResponsable')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Adresse du Livreur: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="adresseLivreur" placeholder="Adresse" required type="text">
                                        @error('adresseLivreur')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Mail du Livreur: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="emailLivreur" placeholder="Email" required type="email">
                                        @error('emailLivreur')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Téléphone du Livreur: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="telephoneLivreur" placeholder="Téléphone" required type="tel">
                                        @error('telephoneLivreur')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Montant de la Caution: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="cautionLivreur" placeholder="Caution" required type="number">
                                        @error('cautionLivreur')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Mode commission <span class="tx-danger">*</span></label>
                                        <div class="row mg-t-10">
                                            <div class="col-lg-6">
                                                <label class="rdiobox"><input name="modeCommission" type="radio" value="TAUX"> <span>Taux (%)</span></label>
                                            </div>
                                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                                <label class="rdiobox"><input checked name="modeCommission" type="radio" value="MONTANT_FIX"> <span>Montant Fixe</span></label>
                                            </div>
                                        </div>
                                        @error('modeCommission')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Valeur de la Commission : <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="valeurCommission" placeholder="Valeur de la commission" required type="number">
                                        @error('valeurCommission')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Agence: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="agence_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required>
                                            @foreach($agences as $agence)
                                                <option value="{{ $agence->id }}" class="@error('agence_id') is-invalid @enderror">
                                                    {{$agence->nomAgence }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('agence_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

{{--                                    @livewire('control')--}}

                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Type livreur <span class="tx-danger">*</span></label>
                                        <div class="row mg-t-10">
                                            <div class="col-lg-6">
                                                <label class="rdiobox"><input name="control_livraison_id" type="radio" value="1"> <span>Interne</span></label>
                                            </div>
                                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                                <label class="rdiobox"><input checked name="control_livraison_id" type="radio" value="2"> <span>Externe</span></label>
                                            </div>
                                        </div>
                                        @error('control_livraison_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <a href="{{ route('incidents.index') }}" type="buttton" class="btn ripple btn-danger btn-block">Annuler</a>
                                    </div>

                                <div class="col-lg-6">
                                    <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Créer</button>
                                </div>

                                </div>
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
