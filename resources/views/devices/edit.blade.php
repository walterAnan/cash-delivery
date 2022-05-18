@extends('layouts.master')

@section('page-header')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item"><a href="{{route('devices.index')}}">Incidents</a></li>
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
                    <form action="{{ route('devices.update', $device) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Inserer l'IMEI du nouvel appareil: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="imei" placeholder="" value="{{$device->imei}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Inserer le masterKey du nouvel appareil: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="masterKey" value="{{$device->masterKey}}" required type="text">
                                </div>


                                <div class="col-lg-6">
                                    <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Valider</button>
                                </div>

                                <div class="col-lg-6">
                                    <a href="{{ route('devices.index') }}" class="btn ripple btn-danger btn-block" type="button">Annuler</a>
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
