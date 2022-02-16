@extends('layouts.master')

@section('page-header')
    <!-- Page Header -->

    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Utilisateurs</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item active"><a href="{{route('admin.users.index')}}">Utilisateurs</a></li>
                <li class="breadcrumb-item active" aria-current="page">Détails</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

@endsection

@section('content')


    </div>
    </div>
@endsection
