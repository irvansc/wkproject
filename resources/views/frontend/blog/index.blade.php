@extends('frontend.layouts.master')
@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/blog.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkblog.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="blog" id="blog">
    <div class="container">
        <div class="row">
            @if ($message = Session::get('pesan'))
            <div class="alert alert-danger alert-block">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="col-md-8 hov" id="posts">
                @if ($_GET['search'] ?? null)
                @if ($posts->isNotEmpty())
                <span class="badge badge-primary">Results: {{ count($posts) }}</span>
                @else
                <div class="alert alert-danger alert-block">
                    <strong>Not Found</strong>
                </div>
                @endif
                @endif
                @if ($posts->isEmpty())
                {{-- <span>Not Found</span> --}}
                @else
                <div class="row row-cols-1 row-cols-md-2 post">
                    @foreach ($posts as $p)
                    <div class="col mb-4">
                        <div class="card">
                            <img src="{{$p->getImage()}}" class="card-img-top" alt="{{$p->title}}">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{route('blog.show',$p->alias)}}">{{$p->title}}</a></h5>
                                <p class="card-text"> {!! Str::limit($p->content, 250, '...') !!}</p>
                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-single.html">John
                                                Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-single.html"><time datetime="2020-01-01">Jan
                                                    1, 2020</time></a>
                                        </li>
                                        <li class="d-flex
                                                    align-items-center"><i class="bi
                                                        bi-chat-dots"></i>
                                            <a href="blog-single.html">{{$p->comments()->where('status','=','y')->count()}}
                                                Comments</a>
                                        </li>

                                    </ul>
                                </div>
                                <a href="{{route('blog.show',$p->alias)}}" class="btn btn-utama">Read More
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <div class="card-footer mt-1" style="display: flex">
                                    @if ($p->categories->isNotEmpty())
                                    @foreach ($p->categories as $key=>$kate)
                                    <i class="bi bi-folder ml-1"> <a href="#"> {{$kate->name}} </a></i>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                @if($posts->hasMorePages() == 1)
                <div class="text-center mb-1">
                    <button id="load" class="btn btn-utama" data-url="{{ $posts->nextPageUrl() }}">Load
                        More</button>
                </div>
                @endif

            </div>
            <div class="col-md-4 sid">
                <div class="card mb-2">
                    <div class="card-header">
                        Search
                    </div>
                    <div class="card-body">
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Categories
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($categories as $kate)
                            <a href="{{url('kategori',$kate->alias)}}" class="btn btn-outline-primary ml-1 mb-1">
                                {{$kate->name}}
                                <span class="badge badge-light">({{$kate->post->count()}})</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Recent Post
                    </div>
                    <div class="card-body">
                        <style>
                            .g img {
                                max-width: 80px;
                            }
                        </style>
                        @if ($postsWeek->isNotEmpty())
                        @foreach ($postsWeek as $post)
                        <div class="media g">
                            <img src="{{$post->getImage()}}" class="mr-3" alt="...">
                            <div class="media-body recent">
                                <h5 class="mt-0"><a href="{{route('blog.show',$post->alias)}}">{{$post->title}}</a></h5>
                                <h6>{!!Str::limit($post->content,50,'...')!!}</h6>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog -->
@endsection
@push('jsf')
<script>
    $(document).ready(function(){
        $(document).on('click', '#load', function(){
            $("<div>").load($(this).data("url") + "#posts", function() {
            $("#posts").append($(this).find("#posts").html());
        });

        $(this).parent().remove();

        });
    });
</script>

@endpush
