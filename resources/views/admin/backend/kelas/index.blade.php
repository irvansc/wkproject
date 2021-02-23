@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>List Kelas</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="font-weight-bold text-primary">Data Kelas</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data">
                            <thead class="thead-light">
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Kelas</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelass as $e=>$k)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$k->nama_kelas}}</td>
                                    <td>{{$k->keterangan}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-user-edit"
                                                data-toggle="modal" data-target="#file{{$k->id}}"></i></button>
                                        <button class="btn btn-danger btn-sm delete" name="{{$k->nama_kelas}}"
                                            id="{{$k->id}}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="font-weight-bold text-primary">Tambah Kelas</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card-body">
                            <form action="{{route('kelas.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Kelas</label>
                                    <input type="text" class="form-control  @error('nama_kelas') is-invalid @enderror"
                                        id="nama_kelas" name="nama_kelas" autofocus>

                                    @error('nama_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan |<small><strong
                                                class="text-danger">Opsional</strong></small></label>
                                    <input type="text" name="keterangan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> <i class="ni ni-send"> </i>
                                        Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
@foreach ($kelass as $d)
<div class="modal fade" id="file{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('kelas.update',$d->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" value="{{$d->nama_kelas}}">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan |<strong class="text-danger">Opsional</strong></label>
                        <input type="text" name="keterangan" class="form-control" value="{{$d->keterangan}}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endsection
    @push('js')
    <script>
        $(document).ready(function(){
        $('#postData').DataTable({
            "pageLength": 5,
    "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 'semua']],
    "bLengthChange": true,
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
        text: "Mau menghapus Kelas "+ name +" ??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes !',
        cancelButtonText: 'No !',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/kelas/delete/"+id;
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
                'Menghapus Kelas ' + name ,
                'error'
                )
            }
            })
        });
})
    </script>
    @endpush
