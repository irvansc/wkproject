@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>List Jurusan</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Jurusan</h6>
                    <a href="{{route('ajurusan.create')}}" class="btn btn-primary ml-auto">
                        <i class="fas fa-plus-circle"></i> Tambah Jurusan
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data">
                            <thead class="thead-light">
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Foto</th>
                                    <th>Jurusan</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurusan as $e=>$k)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>
                                        <img src="{{asset('images/foto/jurusan/'.$k->img)}}" alt=""
                                            style="max-width: 100px">
                                    </td>
                                    <td>{{$k->title}}</td>
                                    <td>{!!substr($k->ket, 0,200)!!}</td>
                                    <td>
                                        <a href="{{route('ajurusan.edit',$k->id)}}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button class="btn btn-danger btn-sm delete" name="{{$k->title}}"
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
    </div>
</div>
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
            window.location = "/ajurusan/delete/"+id;
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
        CKEDITOR.replace("editor")

})
</script>
@endpush
