@extends('frontend.layouts.master')
@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/osis.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkosis.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-4 imgkotak text-center mb-2">
                <img src="{{asset('images/foto/osis/'.$osis->img)}}" alt="">
            </div>
            <div class="col-md-8">
                <div class="content">
                    <h1>{{$osis->title}}</h1>
                    <p>
                        {!!$osis->ket!!}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
