@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Image Front</h1>
</div>
<p>
    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        <i class="fas fa-info-circle text-white"></i> Informasi Penting
    </button>
</p>
@php
$w = DB::table('image_fron')->first();
@endphp
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        Sebelum anda mengubah gambar ini, maka anda harus menyesuaikan dengan ukuran gambar yang sudah ada. <br>
        dengan menggunakan tools Adobe Ilustrator/Potoshop atau yang lainnya <br>
        jika tidak maka gambar yang anda unggah tidak akan sesuai dengan tampilan website, <br>
        untuk title Top Teks berwarna hitam atau yang lainya, <br>
        dan untuk title buttom Teks harus berwarna putih. <br>
        Download File Dibawah ini :
        <a href="{{url('storage/images/web_foto/'.$w->img)}}" class="btn btn-primary btn-sm" download><i
                class="fas fa-file-download"></i> Download</a>
    </div>
</div>
<div class="section-body">
    <div class="row">
        @foreach ($ims as $r)
        <div class="col-12 col-md-3 col-lg-3">
            <div class="pricing pricing-highlight">
                <div class="pricing-title">
                    {{$r->title}}
                </div>
                <div class="pricing-padding">
                    <div class="pricing-price">
                        <img src="{{url('storage/images/web_foto/'.$r->img)}}" alt="" srcset="" style="width: 200px">
                    </div>
                    <div class="pricing-details">

                    </div>
                </div>
                <div class="pricing-cta">
                    <button data-toggle="modal" data-target="#fav{{$r->id}}" class="btn btn-warning btn-block"
                        href="#">Edit <i class="fas fa-pencil-alt"></i></button>

                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
@section('modal')
<!-- Modal -->
@foreach ($ims as $f)
<div class="modal fade" id="fav{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('im.update',$f->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control " value="{{$f->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <img src="{{url('storage/images/web_foto/'.$f->img)}}" alt="" style="width: 150px" class="ml-5">
                        <input type="file" name="img" class="form-control mt-2">
                    </div>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary float-right">Save changes</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach
@endsection
