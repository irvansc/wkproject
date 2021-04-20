@extends('frontend.layouts.master')
@section('content')

<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/sejarah.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darksejarah.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="aboutme" id="aboutme">
    <div class="container">
        <div class="row">
            @if ($sj == null)

            @else
            <div class="col-md-8">
                <div class="content">
                    <h1>{{$sj->title}}</h1>
                    <p>{!!$sj->deskripsi!!}
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{asset('images/'.$sj->foto)}}" alt="" class="img-fluid">
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
