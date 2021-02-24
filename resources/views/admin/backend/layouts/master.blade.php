@include('admin.backend.layouts.header')

<body>
    <div id="app">
        <div class="main-wrapper ">
            <div class="navbar-bg"></div>
            @include('admin.backend.layouts.navbar')
            <div class="main-sidebar sidebar-style-2">
                @include('admin.backend.layouts.sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')

                </section>
            </div>
            @yield('modal')
            @include('admin.backend.layouts.footer')
