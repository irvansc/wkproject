@include('frontend.layouts.header')
<!-- Navigation star -->
@include('frontend.layouts.headnav')
<!-- navigatin End -->


@yield('content')

<!-- ======= Footer ======= -->
@include('frontend.layouts.footer')

<!-- End Footer -->
<a href="#" class="ignielToTop"></a>
<div id="preloader">

</div>
@include('frontend.layouts.script')
