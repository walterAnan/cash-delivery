@extends('layouts.master')




@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Activté des Livreurs</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="row">
                <form action="{{route('data_activites')}}" method="POST">

                    @method('GET')
                    @csrf
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="dateDebut" id="start_date" value="{{date('Y-m-d', strtotime('first day of this month'))}}" placeholder="Start Date" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="dateFin" id="end_date" value="{{date('Y-m-d', strtotime('last day of this month'))}}" placeholder="End Date" readonly>
                                </div>
                            </div>

                            <div>
                                <button id="filter" class="btn btn-outline-info btn-sm"; type=submit">Appliquer</button>
{{--                                <button id="reset" class="btn btn-outline-warning btn-sm">Annuler le filtre</button>--}}
                            </div>
                        </div>
                        </div>


                </form>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless display nowrap" id="records" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Livraisons Effectuées</th>
                                <th>Montant de la livraison</th>
                                <th>Commission Frais de la Livraison</th>
                                <th>Commission du livreur</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($livreurs as $livreur)
                                <tr>
                                    <th scope="row">{{ ($loop->index + 1) }}</th>
                                    <td>{{ $livreur->raisonSociale }}</td>
                                    <td>{{ $livreur->livraisonEffectuees }}</td>
                                    <td>{{ $livreur->montantLivrains }}</td>
                                    <td>{{ $livreur->fraisLivraisons }}</td>
                                    <td>{{ $livreur->commission }}</td>
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


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<!-- Datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
</script>
<!-- Momentjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script>
    $(function() {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });

</script>


    </div>
</div>
@endsection
