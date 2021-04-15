@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Edit Pengumuman Aktif Harian</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Edit Pengumuman Harian</h6>
                    <a href="{{route('ph.index')}}" class="btn btn-warning ml-auto">Batal</a>
                </div>
                <div class="card-body">
                    <form action="{{route('ph.update',$ph->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="body" id="editor" class="form-control" cols="30" rows="10">
                                {{$ph->body}}
                            </textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function(){
        CKEDITOR.replace("editor")
})
</script>
@endpush
