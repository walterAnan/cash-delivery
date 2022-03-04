<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="cash delivery ">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
    @include('components/partials/head')
    @yield('css')
</head>

<body>
<!-- Loader -->
<div id="global-loader">
    <img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">
@include('components/partials/side-bar')
<!-- Main Content-->
    <div class="main-content side-content pt-0">
        @include('components/partials/main-header')
        <div class="container-fluid">
            @yield('page-header')
            @yield('content')
            @include('components/partials/footer')
        </div>
        <!-- End Page -->
@include('components/partials/footer-scripts')
</body>
</html>
