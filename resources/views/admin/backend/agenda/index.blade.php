@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Agenda</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Agenda</h6>
                    <a href="{{route('aagenda.create')}}" class="btn btn-primary ml-auto"> <i
                            class="fas fa-plus-circle"></i> Tambah
                        Agenda</a>
                </div>
                <div class="card-body">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th width="20px">No</th>
                                <th>Nama Agenda</th>
                                <th>Deskripsi</th>
                                {{-- <th>Dibuat Tanggal</th>
                                <th>Mulai</th>
                                <th>Selesai</th> --}}
                                {{-- <th>Tempat</th> --}}
                                <th>Waktu</th>
                                {{-- <th>Keterangan</th> --}}
                                <th>Pembuat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendas as $e=>$a)

                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$a->name}}</td>
                                <td>{!!substr(strip_tags($a->deskripsi), 0, 50)!!}</td>
                                {{-- <td>{{date("d F Y", strtotime($a->tanggal))}}</td>
                                <td>{{date("d F Y", strtotime($a->mulai))}}</td>
                                <td>{{date("d F Y", strtotime($a->selesai))}}</td> --}}
                                {{-- <td>{{$a->tempat}}</td> --}}
                                <td>{{$a->waktu}}</td>
                                {{-- <td>{{$a->keterangan}}</td> --}}
                                <td>{{$a->author}}</td>
                                <td>
                                    <a href="{{route('aagenda.show',$a->id)}}" class="btn btn-info btn-sm"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{route('aagenda.edit',$a->id)}}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-user-edit"></i></a>
                                    <button class="btn btn-danger btn-sm delete" name="{{$a->name}}" id="{{$a->id}}"><i
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
        text: "Mau menghapus Agenda "+ name +" ??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes !',
        cancelButtonText: 'No !',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/aagenda/delete/"+id;
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
            'Menghapus Agenda ' + name ,
            'error'
            )
        }
        })
        });
</script>

@endpush

