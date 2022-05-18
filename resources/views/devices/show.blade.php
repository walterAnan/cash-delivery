@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Appareil</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

@endsection

@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card productdesc">
                <div class="card-body h-100">
                    <div class="border">
                        <div class="bg-light">
                            <nav class="nav nav-tabs">
                                <a class="nav-link active" data-toggle="tab" href="#tab1">Détails Sur Cet Appareil</a>
                            </nav>
                        </div>
                        <div class="card-body tab-content">
                        <div class="tab-pane active show" id="tab1">
                            <ul class="list-unstyled mb-0">
                                <li class=" row">
                                    <div class="col-sm-4 text-muted"> IMEI de L'Appareil</div>
                                    <div class="col-sm-4">{{$device->imei}}</div>
                                </li>
                                <li class="p-b-20 row">
                                    <div class="col-sm-4 text-muted">MasterKey</div>
                                    <div class="col-sm-4">{{$device->masterKey}}</div>
                                </li>
                                <li class="p-b-20 row">
                                    <div class="col-sm-4 text-muted">Propriétaire de l'Appareil</div>
                                    <div class="col-sm-4">{{$device->agent_livreur_id}}</div>
                                </li>

                                <li class="p-b-20 row">
                                    <div class="col-sm-4 text-muted">Appareil Enrégistré le:</div>
                                    <div class="col-sm-4">{{$device->created_at}}</div>
                                </li>

                                <li class="p-b-20 row">
                                    <div class="col-sm-4 text-muted">Date de Changement d'Appareil de cet Agent</div>
                                    <div class="col-sm-4">{{$device->updated_at}}</div>
                                </li>

                            </ul>
                        </div>
                    </div>


                        <div class="btn btn-list my-4">
                            <a class="btn ripple btn-light mx-5" href="{{route('devices.index')}}" style="color: #28a745">Retour</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
    </div>



@endsection()


<

