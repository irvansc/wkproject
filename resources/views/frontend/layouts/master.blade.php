@include('frontend.layouts.header')

<body>
    @include('frontend.layouts.headnav')
    <!-- End Header -->


    <main id="main">
        @yield('content')

    </main>
    <!-- End #main -->
    <!-- ======= Footer ======= -->
    @include('frontend.layouts.footer')

    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @include('frontend.layouts.script')
