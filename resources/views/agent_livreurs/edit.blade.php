@extends('layouts.master')

@section('page-header')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Modification des informations de cet Agent Livreur</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item"><a href="{{route('agents.index')}}">Agent Livreur</a></li>
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
                    <form action="{{ route('agents.update', $agent) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Nom l'Agent: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="nomAgent" placeholder="" value="{{$agent->nomAgent}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Prenom de l'Agent: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="prenomAgent" placeholder="" value="{{$agent->prenomAgent}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">telephone de l'Agent: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="telephoneAgent" placeholder="" value="{{$agent->telephoneAgent}}" required type="text">
                                </div>


                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Adresse de l'Agent: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="adresseAgent" placeholder="" value="{{$agent->adresseAgent}}" required type="text">
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Adresse de l'Agent: <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="adresseAgent" placeholder="" value="{{$agent->adresseAgent}}" required type="text">
                                </div>



                                <div class="col-lg-3">
                                    <button class="btn ripple btn-main-primary btn-block" style="background-color: #4a9e04">Valider</button>
                                </div>


                                <div class="col-lg-3">
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
