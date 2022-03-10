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
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div>
                                        <h2 class="card-title mb-1" style="font-family: 'Times New Roman'; font-size: x-large;">Liste des demandes de livraison</h2>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover mg-b-0 table table-striped">
                                            <thead style="size: A3">
                                            <tr>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Code</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Référence</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Montant (XAF)</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Client</th>
                                                <th style="font-family: 'Palatino Linotype'; font-size:small">Bénéficiaire</th>
                                                <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Statut</th>
                                                <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @forelse($demande_livraisons as $demandeLivraison)
                                                <tr>
                                                    <th scope="row">{{ ($loop->index + 1) }}</th>
                                                    <td>{{ $demandeLivraison->ref_operation }}</td>
                                                    <td>{{ $demandeLivraison->montant_livraison }}</td>
                                                    <td>{{ $demandeLivraison->nom_client }}</td>
                                                    <td>{{ $demandeLivraison->nom_beneficiaire }}</td>
                                                    <td>{{ $demandeLivraison->statut_livraison->value }}</td>
                                                    <td class="text-center">
                                                        <div class="flex items-center justify-between">
                                                            <a href="{{ route('demandes.show', $demandeLivraison->id) }}" class="btn badge-primary" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
                                                                Détails
                                                            </a>
                                                            <a href="{{ route('demandes.edit', $demandeLivraison->id) }}" class="btn badge-secondary" style="margin-left: 5px; background-color: snow; color: #0c0e13; border-radius: 2px; border: 0.5px solid #555555; height: 1px" >
                                                                Assigner
                                                            </a>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deletedata" style="margin-left: 5px; background-color: snow; color: #0c0e13; border: 0.5px solid #555555;border-radius: 2px ; height: 1px">
                                                                Archiver
                                                            </button>

                                                            <!-- The Modal -->
                                                            <div class="modal" id="deletedata">
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
                                                                                   onclick="event.preventDefault();document.getElementById('delete-demande').submit();">
                                                                                    OUI
                                                                                </a>
                                                                                <form method="post" id="delete-demande" action="{{ route('demandes.destroy', $demandeLivraison->id) }}">
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
                                                <tr colspan="" class="">Aucune demande de livraison disponible</tr>
                                            @endforelse
                                            </tbody>

                                        </table>
                                        {{$demande_livraisons->links()}}
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
