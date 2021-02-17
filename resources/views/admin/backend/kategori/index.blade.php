@extends('admin.backend.layouts.master')


@section('content')
<div class="section-header">
    <h1>Kategori</h1>
</div>
<div class="secction-body">
    <div class="row">
        <div class="col-md-6">
            <!-- Light table -->
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="font-weight-bold text-primary">List Kategori Blog</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategories as $e=>$kat)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$kat->name}}</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#edit{{$kat->id}}"><i class="fas fa-pencil-alt"></i></a>
                                        <button class="btn btn-danger btn-sm delete" name="{{$kat->name}}"
                                            id="{{$kat->id}}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <!-- Card header -->
                <div class="card-header text-blue">
                    <h3 class="mb-0">Tambah Kategori</h3>
                </div>
                <!-- Light table -->
                <div class="card-body">
                    <div class="col">
                        <form action="{{route('kategori.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for=""> Nama Kategori</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right"><i class="ni ni-send"></i>
                                    Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
@foreach ($kategories as $kate)

<div class="modal fade" id="edit{{$kate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('kategori.update',$kate->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">Nama Kategori</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{$kate->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
            var id = $(this).attr('id');
            var name = $(this).attr('name');
            swal({
                title: "Yakin?",
                text: "Mau Mengahapus "+ name +" ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/kategori/delete/"+id;
                    // swal("Data siswa dengan name "+ siswa_name +" telah berhasil dihapus!", {
                    // icon: "success",
                    // });

                } else {
                    swal("Batal Menghapus  "+ name);
                }
            });
        });
})
</script>
@endsection
