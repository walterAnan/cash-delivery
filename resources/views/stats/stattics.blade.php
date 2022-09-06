@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Statistiques</div>

                    <div class="card-body">

                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script1')
    <script>
        {!! $chart1->renderChartJsLibrary() !!}
        {!! $chart1->renderJs() !!}
    </script>
@endsection
