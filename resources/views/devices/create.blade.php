@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Nouvel Appareil</h2>
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
                        <form action="{{ route('devices.store') }}" data-parsley-validate="" method="POST">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label class="form-label">IMEI de l'Appareil: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="imei" placeholder="IMEI" required type="text">
                                    </div>

                                    <div class="col-lg-12 form-group">
                                    <label class="form-label">MasterKey: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="masterKey" id="masterKey" placeholder="masterKey" required type="text">
                                </div>
                                    <div class="col-lg-12 form-group">
                                        <label class="form-label">Agent Propietaire : <span class="tx-danger">*</span></label>

                                        <select class="form-control" name="agent_livreur_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required>
                                        <option label="Choose one">
                                        </option>
                                        @foreach($agents as $agent)
                                            <option value="{{$agent->id }}">{{ $agent->nomAgent }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                <div class="col-lg-6">
                                    <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Créer</button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('devices.index') }}" type="buttton" class="btn ripple btn-danger btn-block">Annuler</a>
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
