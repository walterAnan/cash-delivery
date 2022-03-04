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
                    <i class="fe fe-external-link"></i> Export <i class="fas fa-caret-down ml-1"></i>
                </a>
                <div  class="dropdown-menu tx-13">
                    <a class="dropdown-item" href="#"><i class="far fa-file-pdf mr-2"></i>Export as Pdf</a>
                    <a class="dropdown-item" href="#"><i class="far fa-image mr-2"></i>Export as Image</a>
                    <a class="dropdown-item" href="#"><i class="far fa-file-excel mr-2"></i>Export as Excel</a>
                </div>
            </div>
            <div class="">
                <a href="#" class="btn ripple btn-secondary navresponsive-toggler mb-0" data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-filter mr-1"></i>  Filter <i class="fas fa-caret-down ml-1"></i>
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
                        <p class="mb-1 tx-inverse">Nombre de Demande de livraison</p>
                        <div class="ml-auto">
                            <i class="fas fa-chart-line fs-20 text-primary"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">{{\App\Http\Controllers\DemandeController::nombreT_nouvelle_demande()}}</h3>
                    </div>
                    <!--
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                    </div>
                    -->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Montant Total des Livraisons</p>
                        <div class="ml-auto">
                            <i class="fas fa-dollar-sign fs-20 text-success"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">{{\App\Http\Controllers\DemandeController::chiffreAffaires()}} F XAF</h3>
                    </div>
                    <!--
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar"></div>
                    </div>
                    -->
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Montant Total des Commissions</p>
                        <div class="ml-auto">
                            <i class="fas fa-dollar-sign fs-20 text-success"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25">{{\App\Http\Controllers\DemandeController::commission()}}F XAF</h3>
                    </div>
                    <!--
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
                    </div>
                    -->

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card custom-card">
                <div class="card-body dash1">
                    <div class="d-flex">
                        <p class="mb-1 tx-inverse">Le plus gros montant </p>
                        <div class="ml-auto">
                            <i class="fas fa-signal fs-20 text-info"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="dash-25"> {{\App\Http\Controllers\DemandeController::montantMax()}}xaf</h3>
                    </div>
                    <!--
                    <div class="progress mb-1">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-40p bg-info" role="progressbar"></div>
                    </div>
                    <div class="expansion-label d-flex text-muted">
                        <span class="text-muted">Last Month</span>
                        <span class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.9%</span>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
    <!--End  Row -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-8 col-lg-8">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div class="card-option d-flex">
                        <div>
                            <h6 class="card-title mb-1">Overview of Sales Win/Lost</h6>
                            <p class="text-muted card-sub-title">Comapred to last month sales.</p>
                        </div>
                        <div class="card-option-title ml-auto">
                            <div class="btn-group p-0">
                                <button class="btn btn-light btn-sm" type="button">Month</button>
                                <button class="btn btn-outline-light btn-sm" type="button">Year</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="sales"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4 col-lg-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Cost BreakDown</h6>
                        <p class="text-muted card-sub-title">Excepteur sint occaecat cupidatat non proident.</p>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6 text-center">
                            <div class="mb-2">
                                <span class="peity-donut" data-peity='{ "fill": ["#eb6f33", "#77778e33"], "innerRadius": 14, "radius": 20 }'>4/7</span>
                            </div>
                            <p class="mb-1 tx-inverse">Marketing</p>
                            <h4 class="mb-1"><span>$</span>67,927</h4>
                            <span class="text-muted fs-12"><i class="fas fa-caret-up mr-1 text-success"></i>54% last month</span>
                        </div>
                        <div class="col-6 col-md-6 text-center">
                            <div class="mb-2">
                                <span class="peity-donut" data-peity='{ "fill": ["#01b8ff", "#77778e33"], "innerRadius": 14, "radius": 20 }'>2/7</span>
                            </div>
                            <p class="mb-1 tx-inverse">Sales</p>
                            <h4 class="mb-1"><span>$</span>24,789</h4>
                            <span class="text-muted fs-12"><i class="fas fa-caret-down mr-1 text-danger"></i>33% last month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Monthly Profits</h6>
                        <p class="text-muted card-sub-title">Excepteur sint occaecat cupidatat non proident.</p>
                    </div>
                    <h3><span>$</span>22,534</h3>
                    <div class="clearfix mb-3">
                        <div class="clearfix">
                            <span class="float-left text-muted">This Month</span>
                            <span class="float-right">75%</span>
                        </div>
                        <div class="progress mt-1">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-70p bg-primary" role="progressbar"></div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="clearfix">
                            <span class="float-left text-muted">Last Month</span>
                            <span class="float-right">50%</span>
                        </div>
                        <div class="progress mt-1">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-4 col-lg-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Activity</h6>
                        <p class="text-muted mb-0 card-sub-title">Nemo enim ipsam voluptatem fugit sequi nesciunt.</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="activity-block">
                        <ul class="task-list">
                            <li>
                                <i class="task-icon bg-success"></i>
                                <h6>Successful Purchase<small class="float-right text-muted tx-11">29 Oct 2019</small></h6>
                                <span class="text-muted tx-12">Order ID: #4567</span>
                            </li>
                            <li>
                                <i class="task-icon bg-secondary"></i>
                                <h6>New Registered Seller<small class="float-right text-muted tx-11">25 Oct 2019</small></h6>
                                <span class="text-muted tx-12">User ID: #8976</span>
                            </li>
                            <li>
                                <i class="task-icon bg-primary"></i>
                                <h6>Order Verification<small class="float-right text-muted tx-11">14 Oct 2019</small></h6>
                                <span class="text-muted tx-12">Order ID: #6290</span>
                            </li>
                            <li>
                                <i class="task-icon bg-info"></i>
                                <h6>New Item Added<small class="float-right text-muted tx-11">02 Oct 2019</small></h6>
                                <span class="text-muted tx-12">Item ID: #0235</span>
                            </li>
                            <li>
                                <i class="task-icon bg-danger"></i>
                                <h6>Purchase Cancellation<small class="float-right text-muted tx-11">28 Sep 2019</small></h6>
                                <span class="text-muted tx-12">Order ID: #1905</span>
                            </li>
                            <li class="mb-0">
                                <i class="task-icon bg-warning"></i>
                                <h6>Overdue Shipments<small class="float-right text-muted tx-11">25 Sep 2019</small></h6>
                                <span class="text-muted tx-12">Order ID: #8902</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4 col-lg-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Top Users Conversion Rate</h6>
                        <p class="text-muted mb-0 card-sub-title">Nemo enim ipsam voluptatem fugit sequi nesciunt.</p>
                    </div>
                </div>
                <div class="user-manager scroll-widget border-top">
                    <div class="table-responsive">
                        <table class="table mg-b-0">
                            <tbody>
                            <tr>
                                <td class="bd-t-0">
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/2.jpg')}}"></div>
                                </td>
                                <td class="bd-t-0">
                                    <h6 class="mg-b-0">Socrates Itumay</h6><small class="tx-11 tx-gray-500">Sales Manager1</small>
                                </td>
                                <td class="bd-t-0">
                                    <h6 class="mg-b-0 font-weight-bold">34%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/3.jpg')}}"></div>
                                </td>
                                <td >
                                    <h6 class="mg-b-0">Reynante Labares</h6><small class="tx-11 tx-gray-500">Sales Manager2</small>
                                </td>
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">22%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/4.jpg')}}"></div>
                                </td>
                                <td >
                                    <h6 class="mg-b-0">Owen Bongcaras</h6><small class="tx-11 tx-gray-500">Sales Manager3</small>
                                </td>
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">18%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/5.jpg')}}"></div>
                                </td>
                                <td >
                                    <h6 class="mg-b-0">Mariane Galeon</h6><small class="tx-11 tx-gray-500">Sales Manager4</small>
                                </td >
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">15%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/6.jpg')}}"></div>
                                </td>
                                <td >
                                    <h6 class="mg-b-0">Joyce Chua</h6><small class="tx-11 tx-gray-500">Sales Manager5</small>
                                </td>
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">12%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/7.jpg')}}"></div>
                                </td>
                                <td>
                                    <h6 class="mg-b-0">Sonia	Fraser</h6><small class="tx-11 tx-gray-500">Sales Manager5</small>
                                </td>
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">11%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/4.jpg')}}"></div>
                                </td>
                                <td >
                                    <h6 class="mg-b-0">Owen Bongcaras</h6><small class="tx-11 tx-gray-500">Sales Manager3</small>
                                </td>
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">18%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/5.jpg')}}"></div>
                                </td>
                                <td >
                                    <h6 class="mg-b-0">Mariane Galeon</h6><small class="tx-11 tx-gray-500">Sales Manager4</small>
                                </td >
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">15%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/4.jpg')}}"></div>
                                </td>
                                <td >
                                    <h6 class="mg-b-0">Owen Bongcaras</h6><small class="tx-11 tx-gray-500">Sales Manager3</small>
                                </td>
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">18%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div class="main-img-user"><img alt="avatar" src="{{URL::asset('assets/img/users/5.jpg')}}"></div>
                                </td>
                                <td >
                                    <h6 class="mg-b-0">Mariane Galeon</h6><small class="tx-11 tx-gray-500">Sales Manager4</small>
                                </td >
                                <td >
                                    <h6 class="mg-b-0 font-weight-bold">15%</h6><small class="tx-11 tx-gray-500">Conversion Rate</small>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4 col-lg-4">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Countrywise Sales</h6>
                        <p class="text-muted mb-0 card-sub-title">Nemo enim ipsam voluptatem fugit sequi nesciunt.</p>
                    </div>
                </div>
                <div class="country-sales scroll-widget bd-t">
                    <div class="list-group">
                        <div class="list-group-item  d-flex border-right-0 border-left-0 border-top-0">
                            <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                            <p class="ml-3 mb-0">United States</p>
                            <span class="ml-auto font-weight-bold">$12,897</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0">
                            <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Netherlands</p>
                            <span class="ml-auto font-weight-bold">$11,789</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0">
                            <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                            <p class="ml-3 mb-0">United Kingdom</p>
                            <span class="ml-auto font-weight-bold">$10,234</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0">
                            <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Canada</p>
                            <span class="ml-auto font-weight-bold">$9,104</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0">
                            <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Australia</p>
                            <span class="ml-auto font-weight-bold">$16,205</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0">
                            <i class="flag-icon flag-icon-si flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Slovenia</p>
                            <span class="ml-auto font-weight-bold">$18,165</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0 rounded-0">
                            <i class="flag-icon flag-icon-de flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Denmark</p>
                            <span class="ml-auto font-weight-bold">$19,765</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0">
                            <i class="flag-icon flag-icon-si flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Slovenia</p>
                            <span class="ml-auto font-weight-bold">$18,165</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0 rounded-0">
                            <i class="flag-icon flag-icon-de flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Denmark</p>
                            <span class="ml-auto font-weight-bold">$19,765</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0">
                            <i class="flag-icon flag-icon-si flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Slovenia</p>
                            <span class="ml-auto font-weight-bold">$18,165</span>
                        </div>
                        <div class="list-group-item d-flex border-right-0 border-left-0 rounded-0">
                            <i class="flag-icon flag-icon-de flag-icon-squared"></i>
                            <p class="ml-3 mb-0">Denmark</p>
                            <span class="ml-auto font-weight-bold">$19,765</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Product Summary</h6>
                        <p class="text-muted card-sub-title">Nemo enim ipsam voluptatem fugit sequi nesciunt.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th>#No</th>
                                <th>Client Name</th>
                                <th>Product ID</th>
                                <th>Product</th>
                                <th>Product Cost</th>
                                <th>Payment Mode</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#01</td>
                                <td>Sean Black</td>
                                <td>PRO12345</td>
                                <td>Mi LED Smart TV 4A 80</td>
                                <td>$14,500</td>
                                <td>Online Payment</td>
                                <td><span class="badge badge-success">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>#02</td>
                                <td>Evan Rees</td>
                                <td>PRO8765</td>
                                <td>Thomson R9 122cm (48 inch) Full HD LED TV </td>
                                <td>$30,000</td>
                                <td>Cash on delivered</td>
                                <td><span class="badge badge-primary">Add Cart</span></td>
                            </tr>
                            <tr>
                                <td>#03</td>
                                <td>David Wallace</td>
                                <td>PRO54321</td>
                                <td>Vu 80cm (32 inch) HD Ready LED TV</td>
                                <td>$13,200</td>
                                <td>Online Payment</td>
                                <td><span class="badge badge-secondary">Pending</span></td>
                            </tr>
                            <tr>
                                <td>#04</td>
                                <td>Julia Bower</td>
                                <td>PRO97654</td>
                                <td>Micromax 81cm (32 inch) HD Ready LED TV</td>
                                <td>$15,100</td>
                                <td>Cash on delivered</td>
                                <td><span class="badge badge-info">Delivering</span></td>
                            </tr>
                            <tr>
                                <td>#05</td>
                                <td>Kevin James</td>
                                <td>PRO4532</td>
                                <td>HP 200 Mouse &amp; Wireless Laptop Keyboard </td>
                                <td>$5,987</td>
                                <td>Online Payment</td>
                                <td><span class="badge badge-danger">Shipped</span></td>
                            </tr>
                            <tr>
                                <td>#06</td>
                                <td>Theresa	Wright</td>
                                <td>PRO6789</td>
                                <td>Digisol DG-HR3400 Router </td>
                                <td>$11,987</td>
                                <td>Cash on delivered</td>
                                <td><span class="badge badge-secondary">Delivering</span></td>
                            </tr>
                            <tr>
                                <td>#07</td>
                                <td>Sebastian	Black</td>
                                <td>PRO4567</td>
                                <td>Dell WM118 Wireless Optical Mouse</td>
                                <td>$4,700</td>
                                <td>Online Payment</td>
                                <td><span class="badge badge-info">Add to Cart</span></td>
                            </tr>
                            <tr>
                                <td>#08</td>
                                <td>Kevin Glover</td>
                                <td>PRO32156</td>
                                <td>Dell 16 inch Laptop Backpack </td>
                                <td>$678</td>
                                <td>Cash On delivered</td>
                                <td><span class="badge badge-success">Delivered</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- A ne pas supprimer -->
    </div>
    </div>
    <!-- End Main Content-->
@endsection
