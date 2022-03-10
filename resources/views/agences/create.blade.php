@extends('layouts.master')



@section('page-header')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Nouvelle Agence</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Bord</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row row-sm mg-b-20">
                        <form action="{{ route('agences.store') }}" data-parsley-validate="" method="POST">
                            @csrf
                            <div class="">
                                <div class="row">
{{--                                    <div class="col-lg-12 form-group">--}}
{{--                                        <label class="form-label">Code Agence: <span class="tx-danger">*</span></label>--}}
{{--                                        <input class="form-control" name="codeAgence" placeholder="Code Agence" required type="text">--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12 form-group">
                                        <label class="form-label">Nom Agence: <span class="tx-danger">*</span></label>
                                        <input class="form-control" name="nomAgence" placeholder="Nom Agence" required type="text">
                                    </div>

                                    <div class="col-lg-12 form-group">
                                        <label class="form-label">Quartier: <span class="tx-danger">*</span></label>
                                        <textarea name="adresseAgence" cols="30" rows="5"></textarea>
{{--                                        <select class="form-control select2" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required>--}}
{{--                                            <option label="Choose one">--}}
{{--                                            </option>--}}
{{--                                            <option value="Firefox">--}}
{{--                                                MBOLO--}}
{{--                                            </option>--}}
{{--                                            <option value="Chrome">--}}
{{--                                                MBOLO1--}}
{{--                                            </option>--}}
{{--                                            <option value="Safari">--}}
{{--                                                MBOLO2--}}
{{--                                            </option>--}}
{{--                                            <option value="Opera">--}}
{{--                                                MBOLO3--}}
{{--                                            </option>--}}
{{--                                            <option value="Internet Explorer">--}}
{{--                                                MBOLO4--}}
{{--                                            </option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                    </div>

                                    <div class="col-lg-12 form-group">
                                        <select class="form-control select" name="statut_agence_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required>
                                            <option label="Choose one">
                                            </option>
                                            @foreach($status as $statut)
                                                <option value="{{ $statut->id }}">{{ $statut->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <button class="btn ripple btn-main-primary btn-block" type="submit" style="background-color: #4a9e04">Créer</button>
                                    </div>

                                <div class="col-lg-6">
                                    <a href="{{ route('incidents.index') }}" type="buttton" class="btn ripple btn-danger btn-block">Annuler</a>
                                </div>

                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>
    </div>
@endsection
