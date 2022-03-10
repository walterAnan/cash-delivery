@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Incidents</h2>
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
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-1">Liste des Incidents</h6>
                                        <a class="btn ripple btn-info" style="background-color: #4a9e04; margin-bottom: 25px" href="{{route('incidents.create')}}">Ajouter</a>
                                    </div>
                                    <div class="table-responsive">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif
                                        <table class="dataTable my-datatable table table-hover mg-b-0">
                                            <thead>
                                            <tr>
                                                <th>N</th>
                                                <th>Code</th>
                                                <th>Descption Incident</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($incidents as $incident)
                                                <tr>
                                                    <th scope="row">{{ ($loop->index + 1) }}</th>
                                                    <td>{{ $incident->codeIncident }}</td>
                                                    <td>{{ $incident->descriptionIncident }}</td>
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center justify-content-between px-1">
                                                            <a href="{{ route('incidents.show', $incident->id) }}" >
                                                                <i class="fas fa-bars "></i>
                                                            </a>
                                                            <a href="{{ route('incidents.edit', $incident->id) }}" >
                                                               <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="" data-toggle="modal" data-target="#deletedata" title="Archiver" onclick="event.preventDefault()">
                                                                <i class="fas fa-archive"></i>
                                                            </a>


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
                                                                            Voulez-vous Spprimer cette donnée ?
                                                                        </div>

                                                                        <!-- Modal footer -->
                                                                        <div class="modal-footer">
                                                                            <div class="justify-content-between">
                                                                                <a href="{{ route('demandes.destroy', $incident->id) }}" class="btn badge-danger" id="swal-warning" style="margin-left: 0px"
                                                                                   onclick="event.preventDefault();document.getElementById('delete-incident').submit();">
                                                                                    OUI
                                                                                </a>
                                                                                <form method="post" id="delete-incident" action="{{ route('incidents.destroy', $incident->id) }}">
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
                                                <tr colspan="" class="">Aucune Incidence Signaléé</tr>
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
