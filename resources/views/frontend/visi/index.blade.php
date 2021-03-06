@extends('frontend.layouts.master')
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/visi.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<!-- ======= Features Section ======= -->
<section id="features" class="features">
    <div class="container" data-aos="fade-up">
        <div class="row feture-tabs mt-5" data-aos="fade-up">
            <div class="col-lg-6">
                <!-- Tabs -->
                <ul class="nav nav-pills mb-3">
                    <li>
                        <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Visi</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab2">Misi</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab3">Tujuan</a>
                    </li>
                </ul><!-- End Tabs -->

                <!-- Tab Content -->
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="tab1">
                        <p>{!!$vm->visi!!}
                        </p>
                    </div><!-- End Tab 1 Content -->

                    <div class="tab-pane fade show" id="tab2">
                        <p>{!!$vm->misi!!}</p>
                    </div><!-- End Tab 2 Content -->

                    <div class="tab-pane fade show" id="tab3">
                        <p>{!!$vm->tujuan!!}</p>

                    </div><!-- End Tab 3 Content -->

                </div>

            </div>

            <div class="col-lg-4 float-right">
                <center><img src="{{asset('theme/img/smk.png')}}" class="img-fluid" alt="" width="250px"></center>
            </div>

        </div><!-- End Feature Tabs -->
    </div>
</section>
@include('frontend.layouts.ct')
@endsection
