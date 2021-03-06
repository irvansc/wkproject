@extends('frontend.layouts.master')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/guru.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<section id="team" class="team">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Guru Kami</p>
        </header>

        <div class="row gy-4">
            @foreach ($gurus as $guru)

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="member-img">
                        <img src="{{asset('images/foto/guru/'.$guru->photo)}}" class="img-fluid" alt="" />
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>{{$guru->nama_guru}}</h4>
                        <span>{{$guru->mapel}}</span>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <nav> {{ $gurus->links() }}
        </nav>
    </div>
</section>
@endsection
