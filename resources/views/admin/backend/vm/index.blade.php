@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>V-M</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Visi - Misi</h6>

                </div>
                <div class="card-body">
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Visi"
                            aria-expanded="false" aria-controls="collapseExample">
                            Visi
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Misi"
                            aria-expanded="false" aria-controls="collapseExample">
                            Misi
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Tujuan"
                            aria-expanded="false" aria-controls="collapseExample">
                            Tujuan
                        </button>
                    </p>
                    <div class="collapse" id="Visi">
                        <div class="card card-body">
                            {!!$vm->visi!!}
                        </div>
                    </div>
                    <div class="collapse" id="Misi">
                        <div class="card card-body">
                            {!!$vm->misi!!}

                        </div>
                    </div>
                    <div class="collapse" id="Tujuan">
                        <div class="card card-body">
                            {!!$vm->tujuan!!}

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
                            <form action="{{route('vm.update',$vm->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <center>
                                        <h2>Visi</h2>
                                    </center>
                                    <textarea name="visi" id="editor" class="form-control">{!!$vm->visi!!}</textarea>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <h2>Misi</h2>
                                    </center>
                                    <textarea name="misi" id="editor1" class="form-control">{!!$vm->misi!!}</textarea>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <h2>Tujuan | <small class="text-danger">Opsional</small></h2>
                                    </center>
                                    <textarea name="tujuan" id="editor2"
                                        class="form-control">{!!$vm->tujuan!!}</textarea>
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
    CKEDITOR.replace('editor');
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
</script>
@endpush
