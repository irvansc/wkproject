<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        @php
        $img = DB::table('image_fron')->where('id','=',2)->first();
        @endphp
        <!-- <h1 class="logo mr-auto"><a href="index.html">Mentor</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="/" class="logo mr-auto"><img src="{{asset('images/foto/web/'.$img->img)}}" alt=""
                class="img-fluid"></a>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="{{ Request::path() == '/'|| Request::path() == '' ? 'active' : '' }}">
                    <a href="/">Home</a>
                </li>
                <li class="{{ Request::path() == 'about'|| Request::path() == '' ? 'active' : '' }}">
                    <a href="{{route('about.index')}}">About</a>
                </li>
                <li class="{{ Request::path() == 'contact'|| Request::path() == '' ? 'active' : '' }}">
                    <a href="{{route('contact.index')}}">Contact</a>
                </li>
                <li class="{{ Request::path() == 'blog'|| Request::path() == '' ? 'active' : '' }}">
                    <a href="{{route('blog.index')}}">Blog</a>
                </li>
                <li class="drop-down
                {{ Request::path() == 'visi'||
                Request::path() == 'sejarah'||
                Request::path() == 'sarpras'||
                Request::path() == '' ? 'active' : '' }}">
                    <a href="">Profile</a>
                    <ul>
                        <li><a href="{{route('visi.index')}}">Visi-Misi</a></li>
                        <li><a href="{{route('sejarah.index')}}">Sejarah Singkat</a></li>
                        <li><a href="{{route('sarpras.index')}}">Sarana Prasana</a></li>
                    </ul>
                </li>
                <li class="drop-down
                {{ Request::path() == 'galery'||
                Request::path() == 'foto'||
                Request::path() == 'video'||
                Request::path() == '' ? 'active' : '' }}
                "><a href="">Galery</a>
                    <ul>
                        <li><a href="{{route('galery.index')}}">Foto</a></li>
                        <li><a href="{{route('video.index')}}">Video</a></li>
                    </ul>
                </li>
                <li class="drop-down
                {{ Request::path() == 'ekstrakulikuler'||
                Request::path() == 'kelas'||
                Request::path() == 'osis'||
                Request::path() == 'jurusan'||
                Request::path() == 'guru'||
                Request::path() == 'pengumuman'||
                Request::path() == 'agenda'||
                Request::path() == 'download'||
                Request::path() == '' ? 'active' : '' }}
                "><a href="">Akademik</a>
                    <ul>
                        <li><a href="{{route('guru.index')}}">Guru & Staff</a></li>
                        <li class="drop-down"><a href="#">Kesiswaan</a>
                            <ul>
                                <li class="drop-down"><a href="#">Data Siswa</a>
                                    <ul>
                                        @php
                                        $kelas = DB::table('kelas')->get();
                                        @endphp
                                        @foreach ($kelas as $k)
                                        <li><a href="{{route('kelas.show',$k->alias)}}">Siswa Kelas
                                                {{$k->nama_kelas}}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li><a href="{{route('osis.index')}}">Osis</a></li>
                                <li><a href="{{route('ekstrakulikuler.index')}}">Ekstrakulikuler</a></li>

                            </ul>
                        </li>
                        @php
                        $jurusan = DB::table('jurusan')->get();
                        $jurus = DB::table('jurusan')->first();
                        @endphp

                        @if ($jurus == null)
                        @else
                        <li class="drop-down"><a>Jurusan</a>
                            <ul>
                                @foreach ($jurusan as $j)
                                <li><a href="{{route('jurusan.show',$j->id)}}">{{$j->title}}</a></li>
                                @endforeach

                            </ul>
                        </li>
                        @endif
                        <li><a href="{{route('pengumuman.index')}}">Pengumuman</a></li>
                        <li><a href="{{route('agenda.index')}}">Agenda</a></li>
                        <li><a href="{{route('download.index')}}">Download</a></li>
                        @php
                        $p = DB::table('ppdb')->first();
                        @endphp
                        @if ($p->aktif == 1)
                        <li>
                            <a onclick="openInNewTab('{{$p->body}}')">PPDB <span
                                    class="badge badge-success">DIBUKA!</span>
                            </a>
                        </li>
                        @else

                        @endif
                    </ul>
                </li>

            </ul>
        </nav><!-- .nav-menu -->

        <div class="get-started-btn ">
            <div class="custom-switch custom-switch-label-onoff custom-switch-xs pl-0" id="sw">
                <p class="mode">Dark Mode </p>
                <input class="custom-switch-input" id="example_07" type="checkbox" onclick="toggle()">
                <label class="custom-switch-btn" for="example_07">
                </label>
            </div>
        </div>

    </div>
</header><!-- End Header -->
