@extends('frontend.layouts.master')

@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/video.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkvideo.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="galery" id="galery">
    <!-- Page Content -->
    <div class="container">

        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Video </h1>

        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-left hover">
            @foreach ($videos as $v)
            <div class="col-lg-4 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe class="embed-responsive-item" src="{{$v->url}}"></iframe>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 py-3  d-flex">
                <ul class="pagination mx-auto">
                    {{ $videos->links() }}
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
