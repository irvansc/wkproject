<script src="{{asset('')}}theme/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('')}}theme/js/main.js"></script>
<script src="{{asset('')}}theme/vendor/purecounter/purecounter.js"></script>
<script src="{{asset('')}}theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('')}}theme/js/jquery.ripples-min.js"></script>
<script src="{{asset('')}}theme/js/typed.min.js"></script>
<script src="{{asset('')}}theme/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('')}}theme/vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('')}}theme/js/lazyload.js"></script>
<script src="{{asset('')}}theme/js/jQuery.loadScroll.js"></script>
<script src="{{asset('')}}theme/vendor/select2/select2.min.js"></script>
<script src="{{asset('')}}theme/vendor/share/shareon.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('')}}theme/vendor/tilt/tilt.jquery.min.js"></script>
<script src="{{asset('')}}theme/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{ asset('') }}assets/modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="{{asset('')}}assets/modules/toastr/build/toastr.min.js"></script>
<script src="{{ asset('') }}assets/modules/datatables/datatables.min.js"></script>
<script src="{{asset('')}}theme/vendor/fancy/jquery.fancybox.min.js"></script>
<script src="{{asset('')}}theme/vendor/slick/slick.min.js"></script>
<script>
    function toggle() { // toggle
        var a = document.getElementById("style1"); // style sheet id
        a.x = '{{asset('')}}theme/css/style2' == a.x ? '{{asset('')}}theme/css/style' : '{{asset('')}}theme/css/style2'; //switch file loop
        a.href = a.x + '.css'; //add .css
    }
    // Init AOS
 // Preloader

</script>
<script>
    function openInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}
</script>
<script>
    $(document).ready(function(){
          $(".alert").slideDown(300).delay(5000).slideUp(300);
    });
</script>
@stack('jsf')
</body>

</html>
