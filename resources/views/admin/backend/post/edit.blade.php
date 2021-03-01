@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Artikel</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header border-0">
                    <h2> Artikel</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul</label>
                            <input type="text" name="title" class="form-control" required value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            @foreach ($kategori as $kate)
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="category-{{ $kate->id }}"
                                        name="category[]" value="{{ $kate->id }}"
                                        @if($post->categories->pluck('name')->contains($kate->name)) checked @endif>
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
                                    <input type="hidden" name="hidden_file" class="form-control"
                                        value="{{asset('artikel/'.$post->img)}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <img src="{{asset('images/foto/post/'.$post->img)}}" alt="" id="showgambar"
                                        style="max-width:200px;max-height:200px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea class="form-control" id="summernote" name="content"
                                id="exampleFormControlTextarea1" rows="3">
                            {!!$post->content!!}
                            </textarea>
                        </div>
                        <a href="{{route('post.index')}}" class="btn btn-warning"> <i class="ni ni-bold-left"></i>
                            Batal</a>
                        <button type="submit" class="btn btn-primary float-right"> <i class="fas fa-send"></i>
                            Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
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
@endpush
