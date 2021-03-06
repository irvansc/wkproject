@include('frontend.layouts.header')

<body>
    @include('frontend.layouts.headnav')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                $slider = DB::table('slider')->get();
                @endphp
                @foreach ($slider as $key=>$s)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                    <img src="{{asset('images/foto/web/'.$s->img)}}" class="d-block w-100" alt="..." />
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>{{$s->title}}</h1>
                            <h4>
                                {!!$s->deskripsi!!}
                            </h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        @php
                        $ab = DB::table('sambutan')->first();
                        @endphp
                        <div class="content">
                            <h3>{{$ab->title}}</h3>
                            <p>
                                {!!$ab->deskripsi!!}
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="#" class="btn-read-more d-inline-flex align-items-center
                    justify-content-center align-self-center">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{asset('images/'.$ab->photo)}}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Recent posts form our Blog</p>
                </header>
                @php
                $posts = DB::table('posts')->orderBy('created_at', 'DESC')->take(3)->get();
                @endphp
                <div class="row">
                    @foreach ($posts as $p)
                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img">
                                <img @if ($p->img != null)
                                src="{{asset('images/foto/post/'.$p->img)}}"
                                @else
                                src="{{asset('images/foto/post/noimage.jpg')}}"
                                @endif class="img-fluid" alt="{{ $p->title }}" />
                            </div>
                            <span class="post-date">{{date("d M Y", strtotime($p->created_at))}}</span>
                            <h3 class="post-title">
                                {{$p->title}}
                            </h3>
                            <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Recent Blog Posts Section -->
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-person-bounding-box"></i>
                            <div>
                                @php
                                $g = DB::table('guru')->count();
                                @endphp
                                <span data-purecounter-start="0" data-purecounter-end="{{$g}}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Guru</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <div>
                                @php
                                $g = DB::table('siswa')->count();
                                @endphp
                                <span data-purecounter-start="0" data-purecounter-end="{{$g}}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Siswa</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-megaphone"></i>
                            <div>
                                @php
                                $g = DB::table('pengumuman')->count();
                                @endphp
                                <span data-purecounter-start="0" data-purecounter-end="{{$g}}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Pengumuan</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-calendar-check"></i>
                            <div>
                                @php
                                $g = DB::table('agenda')->count();
                                @endphp
                                <span data-purecounter-start="0" data-purecounter-end="{{$g}}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Agenda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counts Section -->
        <!-- ======= Pengumuan Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Pengumuman</h2>
                    <p>Pengumuman</p>
                </header>
                @php
                $peng = DB::table('pengumuman')->orderBy('tanggal', 'DESC')->take(3)->get();
                @endphp
                <div class="row gy-4">
                    @foreach ($peng as $p)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="icofont-megaphone-alt icon"></i>
                            <h3>{{$p->title}}</h3>
                            <p>
                                {!!Str::limit($p->body, 150, '...')!!}
                            </p>
                            <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Agenda</h2>
                    <p>Agenda</p>
                </header>
                @php
                $ag = DB::table('agenda')->orderBy('tanggal', 'DESC')->take(3)->get();
                @endphp
                <div class="row gy-4">
                    @foreach ($ag as $a)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="icofont-tasks-alt icon"></i>
                            <h3>{{$a->name}}</h3>
                            <p>
                                {!!Str::limit($a->deskripsi,200,'...')!!}
                            </p>
                            <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Services Section -->
        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Ekstrakulikuler</h2>
                    <p>Ekstrakulikuler</p>
                </header>
                @php
                $ekstra = DB::table('ektras')->orderBy('tanggal','DESC')->take(4)->get();
                @endphp
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{asset('')}}theme/img/12.png" class="img-fluid" alt="" />
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">
                            @foreach ($ekstra as $e)
                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{$e->nama}}</h3>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- / row -->


            </div>
        </section>
        <!-- End Features Section -->
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>Testimonials</p>
                </header>
                @php
                $testi = DB::table('testimoni')->orderBy('tanggal','DESC')->get();
                @endphp
                <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">
                        @foreach ($testi as $t)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    {!!$t->pesan!!}.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{asset('images/foto/testi/'.$t->foto)}}" class="testimonial-img"
                                        alt="" />
                                    <h3>{{$t->nama}}</h3>
                                    <h4>{{$t->ket}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->

    </main>
    <!-- End #main -->
    @include('frontend.layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('frontend.layouts.script')
