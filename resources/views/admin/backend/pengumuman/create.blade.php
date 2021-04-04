@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Pengumuman</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Add Pengumuman</h6>

                </div>
                <div class="card-body">
                    <form action="{{route('apengumuman.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Pengumuman Nama</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Pengumuman Deskripsi</label>
                            <textarea name="body" id="editor" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <a href="{{route('apengumuman.index')}}" class="btn btn-warning">
                                <i class="fas fa-arrow-circle-left"></i>
                                Batal</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="ni ni-send"></i>
                                Submit</button>
                        </div>

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
