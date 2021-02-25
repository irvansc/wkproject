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
        <div class="col-md-5">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Profile frontEnd</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <span>{{$foot->alamat}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Telphone</label>
                        <div class="col-sm-10">
                            <span>{{$foot->phone}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <span>{{$foot->email}}</span>
                        </div>
                    </div>
                    <a href="{{route('aprofile.edit',$foot->id)}}" class="btn btn-warning float-right"><i
                            class="fas fa-pencil-ruler"></i> Edit</a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Maps FrontEnd</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <iframe src="{{$foot->maps}}" width="400" height="300" style="border:0;" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
