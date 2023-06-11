  <!-- General JS Scripts -->
  <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/modules/popper.js') }}"></script>
  <script src="{{ asset('dist/modules/tooltip.js') }}"></script>
  <script src="{{ asset('dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('dist/modules/moment.min.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('dist/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('dist/modules/izitoast/js/iziToast.min.js') }}"></script>
  <script src="{{ asset('dist/modules/sweetalert/sweetalert.min.js') }}"></script>
  <script src="{{ asset('dist/modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('dist/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('dist/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('dist/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('dist/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('dist/modules/jquery-ui/jquery-ui.min.js') }}"></script>

  <script src="{{ asset('dist/js/stisla.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('dist/js/page/forms-advanced-forms.js') }}"></script>
    <script src="{{ asset('dist/js/page/modules-datatables.js') }}"></script>


  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('dist/js/scripts.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js') }}"></script>
  <script>
    $(document).ready(function(){
        $('.coba').on('click',function(e){
            e.preventDefault();
            var title = $(this).attr('title');
            console.log(title);
        })
    })
  </script>

  @include('template.alert')
</body>
</html>
