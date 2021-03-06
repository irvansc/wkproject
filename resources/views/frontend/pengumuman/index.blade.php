@extends('frontend.layouts.master')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/peng.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<section class="services-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($pengumuman as $p)

                <div class="so-item">
                    <div class="so-title">
                        <div class="so-number"><i class="ri-volume-up-line"></i></div>
                        <h5>{{$p->title}}</h5>
                        <h6>
                            {{date("d M y", strtotime($p->tanggal))}}
                        </h6>
                    </div>
                    <p>{!!$p->body!!}</p>
                    <h6>- {{$p->user->name}}</h6>
                </div>
                @endforeach

            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #4154f1;">
                            <h4>Recent Posts</h4>
                        </div>
                        <div class="card-body">
                            @if ($postsWeek->isNotEmpty())
                            @foreach ($postsWeek as $post)
                            <div class="so-item">
                                <div class="so-title">
                                    <div class="so-number">P</div>
                                    <h5><a href="{{route('blog.show',$post->alias)}}"></a> {{$post->title}}</h5>
                                </div>
                                <p>
                                    {!! Str::limit($post->content, 300, '...') !!}
                                </p>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
