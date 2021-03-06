@extends('frontend.layouts.master')
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/sejarah.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<!-- ======= About Section ======= -->
<section id="welcome_about" class="welcome_about">

    <div class="container" data-aos="fade-up">
        <div class="row  ">
            <div class="col-lg-4 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{asset('images/'.$sj->foto)}}" class="img-fluid">
            </div>
            <div class="col-lg-6 d-flex flex-column
                justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <div class="section-header">
                        <h3 class="typid text-center">
                            <span id="typed" class="typed" data-typed-items="{{$sj->title}}"></span>
                    </div>
                    <p class="pi" style="text-align: center">
                        {!!$sj->deskripsi!!}
                    </p>

                </div>
            </div>



        </div>
    </div>

</section><!-- End About Section -->
@include('frontend.layouts.ct')
@endsection
@push('jsf')
<script>
    var typed_strings = $(".typed").data('typed-items');
    typed_strings = typed_strings.split(',')
    new Typed('.typed', {
      strings: typed_strings,
      loop: true,
      typeSpeed: 100,
      backSpeed: 50,
      backDelay: 2000
    });

</script>
@endpush
