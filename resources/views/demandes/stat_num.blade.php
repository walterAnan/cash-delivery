@extends('layouts.master')

@section('page-header')

    <!-- Page Header -->
    {{--    <div class="page-header">--}}
    {{--        <div>--}}
    {{--            <h2 class="main-content-title tx-24 mg-b-5">Demandes de Livraison</h2>--}}
    {{--            <ol class="breadcrumb">--}}
    {{--                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>--}}
    {{--                <li class="breadcrumb-item active" aria-current="page"></li>--}}
    {{--            </ol>--}}
    {{--        </div>--}}
    {{--        <div class="d-flex">--}}
    {{--            <div class="mr-2">--}}
    {{--                <a class="btn ripple btn-outline-primary dropdown-toggle mb-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
    {{--                    <i class="fe fe-external-link"></i> Export <i class="fas fa-caret-down ml-1"></i>--}}
    {{--                </a>--}}
    {{--                <div  class="dropdown-menu tx-13">--}}
    {{--                    <a class="dropdown-item" href="#"><i class="far fa-file-pdf mr-2"></i>Export as Pdf</a>--}}
    {{--                    <a class="dropdown-item" href="#"><i class="far fa-image mr-2"></i>Export as Image</a>--}}
    {{--                    <a class="dropdown-item" href="#"><i class="far fa-file-excel mr-2"></i>Export as Excel</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}

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


    <div class="row">
        <div class="col-sm-6 col-md-6 col-xl-3">
            <div class="card custom-card">
                <div class="card-body">
                    <div><i class="fas fa-chart-line mr-1 dash-icon"></i></div>
                    <p class="mb-1 tx-inverse">Number Of Sales</p>
                    <div>
                        <h4 class="dash-25 mb-2">568</h4>
                    </div>
                    <div class="expansion-value d-flex tx-inverse">
                        <strong><i class="fas fa-caret-down mr-1 text-danger"></i> 0.5%</strong>
                        <strong class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.7%</strong>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                    </div>
                    <div class="expansion-label d-flex text-muted">
                        <span>Target</span>
                        <span class="ml-auto">Last Month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xl-3">
            <div class="card custom-card">
                <div class="card-body">
                    <div><i class="fab fa-rev mr-1 dash-icon"></i></div>
                    <p class="mb-1 tx-inverse">New Revenue</p>
                    <div>
                        <h4 class="dash-25 mb-2">$12,897</h4>
                    </div>
                    <div class="expansion-value d-flex tx-inverse">
                        <strong><i class="fas fa-caret-up mr-1 text-success"></i> 0.72%</strong>
                        <strong class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>0.43%</strong>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar"></div>
                    </div>
                    <div class="expansion-label d-flex text-muted">
                        <span>Target</span>
                        <span class="ml-auto">Last Month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xl-3">
            <div class="card custom-card">
                <div class="card-body">
                    <div><i class="fas fa-dollar-sign mr-1 dash-icon"></i></div>
                    <p class="mb-1 tx-inverse">Total Cost</p>
                    <div>
                        <h4 class="dash-25 mb-2">$11,234</h4>
                    </div>
                    <div class="expansion-value d-flex tx-inverse">
                        <strong><i class="fas fa-caret-down mr-1 text-danger"></i> 1.4%</strong>
                        <strong class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>1.44%</strong>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
                    </div>
                    <div class="expansion-label d-flex text-muted">
                        <span>Target</span>
                        <span class="ml-auto">Last Month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xl-3">
            <div class="card custom-card">
                <div class="card-body">
                    <div><i class="fas fa-signal mr-1 dash-icon"></i></div>
                    <p class="mb-1 tx-inverse">Profit By Sale</p>
                    <div>
                        <h4 class="dash-25 mb-2">$789</h4>
                    </div>
                    <div class="expansion-value d-flex tx-inverse">
                        <strong><i class="fas fa-caret-down mr-1 text-danger"></i> 0.4%</strong>
                        <strong class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.9%</strong>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-40p bg-info" role="progressbar"></div>
                    </div>
                    <div class="expansion-label d-flex text-muted">
                        <span>Target</span>
                        <span class="ml-auto">Last Month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div>
                                        <h2 class="card-title mb-1" style="font-family: 'Times New Roman'; font-size: x-large;">Liste des demandes Annulées</h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="dataTable my-datatable table table-hover mg-b-0 table table-striped">
                                            <thead style="size: A3">
                                            <tr>
                                                {{--                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Mise à jour</th>--}}
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Référence</th>
                                                {{--                                                <th class="" style="font-family: 'Palatino Linotype'; font-size:small">Date</th>--}}
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Montant (XAF)</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Client</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Bénéficiaire</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Statut</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Action</th>
                                                {{--                                                <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Statut</th>--}}
                                                {{--                                                <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Actions</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @forelse($demande_livraisons as $demandeLivraison)
                                                <tr>
                                                    {{--                                                    <td>{{ $demandeLivraison->updated_at->toFormattedDatetime()}}</td>--}}
                                                    <td>{{ $demandeLivraison->ref_operation }}</td>
                                                    {{--                                                    <td>{{ $demandeLivraison->date_reception->toFormattedDatetime()}}</th>--}}
                                                    <td>{{ \App\Http\Controllers\DemandeController::prixMill($demandeLivraison->montant_livraison) }}</td>
                                                    <td>{{ $demandeLivraison->nom_client }}</td>
                                                    <td>{{ $demandeLivraison->nom_beneficiaire }}</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-pill {{ badgeColor($demandeLivraison->statut_demande_id) }}">
                                                            {{ $demandeLivraison->statutDemande->libelle }}
                                                        </span>
                                                    </td>
                                                    <td><a type="button" href="{{route('impression', [$demandeLivraison->id])}}" title="Imprimer"  ><i class="fa fa-print" aria-hidden="true"></i></a></td>
                                                </tr>
                                            @empty
                                                <tr colspan="" class="">Aucune demande de livraison disponible</tr>
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


    </div>
    </div>

@endsection
