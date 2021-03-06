@extends('frontend.layouts.master')
@section('content')

<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/galery.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>

<section class="our-teachers">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h3 class="typid text-center mb-3">
                    <span id="typed" class="typed" data-typed-items="Galery Kami"></span></h3>
                @if ($message = Session::get('pesan'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($galery as $row)

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="admission_insruction">
                    @if (empty($row->cover))
                    <img src="{{asset('images/noimage.jpg')}}" class="img-fluid" alt="#">
                    @else
                    <img src="{{asset('images/foto/album/'.$row->cover)}}" class="img-fluid" alt="#">
                    <center>
                        <a href="{{url('galery-kategori',$row->id)}}" class="btn btn-primary btn-sm mt-2">
                            Jumlah Foto <span class="badge bg-secondary">{{$row->foto->count()}}</span>
                        </a>
                    </center>
                    @endif
                    <a href="{{url('galery-kategori',$row->id)}}">
                        <p class="text-center mt-3"><span>{{$row->nama}}</span>
                    </a>
                    <br>

                </div>
            </div>
            @endforeach
        </div>
        <!-- End row -->
        <nav>
            {{-- {{ $galery->links() }} --}}
        </nav>
    </div>
</section>
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
