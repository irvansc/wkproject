@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Slider</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Add Slider</h6>
                    <a href="{{route('slider.index')}}" class="btn btn-warning ml-auto"> <i
                            class="fas fa-chevron-left"></i> Batal
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">deskripsi <strong style="color: red">* Maksimal 30 kata
                                    disarankan</strong></label>
                            <textarea id="summernote" name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"> </textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-send"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
