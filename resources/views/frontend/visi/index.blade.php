@extends('frontend.layouts.master')
@section('content')

<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/visi.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkvisi.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="aboutme" id="aboutme">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="content">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button type="button" class="btn
                                                btn-utama" data-toggle="collapse" data-target="#collapseOne"><i
                                            class="fa fa-plus"></i>
                                        visi</button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{!!$vm->visi!!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button type="button" class="btn
                                                btn-utama collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo"><i class="fa fa-plus"></i>
                                        Misi</button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse
                                        show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{!!$vm->misi!!}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button type="button" class="btn
                                                btn-utama collapsed" data-toggle="collapse"
                                        data-target="#collapseThree"><i class="fa fa-plus"></i>
                                        Tujuan</button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{!!$vm->tujuan!!}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('images/1614938111.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
