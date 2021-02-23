@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Pengumuman</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Pengumuman</h6>
                    <a href="{{route('apengumuman.create')}}" class="btn btn-primary ml-auto"> <i
                            class="fas fa-plus-circle"></i> Tambah
                        Pengumuman</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi </th>
                                    <th>Pembuat</th>
                                    <th>Dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengumuman as $e=>$a)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$a->title}}</td>
                                    <td>{!!substr(strip_tags($a->body), 0, 50)!!}</td>
                                    <td>
                                        {{ $a->user->name }}
                                    </td>
                                    <td>{{date("d F Y", strtotime($a->tanggal))}}</td>
                                    <td>
                                        <a href="{{route('apengumuman.edit',$a->id)}}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-user-edit"></i></a>

                                        <button class="btn btn-danger btn-sm delete" name="{{$a->title}}"
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
        text: "Mau menghapus Pengumuman "+ name +" ??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes !',
        cancelButtonText: 'No !',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/apengumuman/delete/"+id;
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
            'Menghapus Pengumuman ' + name ,
            'error'
            )
        }
        })
        });
</script>

@endpush
