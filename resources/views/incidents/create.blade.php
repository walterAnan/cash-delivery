@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Nouvel Incident</h2>
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
                        <form action="{{ route('incidents.store') }}" data-parsley-validate="" method="POST">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label class="form-label">Code Incident: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="codeIncident" placeholder="code" required type="text">
                                    </div>

                                    <div class="col-lg-12 form-group">
                                    <label class="form-label">Description de l'Incident: <span class="tx-danger">*</span></label>
                                    <textarea name="descriptionIncident" cols="50" rows="5"></textarea>
                                </div>
                                    <div class="col-lg-12 form-group">
                                        <label class="form-label">Demande de Livraison : <span class="tx-danger">*</span></label>

                                        <select class="form-control" name="demande_livraison_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required>
                                        <option label="Choose one">
                                        </option>
                                        @foreach($demande_livraisons as $demande_livraison)
                                            <option value="{{$demande_livraison->id }}">{{ $demande_livraison->ref_operation }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                <div class="col-lg-6">
                                    <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Créer</button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('incidents.index') }}" type="buttton" class="btn ripple btn-danger btn-block">Annuler</a>
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
