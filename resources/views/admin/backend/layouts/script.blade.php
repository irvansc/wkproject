<!-- Bootstrap core JavaScript-->
<script src="{{asset('')}}assets/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('')}}assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('')}}assets/js/sb-admin-2.min.js"></script>
<script src="{{asset('')}}assets/vendor/toastr/build/toastr.min.js"></script>
<script src="{{ asset('') }}assets/vendor/sweetalert/sweetalert.min.js"></script>
@yield('js')
<script>
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
