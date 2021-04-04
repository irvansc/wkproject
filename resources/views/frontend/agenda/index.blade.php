@extends('frontend.layouts.master')

@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/agenda.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkagenda.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="agendas" id="agendas">
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                @foreach ($agendas as $a)
                <div class="card mb-2">
                    <div class="card-header">
                        <i class="bi bi-calendar-check-fill"></i>
                        Agenda
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$a->name}}</h5>
                        <div class="agen">
                            <h6>- {{date("d M Y", strtotime($a->mulai))}}</h6>
                            <h6>- {{date("d M Y", strtotime($a->selesai))}}</h6>
                            <h6>- {{$a->waktu}}</h6>
                            <h6>- {{$a->tempat}}</h6>
                            @if ($a->keterangan != null)
                            <h6>- {{$a->keterangan}}</h6>
                            @else

                            @endif
                        </div>
                        <p class="card-text">{!!$a->deskripsi!!}
                        </p>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{$a->author}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time
                                            datetime="2020-01-01">{{date("d M Y", strtotime($a->tanggal))}}</time></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4" id="sid">
                <div class="card mb-2">
                    <div class="card-header">
                        Recent Post
                    </div>
                    <div class="card-body">
                        @if ($postsWeek->isNotEmpty())
                        @foreach ($postsWeek as $post)
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1" style="font-size: 15px"><a
                                    href="{{route('blog.show',$post->alias)}}">{{$post->title}}</a></h6>

                        </div>
                        <hr>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Pengumuman
                    </div>
                    <div class="card-body">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1"><a href="">List group item heading</a></h6>
                            <time datetime="2020-01-01">Jan
                                1, 2020</time>
                        </div>
                        <hr>
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1"><a href="">List group item heading</a></h6>
                            <time datetime="2020-01-01">Jan
                                1, 2020</time>
                        </div>
                        <hr>
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1"><a href="">List group item heading</a></h6>
                            <time datetime="2020-01-01">Jan
                                1, 2020</time>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container -->
</section>
@endsection
