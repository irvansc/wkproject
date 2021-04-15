@extends('frontend.layouts.master')
@section('content')
<!-- SLider  Star-->
@include('frontend.layouts.hero')
{{-- </div> --}}
@php
$ph = DB::table('ph')->count();
@endphp
@if ($ph < 1) @else <div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row text-center">
                    <div class="col-md-6">
                        @php
                        $p = DB::table('ph')->get();
                        @endphp
                        <div id="slider">
                            @foreach ($p as $row)
                            <div><i class="fa fa-bullhorn"></i> {!!$row->body!!}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif

    <!-- About -->
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">
            @php
            $ab = DB::table('sambutan')->first();
            @endphp
            <div class="row">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="content justify-content-center">
                        <h2>{{$ab->title}}</h2>
                        <p>
                            {!!$ab->deskripsi!!}
                        </p>
                    </div>
                </div>

                <div class="col-md-6 abo">
                    <img data-src="{{asset('images/'.$ab->photo)}}" alt="">
                </div>

            </div>
        </div>

    </section><!-- End About Section -->

    <!-- Blog -->
    <section id="recent-blog" class="recent-blog">
        @php
        $posts = DB::table('posts')->orderBy('created_at', 'DESC')->take(3)->get();
        @endphp
        <div class="container">
            <header class="section-header">
                <h2>Blog</h2>
                <p>Recent posts form our Blog</p>
            </header>
            <div class="row">
                <div class="card-deck">
                    @foreach ($posts as $p)

                    <div class="card">
                        <img @if ($p->img != null)
                        data-src="{{asset('images/foto/post/'.$p->img)}}"
                        @else
                        data-src="{{asset('images/foto/post/noimage.jpg')}}"
                        @endif class="card-img-top" alt="{{ $p->alias }}">
                        <div class="card-body">
                            <h5 class="card-title">{{$p->title}}</h5>
                            <p class="card-text">{!!Str::limit($p->content, 200 , '...')!!}</p>
                            <p class="card-text"><small
                                    class="text-muted">{{date("d M Y", strtotime($p->created_at))}}</small></p>
                            <a href="{{route('blog.show',$p->alias)}}" class="btn btn-utama">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->
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
                            <span data-purecounter-start="0" data-purecounter-end="{{$g}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Guru</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-people-fill"></i>
                        <div>
                            @php
                            $s = DB::table('siswa')->count();
                            @endphp
                            <span data-purecounter-start="0" data-purecounter-end="{{$s}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Siswa</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-megaphone"></i>
                        <div>
                            @php
                            $p = DB::table('pengumuman')->count();
                            @endphp
                            <span data-purecounter-start="0" data-purecounter-end="{{$p}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Pengumuman</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-calendar-check-fill"></i>
                        <div>
                            @php
                            $a = DB::table('agenda')->count();
                            @endphp
                            <span data-purecounter-start="0" data-purecounter-end="{{$a}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Agenda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <!-- Pengumuman -->
    <section class="pengumuman" id="pengumuman">
        <div class="container">
            <header class="section-header">
                <h2>Pengumuan</h2>
                <p>Pengumuman</p>
            </header>
            @php
            $peng = DB::table('pengumuman')->orderBy('tanggal', 'DESC')->take(3)->get();
            @endphp
            <div class="row">
                @foreach ($peng as $p)
                <div class="col-lg-4 col-md-8">
                    <div class="count-box">
                        <i class="bi bi-megaphone"></i>
                        <div>
                            <h3>{{$p->title}}</h3>
                            <p>{!!Str::limit($p->body, 100, '...')!!}</p>
                            <p class="card-text"><small>{{date("d M Y", strtotime($p->tanggal))}}</small></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Pengumuman -->

    <!-- Agenda -->
    <section class="agenda" id="agenda">
        <div class="container">
            <header class="section-header">
                <h2>Agenda</h2>
                <p>Agenda</p>
            </header>
            <div class="row">
                @php
                $ag = DB::table('agenda')->orderBy('tanggal', 'DESC')->take(3)->get();
                @endphp
                @foreach ($ag as $a)

                <div class="col-lg-4 col-md-8">
                    <div class="count-box">
                        <i class="bi bi-calendar-check-fill"></i>
                        <div>
                            <h3>{{$a->name}}</h3>
                            <p>{!!Str::limit($a->deskripsi,100,'...')!!}.</p>
                            <p class="card-text"><small>
                                    {{date("d M Y", strtotime($a->tanggal))}}
                                </small></p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End agenda -->

    <!-- Ekstra -->
    <section id=" ekstra" class="ekstra">
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
                    <img data-src="{{asset('')}}theme/img/12.png" class="img-fluid" alt="" />
                </div>

                <div class="col-lg-6 mt-3 mt-lg-0 d-flex">
                    <div class="row align-self-center gy-4">
                        @foreach ($ekstra as $e)
                        <div class="col-md-6 mb-2" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex
                                    align-items-center">
                                <i class="bi bi-bookmark-check"></i>
                                <h3>{{$e->nama}}</h3>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <a href="{{route('ekstrakulikuler.index')}}" class="btn btn-utama mt-3 lihat">Lihat
                    Lainnya</a>
            </div>
            <!-- / row -->


        </div>
    </section>
    <!-- End Ekstra -->


    <!-- testimoni -->
    <section class="testimoni" id="testimoni">
        @php
        $testi = DB::table('testimoni')->orderBy('tanggal','DESC')->get();
        @endphp
        <div class="container">
            <div class="section-header">
                <h2>Testimoni</h2>
                <p>Testimoni Alumni</p>
            </div>
            <div id="demo" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($testi as $key=>$t)
                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                        <div class="carousel-caption">
                            <p>{!!$t->pesan!!}</p> <img data-src="{{asset('images/foto/testi/'.$t->foto)}}">
                            <div id="image-caption">{{$t->nama}}</div>
                            <strong>{{$t->ket}}</strong>
                        </div>
                    </div>
                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev"> <i class='fa fa-arrow-left'></i>
                </a> <a class="carousel-control-next" href="#demo" data-slide="next"> <i class='fa fa-arrow-right'></i>
                </a>
            </div>
        </div>
    </section>
    <!-- End Testimoni -->
    @endsection
    @push('jsf')
    <script type="text/javascript">
        $(document).ready(function(){
    $('#slider').slick({
      autoplay: true,
      autoplaySpeed: 5000,
    });
  });
    </script>
    @endpush
