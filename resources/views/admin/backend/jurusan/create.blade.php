@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Jurusan</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Tambah Jurusan</h6>
                    <a href="{{route('ajurusan.index')}}" class="btn btn-warning ml-auto">Batal</a>
                </div>
                <div class="table-responsive">
                    <div class="card card-body">
                        <form action="{{route('ajurusan.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Jurusan</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                                    name="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan |<small><strong class="text-danger">Opsional
                                            jelaskan
                                            jurusan</strong></small></label>
                                <textarea name="ket" id="editor" cols="30" rows="10" class="form-control"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="">Image |<small><strong
                                            class="text-danger">Opsional</strong></small></label>
                                <input type="file" name="img" id="" class="form-control">
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
        CKEDITOR.replace("editor")

})
</script>
@endpush
