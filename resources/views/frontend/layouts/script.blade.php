<!-- Vendor JS Files -->
<script src="{{asset('')}}theme/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('')}}theme/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="{{asset('')}}theme/vendor/aos/aos.js"></script>
<script src="{{asset('')}}theme/vendor/php-email-form/validate.js"></script>
<script src="{{asset('')}}theme/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('')}}theme/vendor/purecounter/purecounter.js"></script>
<script src="{{asset('')}}theme/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('')}}theme/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{url('')}}theme/vendor/theme/vendor/fontawesome/js/all.js"></script>
{{-- <script src="{{asset('')}}theme/js/script.js"></script> --}}
<script src="{{asset('')}}theme/js/jssocials.js"></script>
<!-- Template Main JS File -->
<script src="{{asset('')}}theme/js/main.js"></script>
<script src="{{ asset('') }}theme/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="{{asset('')}}theme/vendor/toastr/build/toastr.min.js"></script>
<script src="{{ asset('') }}assets/modules/datatables/datatables.min.js"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-603f753c44417691"></script>
<script src="{{asset('')}}theme/vendor/typed/typed.min.js"></script>
@stack('jsf')

<script>
    $(document).ready(function(){
          $(".alert").slideDown(300).delay(5000).slideUp(300);
    });
</script>
</body>

</html>
