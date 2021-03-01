@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>About</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">About</h6>
                </div>
                <div class="card-body">
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Visi"
                            aria-expanded="false" aria-controls="collapseExample">
                            photo
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Misi"
                            aria-expanded="false" aria-controls="collapseExample">
                            Title
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Tujuan"
                            aria-expanded="false" aria-controls="collapseExample">
                            Deskripsi
                        </button>
                    </p>
                    <div class="collapse" id="Visi">
                        <div class="card card-body">
                            <img src="{{asset('images/'.$about->photo)}}" alt="" style="width: 200px">
                        </div>
                    </div>
                    <div class="collapse" id="Misi">
                        <div class="card card-body">
                            {!!$about->title!!}

                        </div>
                    </div>
                    <div class="collapse" id="Tujuan">
                        <div class="card card-body">
                            {!!$about->deskripsi!!}

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
                    <h6 class="font-weight-bold text-primary">Edit Data</h6>

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
                            <form action="{{route('aabout.update',$about->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <center>
                                        <img src="{{url('storage/images/'.$about->photo)}}" alt="" id="showgambar"
                                            width="200px">
                                    </center>
                                    <input name="photo" class="form-control" type="file" id="inputgambar">
                                </div>
                                <div class="form-group">
                                    <center>
                                        <h2>Title</h2>
                                    </center>
                                    <input name="title" class="form-control" type="text" value="{{$about->title}}">

                                </div>
                                <div class="form-group">
                                    <center>
                                        <h2>Deskripsi</h2>
                                    </center>
                                    <textarea name="deskripsi" id="summernote"
                                        class="form-control">{!!$about->deskripsi!!}</textarea>
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
@push('js')
<script>
    $(document).ready(function () {
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });
    })
</script>
@endpush
