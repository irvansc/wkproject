@extends('frontend.layouts.master')

@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/pengumuman.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkpeng.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pengumumand" id="pengumumand">
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($pengumuman as $p)
                <div class="card mb-2">
                    <div class="card-header">
                        <i class="bi bi-megaphone"></i>
                        Pengumuman
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$p->title}}</h5>
                        <p class="card-text">{!!$p->body!!}
                        </p>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{$p->user->name}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time
                                            datetime="2020-01-01">{{date("d M Y", strtotime($p->tanggal))}}</time></a>
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
                            {{-- <time datetime="2020-01-01">Jan
                                1, 2020</time> --}}
                        </div>
                        <hr>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Agenda
                    </div>
                    <div class="card-body">
                        @foreach ($agenda as $a)
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1"><a href="">{{$a->name}}</a></h6>
                            <time datetime="2020-01-01">{{date("d M Y", strtotime($a->tanggal))}}</time>
                        </div>
                        <hr>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container -->
</section>
@endsection
