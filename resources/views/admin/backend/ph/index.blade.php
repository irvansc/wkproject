@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>List Pengumuman Aktif Harian</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Pengumuman Harian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data">
                            <thead class="thead-light">
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengha as $e=>$k)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{!!substr($k->body, 0,200)!!}</td>
                                    <td>
                                        <a href="{{route('ph.edit',$k->id)}}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button class="btn btn-danger btn-sm delete" id="{{$k->id}}"><i
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
        <div class="col-md-6">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">Add Pengumuman Harian</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('ph.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="body" id="editor" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function(){
        CKEDITOR.replace( 'editor' );
        $('#data').DataTable({
            "pageLength": 5,
    "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 'semua']],
    "bLengthChange": true,
        });
    $('body').on('click','.delete',function(){
        var id = $(this).attr('id');
    // var name = $(this).attr('name');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

        swalWithBootstrapButtons.fire({
        title: 'Yakin ? ',
        text: "Mau menghapus ??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes !',
        cancelButtonText: 'No !',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/ph/delete/"+id;
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
                'Menghapus ' ,
                'error'
                )
            }
            })
        });
})
</script>
@endpush
