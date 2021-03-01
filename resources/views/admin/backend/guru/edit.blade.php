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
                    <h3 class="mb-0">Edit Guru</h3>
                    <a href="{{route('aguru.index')}}" class="btn btn-warning ml-auto"> <i
                            class="fas fa-arrow-circle-left"></i>
                        Batal</a>
                </div>
                <div class="card-body">
                    <form action="{{route('aguru.update',$guru->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nip <strong class="text-danger">*</strong></label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                value="{{$guru->nip}}">
                            @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama <strong class="text-danger">*</strong></label>
                            <input type="text" name="nama_guru"
                                class="form-control @error('nama_guru') is-invalid @enderror"
                                value="{{$guru->nama_guru}}">
                            @error('nama_guru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mata Pelajaran <strong class="text-danger">*</strong></label>
                            <input type="text" name="mapel" class="form-control @error('mapel') is-invalid @enderror"
                                value="{{$guru->mapel}}">
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
                                @foreach($kelas as $al)
                                <option value="{{ $al->id }}" {{ $al->id == $guru->kelas_id ? 'selected' : '' }}>
                                    {{ $al->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Telphone</label>
                            <input type="text" name="telp" class="form-control" value="{{$guru->telp}}">
                        </div>
                        <div class="form-group">
                            <label for="">jenkel <strong class="text-danger">*</strong></label>
                            <select name="jenkel" id="" class="form-control">
                                <option value="">--Pilih Jenis
                                    Kelamin--</option>
                                <option value="L" {{ ( $guru->jenkel == 'L') ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="P" {{ ( $guru->jenkel == 'P') ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir <strong class="text-danger">*</strong></label>
                            <input type="text" name="tmp_lahir" class="form-control" value="{{$guru->tmp_lahir}}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir <strong class="text-danger">*</strong></label>
                            <input type="text" name="tgl_lahir" class="form-control" placeholder="17 September 2021"
                                value="{{$guru->tgl_lahir}}">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control">{{$guru->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Foto Old </label>
                            <br>
                            <img src="{{asset('images/foto/guru/'.$guru->photo)}}" alt="" style="width: 100px">
                        </div>
                        <div class="form-group">
                            <label for="">Foto </label>
                            <input type="hidden" name="hidden_file" value="{{$guru->photo}}" class="form-control">
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
