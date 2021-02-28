@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Download</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Edit File Download</h6>
                    <a href="{{route('adownload.index')}}" class="btn btn-primary ml-auto"> <i
                            class="fas fa-pull-right"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('adownload.update',$d->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama File</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{$d->title}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan File <small class="text-red">*Opsional</small></label>
                            <input type="text" name="keterangan" class="form-control" value="{{$d->keterangan}}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Author</label>
                            <input type="text" name="author" class="form-control" value="{{$d->author}}">
                        </div>
                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file" name="data" class="form-control @error('data') is-invalid @enderror"
                                value="{{$d->data}}">
                            @error('data')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small><strong class="text-red">Upload file dengan extension|
                                    Pdf|doc|xls|ppt</strong></small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
