<!-- General JS Scripts -->
<script src="{{ url('') }}/assets/modules/jquery.min.js"></script>
<script src="{{ url('') }}/assets/modules/datatables/datatables.min.js"></script>
<script src="{{ url('') }}/assets/modules/popper.js"></script>
<script src="{{ url('') }}/assets/modules/tooltip.js"></script>
<script src="{{ url('') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="{{ url('') }}/assets/modules/moment.min.js"></script>
<script src="{{ url('') }}/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="{{asset('')}}assets/modules/toastr/build/toastr.min.js"></script>
<script src="{{ asset('') }}assets/modules/sweetalert/sweetalert.min.js"></script>
<script src="{{asset('assets/modules/summernote-0.8.18-dist/summernote.min.js')}}"></script>
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="{{ url('') }}/assets/js/scripts.js"></script>
<script src="{{ url('') }}/assets/js/custom.js"></script>
@yield(' js') <script>
    $('#summernote').summernote();
    @if (Session::has('sukses'))
        // Display a success toast, with a title
        toastr.success("{{ Session::get('sukses') }}", "Sukses",
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        });
        @endif
        @if (Session::has('error'))
        // Display a success toast, with a title
        toastr.error("{{ Session::get('error') }}", "Error",
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        });
        @endif
</script>
</body>

</html>
