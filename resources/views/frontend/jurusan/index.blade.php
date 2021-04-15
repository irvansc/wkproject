@extends('frontend.layouts.master')
@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/jurusan.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkjurusan.png" alt="" class="dark">
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
                    <h1>{{$jurusan->title}}</h1>
                    <p>
                        {!!$jurusan->ket!!}
                    </p>
                </div>
            </div>
            <div class="col-md-4 imgkotak text-center">
                <img src="{{asset('images/foto/jurusan/'.$jurusan->img)}}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection
