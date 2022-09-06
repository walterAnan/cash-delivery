@extends('layouts.master')

@section('page-header')

    <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Demandes de Livraison</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="mr-2">
                    <a class="btn ripple btn-outline-primary dropdown-toggle mb-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fe fe-external-link"></i> Export <i class="fas fa-caret-down ml-1"></i>
                    </a>
                    <div  class="dropdown-menu tx-13">
                        <a class="dropdown-item" href="#"><i class="far fa-file-pdf mr-2"></i>Export as Pdf</a>
                        <a class="dropdown-item" href="#"><i class="far fa-image mr-2"></i>Export as Image</a>
                        <a class="dropdown-item" href="#"><i class="far fa-file-excel mr-2"></i>Export as Excel</a>
                    </div>
                </div>

            </div>
        </div>

    <!-- End Page Header -->

    <!--Navbar-->
    <div class="responsive-background">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="advanced-search">
                <div class="row align-items-center justify-between">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-lg-0">
                                    <label class="">De :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fe fe-calendar lh--9 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="11/01/2019" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-lg-0">
                                    <label class="">A :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fe fe-calendar lh--9 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="11/08/2019" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group mb-lg-0">
                            <label class="">Statut :</label>
                            <select multiple="multiple" class="multi-select">
                                <option value="1">Assignée</option>
                                <option value="2">Non Assignée</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-right">
                    <a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#navbarSupportedContent"
                       aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Appliquer</a>
                    <a href="#" class="btn btn-secondary" data-toggle="collapse" data-target="#navbarSupportedContent"
                       aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Annuler</a>
                </div>
            </div>
        </div>
    </div>
    <!--End Navbar -->
@endsection


@section('content')

    <!-- Row -->
    <div class="">
        <h3><i class=""></i>Rechercher une demande</h3><hr>
    </div>


    @livewire('sav')

@endsection


