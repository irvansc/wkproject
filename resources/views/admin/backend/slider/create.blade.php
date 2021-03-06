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
                            <textarea id="editor" name="deskripsi"
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

                        <div class="form-group">
                            <label for="">Aktikan Tombol PPDB ? </label>
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="btn1" name="btn" value="y">
                                    <label class="custom-control-label" for="btn1">Iya</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="btn2" name="btn" value="n">
                                    <label class="custom-control-label" for="btn2">Tidak</label>
                                </div>
                            </div>
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
