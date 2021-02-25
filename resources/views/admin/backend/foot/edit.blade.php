@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Profile</h1>
</div>
<p>
    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        <i class="fas fa-info-circle text-white"></i> Informasi Penting
    </button>
</p>

<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <p style="color: black">
            Isi data sesuai dengan lokasi sekolah anda. <br>
            untuk Gmaps, anda pergi ke maps goole kemudian tentukan lokasi sekolah anda, <br>
            lalu klik bagikan, dan pilih sematkan/Embed, ambil URL nya, kemdian Update datanya, contoh URL : <br>
        </p>
        <span class="text-danger">
            https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.999813022987!2d106.7701570147555!3d-6.801009468406958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6833cb65b3c65f%3A0xee6b4f2eebf231a8!2sWkng%20Project!5e1!3m2!1sid!2sid!4v1614214774223!5m2!1sid!2sid
        </span>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Edit Profile frontEnd</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('aprofile.update',$f->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label for="inputEmail3">Alamat</label>
                            <textarea name="alamat" id="summernote" class="form-control ">
                                    {{$f->alamat}}
                                </textarea>
                        </div>
                        <div class="form-group ">
                            <label for="inputPassword3">Telphone</label>
                            <input type="text" name="phone" class="form-control" value="{{$f->phone}}">
                        </div>
                        <div class="form-group ">
                            <label for="inputPassword3">Email</label>
                            <input type="text" name="email" class="form-control" value="{{$f->email}}">
                        </div>
                        <div class="form-group ">
                            <label for="inputPassword3">Gmaps</label>
                            <input type="text" name="maps" class="form-control" value="{{$f->maps}}">
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i>
                            Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
