<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="{{asset('')}}assets/img/smk.png" alt="" srcset="" style="width: 50px">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class=""><a class="nav-link" href="/dashboard"><i class="fas fa-tachometer-alt" style="color: #007bff"></i>
                <span>Dashboard</span></a></li>
        <hr>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-blog" style="color: #007bff"></i>
                <span>Data Artikel</span>
            </a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('post.create')}}">Post Artikel</a></li>
                <li><a class="nav-link" href="{{route('post.index')}}">List Artikel</a></li>
                <li><a class="nav-link" href="{{route('kategori.index')}}">Kategori Artikel</a></li>
            </ul>
        </li>
        @can('pengguna')
        <hr>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"
                    style="color: #007bff"></i> <span>Data
                    Pengguna</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('pengguna.index')}}">List Pengguna</a></li>
                <li><a class="nav-link" href="{{route('permissions.index')}}">Permissions</a></li>
                <li><a class="nav-link" href="{{route('roles.index')}}">Role</a></li>
            </ul>
        </li>
        @endcan
        @can('kelas')
        <hr>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown " data-toggle="dropdown">
                <i class="fas fa-chalkboard-teacher" style="color: #007bff"></i>
                <span>Data Akademik</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('kelas.index')}}">Kelas</a></li>
                <li><a class="nav-link" href="{{route('aguru.index')}}">Guru</a></li>
                <li><a class="nav-link" href="{{route('asiswa.index')}}">Siswa</a></li>
                <li><a class="nav-link" href="{{route('adownload.index')}}">File Download</a></li>
            </ul>
        </li>
        @endcan
        <hr>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-info"
                    style="color: #007bff"></i>
                <span>Informasi</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('apengumuman.index')}}">Pengumuman</a></li>
                <li><a class="nav-link" href="{{route('aagenda.index')}}">Agenda</a></li>
                <li><a class="nav-link" href="{{route('testimoni.index')}}">Testimonial</a></li>
                <li><a class="nav-link" href="{{route('vm.index')}}">Visi-Misi</a></li>
                <li><a class="nav-link" href="{{route('sejarah.index')}}">Sejarah</a></li>
                <li><a class="nav-link" href="{{route('aabout.index')}}">About</a></li>
            </ul>
        </li>
        <hr>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas  fa-camera"
                    style="color: #007bff"></i>
                <span>Galery</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('albums.index')}}">Album</a></li>
                <li><a class="nav-link" href="{{route('fotos.index')}}">Foto</a></li>
                <li><a class="nav-link" href="{{route('avideo.index')}}">Video</a></li>
            </ul>
        </li>
        <hr>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tools"
                    style="color: #007bff"></i>
                <span>Konfigurasi Web</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('meta.index')}}">Meta Tag</a></li>
                <li><a class="nav-link" href="{{route('fav.index')}}">Favicon</a></li>
                <li><a class="nav-link" href="{{route('im.index')}}">Image Web</a></li>
                <li><a class="nav-link" href="{{route('slider.index')}}">Slider Image</a></li>
                <li><a class="nav-link" href="{{route('sejarah.index')}}">Sosial Media</a></li>
                <li><a class="nav-link" href="layout-default.html">Profile</a></li>
            </ul>
        </li>
        <hr>

        <li class=""><a class="nav-link" href=""><i class="fa fa-envelope" style="color: #007bff"></i>
                <span>Inbox</span></a>
        </li>
        <li class=""><a class="nav-link" href="{{route('komentar.index')}}"><i class="fa fa-comments"
                    style="color: #007bff"></i>
                <span>Komentar</span></a>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <center>
            <a href="{{url('keluar')}}" class="btn btn-warning btn-lg ">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </center>
    </div>
</aside>
