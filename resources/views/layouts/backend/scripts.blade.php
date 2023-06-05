<!-- jQuery -->
<script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('backend/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('backend/dist/js/jquery.slimscroll.js') }}"></script>

<!-- Data Table JavaScript -->
<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/dataTables-data.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('backend/dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- FeatherIcons JavaScript -->
<script src="{{ asset('backend/dist/js/feather.min.js') }}"></script>

<!-- Toggles JavaScript -->
<script src="{{ asset('backend/vendors/jquery-toggles/toggles.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/toggle-data.js') }}"></script>

<!-- Counter Animation JavaScript -->
<script src="{{ asset('backend/vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('backend/vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>

<!-- EChartJS JavaScript -->
<script src="{{ asset('backend/vendors/echarts/dist/echarts-en.min.js') }}"></script>

<!-- Owl JavaScript -->
<script src="{{ asset('backend/vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>

<!-- Toastr JS -->
<script src="{{ asset('backend/vendors/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('backend/dist/js/init.js') }}"></script>

<!-- Toastr Javascript -->
<script src="{{ asset('toastr/toastr.min.js') }}"></script>

<script src="{{ asset('toggle/bootstrap-toggle.min.js') }}"></script>


<!-- TTCL Web JavaScript -->
<script src="{{ asset('backend/dist/js/ttclweb.js') }}"></script>


<script>
  @if(Session::has('messege'))
  var type = "{{Session::get('alert-type','info')}}"
  switch (type) {
    case 'info':
      toastr.info("{{ Session::get('messege') }}");
      break;
    case 'success':
      toastr.success("{{ Session::get('messege') }}");
      break;
    case 'warning':
      toastr.warning("{{ Session::get('messege') }}");
      break;
    case 'error':
      toastr.error("{{ Session::get('messege') }}");
      break;
  }
  @endif
</script>

@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
  toastr.error('{{ $error }}');
</script>
@endforeach
@endif