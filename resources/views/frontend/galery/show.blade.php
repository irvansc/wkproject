@extends('frontend.layouts.master')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/foto.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>

<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row">
            @if ($value->url_video == '' )

            @else
            <center>
                <div class="col-md-12">
                    <span class="text-dark">{{$value->title}}</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="admission_insruction">
                        <center>
                            <iframe class="embed-responsive-item" width="400" height="400" src="{{$value->url_video}}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </center>
                    </div>
                </div>
            </center>
            @endif


        </div>

    </div>
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                </ul>
            </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($foto as $fo)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="{{asset('images/foto/album/fotos/'.$fo->gbr)}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <p>{{$fo->title}}</p>

                    </div>
                </div>
            </div>
            @endforeach


        </div>
        <nav>
            {{ $foto->links() }}
        </nav>
    </div>

</section><!-- End Portfolio Section -->
@include('frontend.layouts.ct')
@endsection
