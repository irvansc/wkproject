@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>List Pengguna</h1>
</div>
<div class="section-body">
    <div class="col-md-10">
        <button data-toggle="modal" data-target="#tambah" class="btn btn-primary mb-2">
            <i class="fas fa-plus-circle"></i> Tambah Data</button>
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="font-weight-bold text-primary">Data pengguna</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <style>
                        .img {
                            width: 50px;
                            height: 50px;
                            border-radius: 50%;
                        }
                    </style>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>No Hp</th>
                                <th>Jenis Kelamin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $e=>$u)

                            <tr>
                                <td>{{$e+1}}</td>
                                <td>
                                    <img src="{{Auth::user()->getPhoto()}}" alt="" class="img">
                                </td>
                                <td>{{$u->name}}</td>
                                <td></td>
                                <td>{{$u->telp}}</td>
                                <td>{{$u->jenkel}}</td>
                                <td>
                                    <button class="btn btn-primary " data-toggle="modal" data-target="#pw{{$u->id}}">
                                        <i class="fa fa-key"></i></button>
                                    <a href="{{route('pengguna.edit',$u->id)}}" class="btn btn-warning "><i
                                            class="fas fa-user-edit"></i></a>
                                    <button class="btn btn-danger  delete" name="{{ $u->name }}" id="{{ $u->id }}"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
@section('modal')
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('pengguna.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control form-control-alternative" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control form-control-alternative" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="">password</label>
                            <input type="password" class="form-control form-control-alternative" name="password"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select id="" name="role" class="form-control" required>
                                <option value="">--Pilih Role--</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">No Hp</label>
                            <input type="text" class="form-control form-control-alternative" name="telp">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenkel" id="" class="form-control" required>
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input name="image" type="file" class="form-control form-control-alternative">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($user as $us)
<div class="modal fade" id="pw{{$us->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/pengguna/updatepw',$us->id)}}" method="post">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input id="password" type="password"
                            class="form-control form-password  {{ $errors->has('password') ? 'is-invalid' : ''}}"
                            name="password" autocomplete="new-password">

                        @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control form-password "
                            name="password_confirmation" autocomplete="new-password">
                    </div>
                    <input type="checkbox" class="form-checkbox"> Show password
                    <br>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('js')
<script>
    $(document).ready(function(){
    $('.form-checkbox').click(function(){
        if($(this).is(':checked')){
        $('.form-password').attr('type','text');
        }else{
        $('.form-password').attr('type','password');
        }
    });
    $('body').on('click','.delete',function(){
            var mhs_id = $(this).attr('id');
            var mhs_name = $(this).attr('name');
            swal({
                title: "Yakin?",
                text: "Mau Mengahapus "+ mhs_name +" ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/pengguna/delete/"+mhs_id;
                    // swal("Data siswa dengan name "+ siswa_name +" telah berhasil dihapus!", {
                    // icon: "success",
                    // });

                } else {
                    swal("Batal Menghapus  "+ mhs_name);
                }
            });
        });
})
</script>
@endsection
