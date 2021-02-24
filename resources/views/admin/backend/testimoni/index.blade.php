@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Testimonial</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Testimonial</h6>
                    <button data-toggle="modal" data-target="#tambah" class="btn btn-sm btn-primary ml-auto"> <i
                            class="fas fa-plus-circle"></i>
                        Tambah Testimoni</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Testimoni</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimoni as $e=>$a)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>
                                        <img src="{{asset('testimoni_foto/'.$a->foto)}}" alt="" width="100px">
                                    </td>
                                    <td>{{$a->nama}}</td>
                                    <td>{{str_limit($a->pesan, 50)}}</td>
                                    <td>{{$a->ket}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit{{$a->id}}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></button>

                                        <button class="btn btn-danger btn-sm delete" name="{{$a->nama}}"
                                            id="{{$a->id}}"><i class="fas fa-trash"></i></button>
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
</div>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('testimoni.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="ket" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Testimoni</label>
                        <textarea name="pesan" class="form-control" required id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                        <small class="text-danger">Foto akan otomatis di Risize ukuran 300 x 300 px</small>
                    </div>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right"><i class="ni ni-send"></i> Save
                        changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach ($testimoni as $r)

<div class="modal fade" id="edit{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('testimoni.update',$r->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{$r->nama}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="ket" value="{{$r->ket}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Testimoni</label>
                        <textarea name="pesan" class="form-control" id="" cols="30" rows="10">{{$r->pesan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control">
                        <small class="text-danger">Foto akan otomatis di Risize ukuran 300 x 300 px</small>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right"><i class="ni ni-send"></i> Save
                        changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@push('js')
<script>
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
        text: "Mau menghapus Testimoni "+ name +" ??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes !',
        cancelButtonText: 'No !',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/testimoni/delete/"+id;
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
            'Menghapus Testimoni ' + name ,
            'error'
            )
        }
        })
        });
</script>
@endpush
