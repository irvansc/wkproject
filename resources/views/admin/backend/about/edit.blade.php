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
                    <a href="{{route('asiswa.index')}}" class="btn btn-warning ml-auto"> <i
                            class="fas fa-hand-point-left"></i> Batal</a>
                </div>
                <div class="card-body">
                    <form action="{{route('aabout.update',$about->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Foto Old</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <center>
                                            <img src="{{asset('web_photo/'.$about->photo)}}" alt="" id="showgambar"
                                                width="200px">
                                        </center>
                                        <input name="photo" class="form-control" type="file" id="inputgambar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-1">
                        <h6 class="heading-small text-primary text-center mb-4 " style="c">Title</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="title" class="form-control" type="text" value="{{$about->title}}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr class="my-4">
                        <!-- Description -->
                        <h6 class="heading-small text-primary text-center mb-4">Deskripsi</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <textarea name="deskripsi" id="summernote"
                                    class="form-control">{{$about->deskripsi}}</textarea>
                            </div>
                        </div>
                        <a href="{{route('aabout.index')}}" class="btn btn-warning"><i class="ni ni-bold-left"></i>
                            Batal</a>
                        <button type="submit" class="btn btn-primary float-right"><i class="ni ni-send"></i>
                            Submit</button>
                    </form>
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
