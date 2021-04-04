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
                    <h6 class="font-weight-bold text-primary">Edit Slider</h6>
                    <a href="{{route('slider.index')}}" class="btn btn-warning ml-auto"> <i
                            class="fas fa-chevron-left"></i> Batal
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('slider.update',$a->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$a->title}}">
                        </div>


                        <div class="form-group">
                            <label for="">Foto old</label>
                            <img src="{{asset('images/foto/web/'.$a->img)}}" alt="" style="width: 200px">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">deskripsi <strong style="color: red">* Maksimal 30 kata
                                    disarankan</strong></label>
                            <textarea id="editor" name="deskripsi" style="width:auto; height:300px;"
                                class="form-control">
                                {{$a->deskripsi}}
                            </textarea>
                        </div>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-send"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    CKEDITOR.replace( 'editor' );

</script>
@endpush
