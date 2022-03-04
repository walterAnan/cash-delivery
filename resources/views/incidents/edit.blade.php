@extends('layouts.master')

@section('page-header')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item"><a href="{{route('demandes.index')}}">Incidents</a></li>
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
                    <form action="{{ route('incidents.update', $incident) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Changer code de l'Incident: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="codeIncident" placeholder="" value="{{$incident->codeIncident}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Changer la description de l'incident: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="descriptionIncident" placeholder="" value="{{$incident->descriptionIncident}}" required type="text">
                                </div>


                                <div class="col-lg-6">
                                    <button class="btn ripple btn-main-primary btn-block">Valider</button>
                                </div>

                                <div class="col-lg-6">
                                    <button class="btn ripple btn-danger btn-block" type="button">Annuler</button>
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
