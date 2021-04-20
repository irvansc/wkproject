@extends('frontend.layouts.master')
@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/abcd.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkab.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="aboutme" id="aboutme">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="content">
                    <h1>{{$abouts->title}}</h1>
                    <p>
                        {!!$abouts->deskripsi!!}
                    </p>
                </div>
            </div>
            <div class="col-md-4 ">
                <img src="{{asset('images/'.$abouts->photo)}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@endsection
