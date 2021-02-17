@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Artikel</h1>
</div>

<div class="section-body">
    <div class="col-md-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="font-weight-bold text-primary">Data pengguna</h6>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        @foreach ($kategori as $kate)
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="category-{{ $kate->id }}"
                                    name="category[]" value="{{ $kate->id }}">
                                <label class="custom-control-label"
                                    for="category-{{ $kate->id }}">{{ $kate->name }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="img" class="form-control" id="inputgambar">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <img src="" alt="" id="showgambar" style="max-width:200px;max-height:200px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        <textarea class="form-control" id="summernote" name="content"
                            id="exampleFormControlTextarea1"></textarea>
                    </div>
                    <a href="{{route('post.index')}}" class="btn btn-warning">
                        Batal</a>
                    <button type="submit" class="btn btn-primary float-right">
                        Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
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
</script>
@stop