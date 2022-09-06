@extends('layouts.master')

@section('page-header')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Modification les informations sur cette Agence</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item"><a href="{{route('demandes.index')}}">Agences</a></li>
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
                    <form action="{{ route('agences.update', $agence) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Nom de l'Agence: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="nomAgence" placeholder="" value="{{$agence->nomAgence}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Adresse de l'Agence: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="adresseAgence" placeholder="" value="{{$agence->adresseAgence}}" required type="text">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <select class="form-control select" name="statut_agence_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required>
                                        <option label="Choose one">
                                        </option>
                                        @foreach($status as $statut)
                                            <option value="{{ $statut->id }}">{{ $statut->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <button class="btn ripple btn-main-primary btn-block", style="background-color: #4a9e04">Valider</button>
                                </div>

                                <div class="col-lg-6">
                                    <a href="{{ route('agences.index') }}" class="btn ripple btn-danger btn-block" type="button">Annuler</a>
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
