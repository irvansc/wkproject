@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Guru</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h3 class="mb-0">Tambah Guru</h3>
                    <a href="{{route('aguru.index')}}" class="btn btn-warning ml-auto"> <i
                            class="fas fa-arrow-circle-left"></i>
                        Batal</a>
                </div>
                <div class="card-body">
                    <form action="{{route('aguru.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nip <strong class="text-danger">*</strong></label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror">
                            @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama <strong class="text-danger">*</strong></label>
                            <input type="text" name="nama_guru"
                                class="form-control @error('nama_guru') is-invalid @enderror">
                            @error('nama_guru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mata Pelajaran <strong class="text-danger">*</strong></label>
                            <input type="text" name="mapel" class="form-control @error('mapel') is-invalid @enderror">
                            @error('mapel')
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
                            <label for="">Tempat Lahir <strong class="text-danger">*</strong></label>
                            <input type="text" name="tmp_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir <strong class="text-danger">*</strong></label>
                            <input type="text" name="tgl_lahir" class="form-control" placeholder="17 September 2021">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
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
