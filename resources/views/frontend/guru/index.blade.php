@extends('frontend.layouts.master')

@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/guru.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkguru.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="galery">
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @foreach ($gurus as $guru)
            <div class="col-lg-3 col-md-4 col-6 mb-1">
                <a href="" class="h-100">
                    <div class="guru">
                        <img src="{{$guru->getGuru()}}" alt="">
                        <ul class="social">
                            <li><a href="{{$guru->fb}}" class="bi bi-facebook"></a></li>
                            <li><a href="{{$guru->ig}}" class="bi bi-instagram"></a></li>
                            <li><a href="{{$guru->twitter}}" class="bi bi-twitter"></a></li>
                        </ul>
                        <div class="team-content">
                            <h3 class="title">{{$guru->nama_guru}}</h3>
                            <span class="post">{{$guru->mapel}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>

</section>
@endsection
