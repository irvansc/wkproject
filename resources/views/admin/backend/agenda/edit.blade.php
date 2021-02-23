@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Agenda</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Edit Agenda</h6>

                </div>
                <div class="card-body">
                    <form action="{{route('aagenda.update',$agenda->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Agenda Nama</label>
                            <input type="text" name="name" class="form-control" value="{{$agenda->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Agenda Deskripsi</label>
                            <textarea name="deskripsi" id="summernote"
                                class="form-control">{{$agenda->deskripsi}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Agenda Mulai</label>
                            <input type="date" name="mulai" class="form-control" value="{{$agenda->mulai}}">
                        </div>
                        <div class="form-group">
                            <label for="">Agenda Selesai</label>
                            <input type="date" name="selesai" class="form-control" value="{{$agenda->selesai}}">
                        </div>
                        <div class="form-group">
                            <label for="">Agenda Tempat</label>
                            <input type="text" value="{{$agenda->tempat}}" name="tempat" class="form-control"
                                placeholder="Gedung Serbaguna">
                        </div>
                        <div class="form-group">
                            <label for="">Agenda Waktu</label>
                            <input type="text" name="waktu" value="{{$agenda->waktu}}" class="form-control"
                                placeholder="contoh : 08:00-09:00">

                        </div>
                        <div class="form-group">
                            <label for="">Agenda Keterangan</label>
                            <input type="text" name="keterangan" value="{{$agenda->keterangan}}" class="form-control"
                                placeholder="keterangan">
                        </div>
                        <div class="form-group">
                            <label for="">Agenda Pembuat</label>
                            <input type="text" name="author" value="{{$agenda->author}}" class="form-control"
                                placeholder="Drs. Example, M.Si">
                        </div>
                        <div class="form-group">
                            <a href="{{route('aagenda.index')}}" class="btn btn-warning"><i
                                    class="fas fa-arrow-circle-left"></i>
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
