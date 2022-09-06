@extends('layouts.master')
@section('page-header')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Tableau de Bord</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cash-delivery</li>
            </ol>
        </div>
        <div class="d-flex">
            <div class="mr-2">
                <a class="btn ripple btn-outline-primary dropdown-toggle mb-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fe fe-external-link"></i> Exporter <i class="fas fa-caret-down ml-1"></i>
                </a>
                <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="{{ route('demandes.create') }}"><i class="far fa-file-pdf mr-2"></i>Export as Pdf</a>
                    <a class="dropdown-item" href="#"><i class="far fa-image mr-2"></i>Export as Image</a>
                    <a class="dropdown-item" href="#"><i class="far fa-file-excel mr-2"></i>Export as Excel</a>
                </div>
            </div>
            <div class="">
                <a href="#" class="btn ripple btn-secondary navresponsive-toggler mb-0" data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-filter mr-1"></i>  Filtrer <i class="fas fa-caret-down ml-1"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!--Navbar-->
    <div class="responsive-background">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="advanced-search">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-lg-0">
                                    <label class="">From :</label>
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
                                    <label class="">To :</label>
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
                            <label class="">Products :</label>
                            <select multiple="multiple" class="group-filter">
                                <optgroup label="Mens">
                                    <option value="1">Foot wear</option>
                                    <option value="2">Top wear</option>
                                    <option value="3">Bootom wear</option>
                                    <option value="4">Men's Groming</option>
                                    <option value="5">Accessories</option>
                                </optgroup>
                                <optgroup label="Women">
                                    <option value="1">Western wear</option>
                                    <option value="2">Foot wear</option>
                                    <option value="3">Top wear</option>
                                    <option value="4">Bootom wear</option>
                                    <option value="5">Beuty Groming</option>
                                    <option value="6" >Accessories</option>
                                    <option value="7">Jewellery</option>
                                </optgroup>
                                <optgroup label="Baby & Kids">
                                    <option value="1">Boys clothing</option>
                                    <option value="2">Girls Clothing</option>
                                    <option value="3">Toys</option>
                                    <option value="4">Baby Care</option>
                                    <option value="5">Kids footwear</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-lg-0">
                            <label class="">Sales Type :</label>
                            <select multiple="multiple" class="multi-select">
                                <option value="1">Online</option>
                                <option value="2">Offline</option>
                                <option value="3">Reseller</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-right">
                    <a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#navbarSupportedContent"
                       aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Apply</a>
                    <a href="#" class="btn btn-secondary" data-toggle="collapse" data-target="#navbarSupportedContent"
                       aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Reset</a>
                </div>
            </div>
        </div>
    </div>
    <!--End Navbar -->
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Demandes initiées / jour</p>
                        <div class="ml-auto">
                            <i class="fas fa-signal fs-20 text-info"></i>
                        </div>
                    </div>
                    <div>
                        <h4 class="dash-25">{{\App\Http\Controllers\DemandeController::nombre_nouvelle_demande()}} XAF</h4>
                    </div>
                    <div class="expansion-label d-flex">
                        <span class="text-muted">{{date_format(now(),"Y/m/d")}}</span>
                        <span class="ml-auto font-weight-bold">{{\App\Http\Controllers\DemandeController::demandeInitiee()}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Demandes en cours / jour</p>
                        <div class="ml-auto">
                            <i class="fas fa-signal fs-20 text-info"></i>
                        </div>
                    </div>
                    <div>
                        <h4 class="dash-25">{{\App\Http\Controllers\DemandeController::montantEncours()}} XAF</h4>
                    </div>
                    <div class="expansion-label d-flex">
                        <span class="text-muted">{{date_format(now(),"Y/m/d")}}</span>
                        <span class="ml-auto font-weight-bold">{{\App\Http\Controllers\DemandeController::demandeEncours()}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Demandes effectuées / jour</p>
                        <div class="ml-auto">
                            <i class="fas fa-signal fs-20 text-info"></i>
                        </div>
                    </div>
                    <div>
                        <h4 class="dash-25">{{\App\Http\Controllers\DemandeController::montantEffectue()}} XAF</h4>
                    </div>
                    <div class="expansion-label d-flex">
                        <span class="text-muted">{{date_format(now(),"Y/m/d")}}</span>
                        <span class="ml-auto font-weight-bold">{{\App\Http\Controllers\DemandeController::demandeEffectue()}}</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Demande éffectuées / mois</p>
                        <div class="ml-auto">
                            <i class="fas fa-signal fs-20 text-info"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">{{\App\Http\Controllers\DemandeController::montantEffectueMois()}} XAF</h3>
                    </div>
                    <div class="expansion-label d-flex">
                        <span class="text-muted">{{date_format(now(),"M")}}</span>
                        <span class="ml-auto font-weight-bold">{{\App\Http\Controllers\DemandeController::demandeEffectueMois()}} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End  Row -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-6 col-lg-6">
            <div class="container">
                <div class="row justify-content-center">
                        <div class="card">
                            <div class="card-body">

                                <h4>{{ $chart1->options['chart_title'] }}</h4>
                                {!! $chart1->renderHtml() !!}

                            </div>

                    </div>
                </div>
            </div>


{{--            <div class="card custom-card overflow-hidden">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="card-option d-flex">--}}
{{--                        <div>--}}
{{--                            <h6 class="card-title mb-1">Evolution Nombre de livraisons Total et Livraisons effectuées </h6>--}}
{{--                        </div>--}}
{{--                        <div class="card-option-title ml-auto">--}}
{{--                            <div class="btn-group p-0">--}}
{{--                                <button class="btn btn-outline-light btn-sm" type="button">Year</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <canvas id="sales"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
        <div class="col-sm-12 col-xl-6 col-lg-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1" style="font-size: x-large">Top 5 des meilleurs livreurs</h6>
                        <br>
                    </div>
                    <div class="table-responsive">
                        <table class="table mg-b-2-f">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Livreur</th>
                                <th>Nombre de livraisons éffectuées </th>
                                <th>Montant des livraisons XFA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Http\Controllers\DemandeController::livreursPro() as $livreurs)
                            <tr>
                                <th scope="row">{{ ($loop->index + 1) }}</th>
                                <td>{{ $livreurs->raison_sociale}}</td>
                                <td>{{\App\Http\Controllers\DemandeController::prixMill($livreurs->nombre) }}</td>
                                <td>{{\App\Http\Controllers\DemandeController::prixMill($livreurs->montant_total) }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


{{--            <div class="card custom-card overflow-hidden">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="card-option d-flex">--}}
{{--                        <div>--}}
{{--                            <h6 class="card-title mb-1">Evolution Nombre de livraisons Total et Livraisons effectuées </h6>--}}
{{--                        </div>--}}
{{--                        <div class="card-option-title ml-auto">--}}
{{--                            <div class="btn-group p-0">--}}
{{--                                <button class="btn btn-outline-light btn-sm" type="button">Year</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <canvas id="sales"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}




{{--            <div class="card custom-card">--}}
{{--                <div class="card-body">--}}
{{--                    <div>--}}
{{--                        <h6 class="card-title mb-1">Monthly Profits</h6>--}}
{{--                        <p class="text-muted card-sub-title">Excepteur sint occaecat cupidatat non proident.</p>--}}
{{--                    </div>--}}
{{--                    <h3><span>$</span>22,534</h3>--}}
{{--                    <div class="clearfix mb-3">--}}
{{--                        <div class="clearfix">--}}
{{--                            <span class="float-left text-muted">This Month</span>--}}
{{--                            <span class="float-right">75%</span>--}}
{{--                        </div>--}}
{{--                        <div class="progress mt-1">--}}
{{--                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p bg-primary" role="progressbar"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="clearfix">--}}
{{--                        <div class="clearfix">--}}
{{--                            <span class="float-left text-muted">Last Month</span>--}}
{{--                            <span class="float-right">50%</span>--}}
{{--                        </div>--}}
{{--                        <div class="progress mt-1">--}}
{{--                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div>
                                        <h2 class="card-title mb-1" style="font-family: 'Times New Roman'; font-size: x-large;">Liste des livraisons assignées</h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="dataTable my-datatable table table-hover mg-b-0 table table-striped">
                                            <thead style="size: A3">
                                            <tr>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Mise à jour</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Référence</th>
                                                <th class="" style="font-family: 'Palatino Linotype'; font-size:small">Date</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Montant (XAF)</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Client</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Bénéficiaire</th>
                                                <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Statut</th>
                                                <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @forelse(\App\Http\Controllers\DemandeController::demandesAssigne() as $demandeLivraison)
                                                <tr>
                                                    <td>{{ $demandeLivraison->updated_at->toFormattedDatetime()}}</td>
                                                    <td>{{ $demandeLivraison->ref_operation }}</td>
                                                    <td>{{ $demandeLivraison->date_reception->toFormattedDatetime()}}</th>
                                                    <td>{{ \App\Http\Controllers\DemandeController::prixMill($demandeLivraison->montant_livraison) }}</td>
                                                    <td>{{ $demandeLivraison->nom_client }}</td>
                                                    <td>{{ $demandeLivraison->nom_beneficiaire }}</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-pill {{ badgeColor($demandeLivraison->statut_demande_id) }}">
                                                            {{ $demandeLivraison->statutDemande->libelle }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center justify-content-between px-5">
                                                            <a href="{{ route('demandes.show', $demandeLivraison->id) }}" title="Détails">
                                                                <i class="fas fa-bars mr-3"></i>
                                                            </a>
{{--                                                            @if($demandeLivraison->statut_demande_id == DEMANDE_INITIEE)--}}
{{--                                                                <a href="{{ route('demandes.edit', $demandeLivraison->id) }}" title="Assigner" >--}}
{{--                                                                    <i class="fas fa-edit mr-3"></i>--}}
{{--                                                                </a>--}}
{{--                                                            @else--}}
{{--                                                                <a role="link" aria-disabled="true">--}}
{{--                                                                    <i class="fas fa-edit" style="color: #4b4f56"></i>--}}
{{--                                                                </a>--}}
{{--                                                            @endif--}}
{{--                                                            <a href="#" class="" data-toggle="modal" data-target="#deletedata{{$demandeLivraison->id}}" title="Archiver" onclick="event.preventDefault()">--}}
{{--                                                                <i class="fas fa-archive"></i>--}}
{{--                                                            </a>--}}


                                                            <!-- The Modal -->
                                                            <div class="modal" id="deletedata{{$demandeLivraison->id}}">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Archivage de données</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>

                                                                        <!-- Modal body -->
                                                                        <div class="modal-body">
                                                                            Voulez-vous Archiver cette donnée ?
                                                                        </div>

                                                                        <!-- Modal footer -->
                                                                        <div class="modal-footer">
                                                                            <div class="justify-content-between">
                                                                                <a href="{{ route('demandes.destroy', $demandeLivraison->id) }}" class="btn badge-danger" id="swal-warning" style="margin-left: 0px"
                                                                                   onclick="event.preventDefault();document.getElementById('delete-demande{{$demandeLivraison->id}}').submit();">
                                                                                    OUI
                                                                                </a>
                                                                                <form method="post" id="delete-demande{{$demandeLivraison->id}}" action="{{ route('demandes.destroy', $demandeLivraison->id) }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                </form>
                                                                            </div>
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">NON</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr colspan="" class="">Aucune livraison assignée</tr>
                                            @endforelse
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div>
                                        <h2 class="card-title mb-1" style="font-family: 'Times New Roman'; font-size: x-large;">Liste des livraisons en cours</h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="dataTable my-datatable table table-hover mg-b-0 table table-striped">
                                            <thead style="size: A3">
                                            <tr>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Mise à jour</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Référence</th>
                                                <th class="" style="font-family: 'Palatino Linotype'; font-size:small">Date</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Montant (XAF)</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Client</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Bénéficiaire</th>
                                                <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Statut</th>
                                                <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @forelse(\App\Http\Controllers\DemandeController::demandesEncours() as $demandeLivraison)
                                                <tr>
                                                    <td>{{ $demandeLivraison->updated_at->toFormattedDatetime()}}</td>
                                                    <td>{{ $demandeLivraison->ref_operation }}</td>
                                                    <td>{{ $demandeLivraison->date_reception->toFormattedDatetime()}}</th>
                                                    <td>{{ \App\Http\Controllers\DemandeController::prixMill($demandeLivraison->montant_livraison) }}</td>
                                                    <td>{{ $demandeLivraison->nom_client }}</td>
                                                    <td>{{ $demandeLivraison->nom_beneficiaire }}</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-pill {{ badgeColor($demandeLivraison->statut_demande_id) }}">
                                                            {{ $demandeLivraison->statutDemande->libelle }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center justify-content-between px-5">
                                                            <a href="{{ route('demandes.show', $demandeLivraison->id) }}" title="Détails">
                                                                <i class="fas fa-bars mr-3"></i>
                                                            </a>
                                                        {{--                                                            @if($demandeLivraison->statut_demande_id == DEMANDE_INITIEE)--}}
                                                        {{--                                                                <a href="{{ route('demandes.edit', $demandeLivraison->id) }}" title="Assigner" >--}}
                                                        {{--                                                                    <i class="fas fa-edit mr-3"></i>--}}
                                                        {{--                                                                </a>--}}
                                                        {{--                                                            @else--}}
                                                        {{--                                                                <a role="link" aria-disabled="true">--}}
                                                        {{--                                                                    <i class="fas fa-edit" style="color: #4b4f56"></i>--}}
                                                        {{--                                                                </a>--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                            <a href="#" class="" data-toggle="modal" data-target="#deletedata{{$demandeLivraison->id}}" title="Archiver" onclick="event.preventDefault()">--}}
                                                        {{--                                                                <i class="fas fa-archive"></i>--}}
                                                        {{--                                                            </a>--}}


                                                        <!-- The Modal -->
                                                            <div class="modal" id="deletedata{{$demandeLivraison->id}}">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Archivage de données</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>

                                                                        <!-- Modal body -->
                                                                        <div class="modal-body">
                                                                            Voulez-vous Archiver cette donnée ?
                                                                        </div>

                                                                        <!-- Modal footer -->
                                                                        <div class="modal-footer">
                                                                            <div class="justify-content-between">
                                                                                <a href="{{ route('demandes.destroy', $demandeLivraison->id) }}" class="btn badge-danger" id="swal-warning" style="margin-left: 0px"
                                                                                   onclick="event.preventDefault();document.getElementById('delete-demande{{$demandeLivraison->id}}').submit();">
                                                                                    OUI
                                                                                </a>
                                                                                <form method="post" id="delete-demande{{$demandeLivraison->id}}" action="{{ route('demandes.destroy', $demandeLivraison->id) }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                </form>
                                                                            </div>
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">NON</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr colspan="" class="">Aucune livraison en cours</tr>
                                            @endforelse
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>




    <!-- End Row -->

    <!-- Row -->


    <!-- End Row -->

    <!-- Row-->

    <!-- End Row -->

    <!-- A ne pas supprimer -->

    </div>
    </div>

    <!-- End Main Content-->
@endsection
@section('script1')
<script>
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}

</script>
@endsection

