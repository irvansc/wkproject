@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Sejarah</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Sejarah</h6>
                </div>
                <div class="card-body">
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Visi"
                            aria-expanded="false" aria-controls="collapseExample">
                            Sejarah
                        </button>
                    </p>
                    <div class="collapse" id="Visi">
                        <div class="card card-body">
                            <center>
                                <h2>{!!$sj->title!!}</h2>
                                <br>
                                {!!$sj->deskripsi!!}
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Edit Sejarah</h6>

                </div>
                <div class="card-body">
                    <center>
                        <button class="btn btn-warning btn-block mb-2" type="button" data-toggle="collapse"
                            data-target="#Edit" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </button>
                    </center>
                    <div class="collapse" id="Edit">
                        <div class="card card-body">
                            <form action="{{route('sejarah.update',$sj->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <center>
                                        <h2>Title</h2>
                                    </center>
                                    <input type="text " name="title" class="form-control" value="{{$sj->title}}">
                                </div>
                                <div class="form-group">
                                    <center>
                                        <h2>Deskripsi</h2>
                                    </center>
                                    <textarea name="deskripsi" id="summernote"
                                        class="form-control">{!!$sj->deskripsi!!}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="ni ni-send"></i> Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
