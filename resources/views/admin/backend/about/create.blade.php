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
                    <a href="{{route('asiswa.create')}}" class="btn btn-primary ml-auto"> <i
                            class="fas fa-plus-circle"></i> Tambah
                        Siswa</a>
                </div>
                <div class="card-body">
                    <div class="col-xl-4 order-xl-2">
                        <div class="card card-profile">
                            <img src="" id="showgambar" alt="Image placeholder" class="card-img-top">
                            <input type="file" name="photo" class="form-control" id="inputgambar">
                            <div class="text-center">
                                <div>
                                    <i class="fas fa-info-circle text-danger"></i> Foto akan otomatis di Resize dengan
                                    ukuran 456 x 470
                                    pixel
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">About</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('aabout.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4">Title</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input name="title" class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr class="my-4">
                                    <!-- Description -->
                                    <h6 class="heading-small text-muted mb-4">Deskripsi</h6>
                                    <div class="pl-lg-4">
                                        <div class="form-group">
                                            <textarea name="deskripsi" id="summernote" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <a href="{{route('aabout.index')}}" class="btn btn-warning"><i
                                            class="ni ni-bold-left"></i>
                                        Batal</a>
                                    <button type="submit" class="btn btn-primary float-right"><i class="ni ni-send"></i>
                                        Submit</button>
                                </form>
                            </div>
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
