<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center
    justify-content-between">
        @php
        $img = DB::table('image_fron')->where('id','=',1)->first();
        @endphp
        <a href="/" class="logo d-flex align-items-center">
            <img src="{{asset('images/foto/web/'.$img->img)}}" alt="" />
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link " href="{{route('about.index')}}">About</a></li>
                <li><a class="nav-link scrollto" href="{{route('contact.index')}}">Contact</a></li>
                <li>
                    <a class="nav-link scrollto" href="{{route('blog.index')}}">Blog</a>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('visi.index')}}">Visi - Misi</a></li>
                        <li><a href="{{route('sejarah.index')}}">Sejarah</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Galery</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('galery.index')}}">Foto</a></li>
                        <li><a href="{{route('video.index')}}">Video</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Akademik</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('guru.index')}}">Guru</a></li>
                        <li><a href="{{route('siswa.index')}}">Siswa</a></li>
                        <li><a href="{{route('pengumuman.index')}}">Pengumuan</a></li>
                        <li><a href="{{route('agenda.index')}}">Agenda</a></li>
                        <li><a href="{{route('download.index')}}">Download</a></li>
                    </ul>
                </li>
                <li>
                    @auth
                    <a class="getstarted" href="{{route('dashboard.index')}}">Dashboard</a>
                    @endauth
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
