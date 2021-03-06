@extends('frontend.layouts.master')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/siswa.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<section id="team" class="team">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Siswa Kami</p>
        </header>

        <div class="row gy-4">
            @foreach ($siswas as $s)

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="member-img">
                        <img src="{{asset('images/foto/siswa/'.$s->photo)}}" class="img-fluid" alt="" />
                    </div>
                    <div class="member-info">
                        <h4>{{$s->nama}}</h4>
                        <span>{{$s->kelas->nama_kelas}}</span>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <nav> {{ $siswas->links() }}
        </nav>
    </div>
</section>
@endsection
