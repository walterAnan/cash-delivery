@extends('layouts.master')

@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Utilisateurs</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Liste des utilisateurs</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table mg-b-0">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Agence</th>
                                <th class="text-center">Actions</th>
                                <th><a class="btn ripple btn-info" style="background-color: #4a9e04" href="{{route('admin.users.create')}}">Ajouter</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($this->users as $index => $user)
                                <tr class="">
                                    <th scope="row" class="text-center">
                                        <img src="{{ $user['profile_photo_url'] }}" class="rounded-circle" height="40px" width="40px">
                                    </th>
                                    <td class="">{{ $user['name'] }}</td>
                                    <td class="">{{ $user['email'] }}</td>
                                    <td class="">{{ $user['agence']['nomAgence'] }}</td>
                                    <td class="text-center flex">
                                        <a href="{{ route('admin.users.show', $user['id']) }}" title="Détails" type="button" class="px-2 flex-grow-1">
                                            <i class="fe fe-menu"></i>
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user['id']) }}" title="Editer" type="button" class="px-2 flex-grow-1">
                                            <i class="fe fe-edit-3"></i>
                                        </a>
                                        <a href="#" class="" data-toggle="modal" data-target="#deletedata{{$user['id']}}" title="Archiver" onclick="event.preventDefault()">
                                            <i class="fas fa-archive"></i>
                                        </a>

                                        <!-- The Modal -->
                                        <div class="modal" id="deletedata{{$user['id']}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Suppression de données</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        Voulez-vous supprimer cet utilisateur ?
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <div class="justify-content-between">
                                                            <a href="{{ route('admin.users.destroy', $user['id']) }}" class="btn badge-danger" id="swal-warning" style="margin-left: 0px"
                                                               onclick="event.preventDefault();document.getElementById('delete-agent{{$user['id']}}').submit();">
                                                                OUI
                                                            </a>
                                                            <form method="post" id="delete-agent{{$user['id']}}" action="{{ route('admin.users.destroy', $user['id']) }}">
                                                                @csrf
                                                                @method('get')
                                                            </form>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">NON</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
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
@endsection
