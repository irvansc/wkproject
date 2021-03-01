<!-- General JS Scripts -->
<script src="{{ url('') }}/assets/modules/jquery.min.js"></script>
<script src="{{ url('') }}/assets/modules/jquery.form.js"></script>
<script src="{{ url('') }}/assets/modules/datatables/datatables.min.js"></script>
<script src="{{ url('') }}/assets/modules/popper.js"></script>
<script src="{{ url('') }}/assets/modules/tooltip.js"></script>
<script src="{{ url('') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="{{ url('') }}/assets/modules/moment.min.js"></script>
<script src="{{ url('') }}/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="{{asset('')}}assets/modules/chart/Chart.min.js"></script>
<script src="{{asset('')}}assets/modules/toastr/build/toastr.min.js"></script>
<script src="{{ asset('') }}assets/modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="{{asset('assets/modules/summernote-0.8.18-dist/summernote.min.js')}}"></script>
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="{{ url('') }}/assets/js/scripts.js"></script>
<script src="{{ url('') }}/assets/js/custom.js"></script>
@stack('js')
@yield(' js') <script>
    $('#summernote').summernote();
    @if (Session::has('sukses'))
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: 'success',
        title: '{{ Session::get('sukses') }}'
    })

        @endif
    @if (Session::has('error'))
    const Toast = Swal.mixin({
    toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
})
    Toast.fire({
        icon: 'error',
        title: '{{ Session::get('error') }}'
})

        @endif
</script>
</body>

</html>
