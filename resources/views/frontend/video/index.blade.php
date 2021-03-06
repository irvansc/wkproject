@extends('frontend.layouts.master')

@section('content')
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/video.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up">
        <div class="col-lg-12">
            <div class="row">
                @foreach ($videos as $v)
                <div class="col-md-4 text-center">
                    <iframe width="400" height="200" src="{{$v->url}}" c
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                @endforeach
            </div>
            <nav> {{ $videos->links() }}
            </nav>
        </div>
    </div>
</section>
@endsection
