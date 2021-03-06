<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <!-- <h1 class="logo mr-auto"><a href="index.html">Mentor</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html" class="logo mr-auto"><img src="{{asset('')}}theme/
/img/logo.png" alt="" class="img-fluid"></a>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="courses.html">Blog</a></li>
                <li class="drop-down"><a href="">Profile Sekolah</a>
                    <ul>
                        <li><a href="#">Visi - Misi</a></li>
                        <li><a href="#">Sejarah</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="">Galery</a>
                    <ul>
                        <li><a href="#">Foto</a></li>
                        <li><a href="#">Video</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="">Akademik</a>
                    <ul>
                        <li><a href="trainers.html">Guru</a></li>
                        <li><a href="siswa.html">Siswa</a></li>
                        <li><a href="pengumuman.html">Pengumuman</a></li>
                        <li><a href="agenda.html">Agenda</a></li>
                        <li><a href="download.html">Download</a></li>
                    </ul>
                </li>
                <li><a href="events.html">Events</a></li>
                <li><a href="pricing.html">Pricing</a></li>
                <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
                @auth
                <li>
                    <a href="{{route('dashboard.index')}}">Dashboard</a>
                </li>
                @endauth
            </ul>
        </nav><!-- .nav-menu -->

        <!-- <a href="courses.html" class="get-started-btn">Get Started</a> -->

    </div>
</header>
