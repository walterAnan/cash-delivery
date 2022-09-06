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


                                            @forelse($demande_livraisons as $demandeLivraison)
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
                                                            @if($demandeLivraison->statut_demande_id == DEMANDE_INITIEE)
                                                                <a href="{{ route('demandes.edit', $demandeLivraison->id) }}" title="Assigner" >
                                                                    <i class="fas fa-edit mr-3"></i>
                                                                </a>
                                                            @else
                                                                <a role="link" aria-disabled="true">
                                                                    <i class="fas fa-edit" style="color: #4b4f56"></i>
                                                                </a>
                                                            @endif
                                                            @if($demandeLivraison->statut_demande_id == DEMANDE_EFFECTUEE || $demandeLivraison->statut_demande_id == DEMANDE_ANNULEE)
                                                                <a href="#" class="" data-toggle="modal" data-target="" title="Annuler">
                                                                    <i class="fas fa-archive" style="color: #4b4f56"></i>
                                                                </a>
                                                            @else
                                                            <a href="#" class="" data-toggle="modal" data-target="#deletedata{{$demandeLivraison->id}}" title="Annuler" onclick="event.preventDefault()">
                                                                <i class="fas fa-archive" ></i>
                                                            </a>
                                                            @endif


                                                            <div class="modal" id="deletedata{{$demandeLivraison->id}}">
                                                                @livewire('motif', ['demande_livraison' => $demandeLivraison ])
                                                            </div>


                                                            <!-- The Modal -->
{{--                                                            <div class="modal" id="deletedata{{$demandeLivraison->id}}">--}}
{{--                                                                <div class="modal-dialog">--}}
{{--                                                                    <div class="modal-content">--}}

{{--                                                                        <!-- Modal Header -->--}}
{{--                                                                        <div class="modal-header">--}}
{{--                                                                            <h4 class="modal-title">Annulation de la demande</h4>--}}
{{--                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                                                                        </div>--}}

{{--                                                                        <!-- Modal body -->--}}
{{--                                                                        <div class="modal-body">--}}
{{--                                                                            Voulez-vous Annuler cette demande ?--}}
{{--                                                                        </div>--}}

{{--                                                                        <!-- Modal footer -->--}}
{{--                                                                        <div class="modal-footer">--}}
{{--                                                                            <div class="justify-content-between">--}}
{{--                                                                                <a href="{{ route('demandes.destroy', $demandeLivraison->id) }}" class="btn badge-danger" id="swal-warning" style="margin-left: 0px"--}}
{{--                                                                                   onclick="event.preventDefault();document.getElementById('delete-demande{{$demandeLivraison->id}}').submit();">--}}
{{--                                                                                    OUI--}}
{{--                                                                                </a>--}}
{{--                                                                                <form method="post" id="delete-demande{{$demandeLivraison->id}}" action="{{ route('demandes.destroy', $demandeLivraison->id) }}">--}}
{{--                                                                                    @csrf--}}
{{--                                                                                    @method('delete')--}}
{{--                                                                                </form>--}}
{{--                                                                            </div>--}}
{{--                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">NON</button>--}}
{{--                                                                        </div>--}}

{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
                                                        </div>
                                                    </td>
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
