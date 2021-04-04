@extends('frontend.layouts.master')
@section('content')

<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/galery.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkgalery.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="galery" id="galfot">
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @foreach ($galery as $row)

            <div class="col-lg-3 col-md-4 col-6">
                <a href="" class="h-100">
                    <div class="galeri">
                        @if (empty($row->cover))
                        <img src="{{asset('images/noimage.jpg')}}" alt="">
                        @else
                        <img src="{{asset('images/foto/album/'.$row->cover)}}" alt="">

                        <div class="team-content">
                            <h3 class="title"><a href="{{url('galery-kategori',$row->id)}}">{{$row->nama}}</a></h3>
                        </div>
                        @endif

                    </div>
                </a>
                <a href="{{url('galery-kategori',$row->id)}}" class="btn btn-utama mt-2" style="align-items: center;">
                    Foto <span class="badge badge-light">{{$row->foto->count()}}</span>
                </a>
            </div>
            @endforeach

        </div>

    </div>

</section>
@endsection
