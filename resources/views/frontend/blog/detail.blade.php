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
<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="{{asset('')}}theme/img/blog/blog-1.jpg" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="blog-single.html">{{$post->title}}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                    href="blog-single.html">{{$post->user->name}}</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                    href="blog-single.html"><time datetime="2020-01-01">{{$post->created_at}}</time></a>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-eye"></i>
                                <a href="blog-single.html">{{$post->views}}</a>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-chat-dots"></i>
                                <a href="blog-single.html">13 Comments</a>
                            </li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                            {!!$post->content!!}
                        </p>
                    </div>
                    <div class="entry-footer">
                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                            @if ($post->categories->isNotEmpty())
                            @foreach ($post->categories as $key=>$kate)
                            <li><a href="#">{{$kate->name}}|</a></li>
                            @endforeach
                            @endif

                        </ul>

                        <div class="icon-s mt-2 mr-auto">
                            <h5>#Share to :</h5>
                            <div class="addthis_inline_share_toolbox" id="addthis_inline_share_toolbox">
                            </div>
                        </div>
                    </div>
                    <style>
                        .rep {
                            margin-left: 80%;
                            width: 40%;
                        }
                    </style>
                    <div class="rep">
                        <button class="btn btn-outline-primary but" id="btn-komentar-utama"><i
                                class="bi bi-reply-fill"></i>
                            Reply</button>
                    </div>
                </article><!-- End blog entry -->

                <div class="blog-comments">
                    @if ($message = Session::get('pesan'))
                    <div class="alert alert-info alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="reply-form" style="margin-top: 10px; display:none" id="komentar-utama">
                        <form action="{{ route('addComment', $post->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder=" Your Name*">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Your Email*">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="body" class="form-control @error('body') is-invalid @enderror"
                                        placeholder="Your Comment*"></textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Post
                                Comment</button>
                            <strong style="margin-left: 50%"><small> *Berkomentarlah yang baik dan
                                    santun</small></strong>
                        </form>
                    </div>
                    <h4 class="comments-count mt-3">Komentar</h4>
                    @foreach ($post->comments()->where('status', '=', 'y')->orderBy('created_at','desc')->get()
                    as $com)

                    <div id="comment-2" class="comment">
                        <div class="d-flex">
                            <div class="comment-img"><img src="{{asset('')}}theme/img/blog/default.png" alt=""></div>
                            <div>
                                <h5><a href="">{{$com->name}}</a> </h5>
                                <time datetime="2020-01-01">{{$com->created_at}}</time>
                                <p>
                                    {!!$com->body!!}
                                </p>
                            </div>
                        </div>
                        @forelse ($com->comment()->orderBy('created_at','desc')->get() as $reply)
                        <div id="comment-reply-1" class="comment comment-reply">
                            <div class="d-flex">
                                <div class="comment-img"><img src="{{asset('')}}theme/img/blog/admin.png" alt="">
                                </div>
                                <div>
                                    <h5>{{$reply->name}} | <strong class="text-primary">Admin</strong>
                                    </h5>
                                    <time datetime="2020-01-01">{{$reply->created_at}}</time>
                                    <p>
                                        {!!$reply->body!!}
                                    </p>
                                </div>
                            </div>
                        </div><!-- End comment reply #1-->
                        @empty

                        @endforelse
                    </div><!-- End comment #2-->


                    @endforeach

                </div><!-- End blog comments -->
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
                            @foreach ($kategori as $kate)
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
                            <h4><a href="{{route('blog.show',$post->alias)}}">{{$post->title}}</a></h4>
                            <time datetime="2020-01-01">{{$post->created_at}}</time>
                        </div>
                        @endforeach
                        @endif
                    </div><!-- End sidebar recent posts-->
                </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->
        </div>
    </div>
</section><!-- End Blog Single Section -->
@endsection
@push('jsf')
<script>
    $(document).ready(function(){
        $("#btn-komentar-utama").click(function(){
            $('#komentar-utama').toggle('slide');
        });
    });
</script>
@endpush
