@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Nouvel Agent</h2>
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
                        <form action="{{ route('agents.store') }}" data-parsley-validate="" method="POST">
                            @csrf
                            <div class="">
                                <div class="row">
{{--                                    <div class="col-lg-12 form-group">--}}
{{--                                        <label class="form-label">Code Agence: <span class="tx-danger">*</span></label>--}}
{{--                                        <input class="form-control" name="codeAgence" placeholder="Code Agence" required type="text">--}}
{{--                                    </div>--}}
                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Nom de l'Agent: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="nomAgent" placeholder="Nom Agent" required type="text">
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Prenom de l'Agent: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="prenomAgent" placeholder="Prenom" required type="text">
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Téléphone de l'Agent: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="telephoneAgent" placeholder="Téléphone" required type="text">
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Adresse de l'Agent: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="adresseAgent" placeholder="Adresse" required type="text">
                                    </div>


                                    <div class="col-lg-6 form-group">
                                        <label class="form-label">Montant de la Caution: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="cautionAgent" placeholder="Caution" required type="number">
                                    </div>

                                    <div class="col-lg form-group">
                                        <label class="form-label">Livreur: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="livreur_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required>
                                            <option label="Choose one">
                                            </option>
                                            @foreach($livreurs as $livreur)
                                                <option value="{{ $livreur->id }}">{{ $livreur->raisonSociale }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <div class="col-lg-6">
                                <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Créer</button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('agents.index') }}" type="buttton" class="btn ripple btn-danger btn-block">Annuler</a>
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
