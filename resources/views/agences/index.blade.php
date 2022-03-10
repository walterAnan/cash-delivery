@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Agences</h2>
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

@endsection

@section('content')





    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title mb-1">Liste des Agences</h6>
                                        <a class="btn ripple btn-info" style="background-color: #4a9e04; margin-bottom: 25px" href="{{route('agences.create')}}">Ajouter</a>
                                    </div>
                                    <div class="table-responsive">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif
                                        <table class="dataTable my-datatable table table-hover mg-b-0" id="my-datatable">
                                            <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>Code</th>
                                                <th>Nom Agence</th>
                                                <th class="text-center">Statut</th>
                                                <th class="text-center">Actions</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($agences as $agence)
                                                <tr>
                                                <th scope="row">{{ ($loop->index + 1) }}</th>
                                                <td>{{ $agence->codeAgence }}</td>
                                                <td>{{ $agence->nomAgence }}</td>

                                                <td class="text-center"><span class="badge badge-pill badge-{{ $agence->statutColor }}">{{ $agence->statut->libelle }}</span></td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-between px-1">
                                                        <a href="{{ route('agences.show', $agence->id) }}" >
                                                            <i class="fas fa-bars "></i>
                                                        </a>
                                                        <a href="{{ route('agences.edit', $agence->id) }}" >
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <!-- Button to Open the Modal -->
                                                        <a href="#" class="" data-toggle="modal" data-target="#deletedata" title="Archiver" onclick="event.preventDefault()">
                                                            <i class="fas fa-archive"></i>
                                                        </a>

                                                        <!-- The Modal -->
                                                        <div class="modal" id="deletedata">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Suppression de données</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        Voulez-vous supprimer cette donnée ?
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <div class="justify-content-between">
                                                                            <a href="{{ route('agences.destroy', $agence->id) }}" class="btn badge-danger" id="swal-warning" style="margin-left: 0px"
                                                                               onclick="event.preventDefault();document.getElementById('delete-agence').submit();">
                                                                                OUI
                                                                            </a>
                                                                            <form method="post" id="delete-agence" action="{{ route('agences.destroy', $agence->id) }}">
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
                                                <tr colspan="" class="">Aucune agence disponible</tr>
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

</div>
</div>
@endsection
