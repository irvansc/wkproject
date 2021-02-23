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
                    <h3 class="mb-0">Edit Siswa</h3>
                    <a href="{{route('asiswa.index')}}" class="btn btn-warning ml-auto"> <i
                            class="fas fa-arrow-circle-left"></i>
                        Batal</a>
                </div>
                <div class="card-body">
                    <form action="{{route('asiswa.update',$siswa->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nis <strong class="text-danger">*</strong></label>
                            <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror"
                                value="{{$siswa->nis}}">
                            @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama <strong class="text-danger">*</strong></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{$siswa->nama}}">
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
                                @foreach($kelas as $al)
                                <option value="{{ $al->id }}" {{ $al->id == $siswa->kelas_id ? 'selected' : '' }}>
                                    {{ $al->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Telphone</label>
                            <input type="text" name="telp" class="form-control" value="{{$siswa->telp}}">
                        </div>
                        <div class="form-group">
                            <label for="">jenkel <strong class="text-danger">*</strong></label>
                            <select name="jenkel" id="" class="form-control">
                                <option value="">--Pilih Jenis
                                    Kelamin--</option>
                                <option value="L" {{ ( $siswa->jenkel == 'L') ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="P" {{ ( $siswa->jenkel == 'P') ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control">{{$siswa->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Foto Old </label>
                            <br>
                            <img src="{{asset('siswa_photo/'.$siswa->photo)}}" alt="" style="width: 100px">
                        </div>
                        <div class="form-group">
                            <label for="">Foto </label>
                            <input type="hidden" name="hidden_file" value="{{$siswa->photo}}" class="form-control">
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
