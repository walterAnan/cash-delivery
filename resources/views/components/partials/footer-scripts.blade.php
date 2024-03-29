

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


        @livewireScripts

		<!-- Bootstrap js-->
		<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Ionicons js-->
		<script src="{{ URL::asset('assets/plugins/ionicons/ionicons.js') }}"></script>

		<!-- Rating js-->
		<script src="{{ URL::asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

{{--		@yield('js')--}}

        <!-- Flot Chart js-->
        <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
        <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>

        <!-- Chart.Bundle js-->
        <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

        <!-- Peity js-->
        <script src="{{ URL::asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>

        <!-- Jquery-Ui js-->
        <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

        <!-- Select2 js-->
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

        <!--MutipleSelect js-->
        <script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js')}}"></script>

        <!-- Jquery.mCustomScrollbar js-->
        <script src="{{ URL::asset('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

        <!-- index -->
        <script src="{{ URL::asset('assets/js/index.js')}}"></script>

		<!-- Perfect-scrollbar js-->
		<script src="{{ URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

		<!-- Sidemenu js-->
		<script src="{{ URL::asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

		<!-- Sidebar js-->
		<script src="{{ URL::asset('assets/plugins/sidebar/sidebar.js') }}"></script>

		<!-- Sticky js-->
		<script src="{{ URL::asset('assets/js/sticky.js') }}"></script>

		<!-- Custom js-->
		<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

        <script src="{{ asset('assets/plugins/select2/css/select2.min.css')}}"></script>

        <!-- Form-elements js-->
        <script src="{{ URL::asset('assets/js/advanced-form-elements.js')}}"></script>
        <script src="{{ URL::asset('assets/js/select2.js')}}"></script>

        <!--Sumoselect js-->
        <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

        <!--Alert js-->

        <script src="{{ URL::asset('assets/js/check-all-mail.js')}}"></script>
        <!-- Sweet-Alert js-->
        <script src="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/sweet-alert/dark-jquery.sweet-alert.js')}}"></script>

        <!-- Data Table js -->
        <script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/table-data.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('.my-datatable').DataTable( {
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json'
                    },
                    "ordering": false,
                } );
            } )

            // $(document).ready(function() {
            //     $('.my-datatable').DataTable( {
            //         language: {
            //             url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json'
            //         },
            //         "ordering": false,
            //         "searching": false,
            //     } );
            // } )



{{--            {!! $chart1->renderChartJsLibrary() !!}--}}
{{--            {!! $chart1->renderJs() !!}--}}
        </script>
        <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>


