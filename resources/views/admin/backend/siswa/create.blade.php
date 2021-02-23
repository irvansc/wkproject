@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Siswa</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h3 class="mb-0">Tambah Siswa</h3>
                    <a href="{{route('asiswa.index')}}" class="btn btn-warning ml-auto"> <i
                            class="fas fa-arrow-circle-left"></i>
                        Batal</a>
                </div>
                <div class="card-body">
                    <form action="{{route('asiswa.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nis <strong class="text-danger">*</strong></label>
                            <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror">
                            @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama <strong class="text-danger">*</strong></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Kelas <strong class="text-danger">*</strong></label>
                            <select name="kelas" id="" class="form-control">
                                <option value="">--Pilih Kelas--</option>
                                @foreach ($kelas as $k)
                                <option value="{{$k->id}}">{{$k->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Telphone</label>
                            <input type="text" name="telp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">jenkel <strong class="text-danger">*</strong></label>
                            <select name="jenkel" id="" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Foto </label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <span class="float-left">- Tanda <strong class="text-danger">*</strong> wajib diisi, selain itu
                            Opsional</span>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <i class="ni ni-send"></i>
                                Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
