@extends('frontend.layouts.master')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/bg.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        @if ($message = Session::get('pesan'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-8 entries">
                @if ($_GET['search'] ?? null)
                @if ($posts->isNotEmpty())
                <span class="badge badge-primary ">Results: {{ count($posts) }}</span>
                @else
                <div class="alert alert-danger alert-block">
                    <strong>Not Found</strong>
                </div>
                @endif
                @endif
                @if ($posts->isEmpty())
                {{-- <span>Not Found</span> --}}
                @else
                @foreach ($posts as $p)
                <article class="entry">

                    <div class="entry-img">
                        <img src="{{$p->getImage()}}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="blog-single.html">{{$p->title}}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi
                    bi-person"></i> <a href="blog-single.html">{{$p->user->name}}</a></li>
                            <li class="d-flex align-items-center"><i class="bi
                    bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$p->created_at}}</time></a>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-eye"></i>
                                <a href="blog-single.html">{{$p->views}}</a>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-chat-dots"></i>
                                <a href="blog-single.html">13 Comments</a>
                            </li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                            {!! Str::limit($p->content, 500, '...') !!}
                        </p>
                        <div class="read-more">


                            <a href="{{route('blog.show',$p->alias)}}">Read More</a>
                        </div>
                        <div class="entry-footer">

                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                @if ($p->categories->isNotEmpty())
                                @foreach ($p->categories as $key=>$kate)
                                <li><a href="#">{{$kate->name}}|</a></li>
                                @endforeach
                                @endif
                        </div>
                    </div>

                </article><!-- End blog entry -->
                @endforeach

                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
                @endif

            </div><!-- End blog entries list -->

            <div class="col-lg-4">

                <div class="sidebar">

                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                        <form action="{{route('blog.index')}}" method="GET">
                            <input type="text" name="search" placeholder="Cari apa ?">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End sidebar search formn-->

                    <h3 class="sidebar-title">Categories</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            @foreach ($kateg as $kate)
                            <li><a href="{{url('kategori',$kate->alias)}}">{{$kate->name}}
                                    <span>({{$kate->post->count()}})</span></a></li>
                            @endforeach

                        </ul>
                    </div><!-- End sidebar categories-->

                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                        @if ($postsWeek->isNotEmpty())
                        @foreach ($postsWeek as $post)
                        <div class="post-item clearfix">
                            <img src="{{$post->getImage()}}" alt="">
                            <h4><a href="blog-single.html">{{$post->title}}</a></h4>
                            <time datetime="2020-01-01">{{$post->created_at}}</time>
                        </div>
                        @endforeach
                        @endif
                    </div><!-- End sidebar recent posts-->


                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section><!-- End Blog Section -->

@endsection
