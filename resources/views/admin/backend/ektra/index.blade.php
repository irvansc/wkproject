@extends('admin.backend.layouts.master')


@section('content')
<div class="section-header">
    <h1>Ekstrakulikuler</h1>
</div>
<div class="secction-body">
    <div class="row">
        <div class="col-md-8">
            <!-- Light table -->
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="font-weight-bold text-primary">List Ekstra</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Image</th>
                                    <th>Nama Ekstrakulikuler</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ektra as $e=>$row)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>
                                        <img src="{{asset('images/foto/ekstra/'.$row->img)}}" style="max-width: 100px"
                                            alt="">
                                    </td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->keterangan}}</td>
                                    <td><span class="badge badge-primary">{{$row->status}}</span></td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#edit{{$row->id}}"><i class="fas fa-pencil-alt"></i></a>
                                        <button class="btn btn-danger btn-sm delete" name="{{$row->nama}}"
                                            id="{{$row->id}}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <!-- Card header -->
                <div class="card-header text-blue">
                    <h3 class="mb-0">Tambah Ekstrakulikuler</h3>
                </div>
                <!-- Light table -->
                <div class="card-body">
                    <div class="col">
                        <form action="{{route('ekstra.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Ekstrakulikuler</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">--Pilih Status--</option>
                                    <option value="wajib">wajib</option>
                                    <option value="pilihan">pilihan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="img" class="form-control">
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
@foreach ($ektra as $kate)

<div class="modal fade" id="edit{{$kate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Ekstrakulikuler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('ekstra.update',$kate->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama Ekstrakulikuler</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            value="{{$kate->nama}}">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="wajib" @if ($kate=='wajib' ) selected @endif>Wajib</option>
                            <option value="pilihan" @if ($kate=='pilihan' ) selected @endif>Pilihan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="{{$kate->keterangan}}">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="img" class="form-control">
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
@endforeach
@endsection
@push('js')
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
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

        swalWithBootstrapButtons.fire({
        title: 'Yakin ? ',
        text: "Mau menghapus "+ name +" ??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes !',
        cancelButtonText: 'No !',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/ekstra/delete/"+id;
            // swalWithBootstrapButtons.fire(
            //   'Deleted!',
            //   'Your file has been deleted.',
            //   'success'
            // )
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Batal',
            'Menghapus ' + name ,
            'error'
            )
        }
        })
        });
})
</script>
@endpush
