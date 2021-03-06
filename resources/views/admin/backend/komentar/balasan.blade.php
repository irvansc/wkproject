@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>List Komentar</h1>
</div>
<div class="section-body">
    <div class="col-md-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">Komentar Balasan</h6>
                <a href="{{route('komentar.index')}}" class="btn btn-warning ml-auto">Kembali</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tab-bordered" id="data">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Balasan untuk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($komen as $e=>$c)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{str_limit($c->body,50)}}</td>
                                <td>
                                    @if ($c->commentable != null)
                                    {{$c->commentable->body}}

                                    @else
                                    <span class="badge bi-arrow-90deg-up text-danger">Komentar sudah terhapus</span>
                                    @endif
                                </td>
                                <td>
                                    <button title="Detail" class="btn btn-info " data-toggle="modal"
                                        data-target="#show{{$c->id}}"><i class="fas fa-eye"></i>
                                    </button>
                                    <button title="Detail" class="btn btn-warning " data-toggle="modal"
                                        data-target="#edit{{$c->id}}"><i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <button title="Delete" class="btn btn-danger delete" id="{{$c->id}}"
                                        name="{{$c->name}}" title="Delete"><i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty

                            @endforelse


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
@foreach ($komen as $cek)
<div class="modal fade" id="edit{{$cek->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Balasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('komentar.update',$cek->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Komentar</label>
                        <input type="hidden" name="name" value="{{$cek->name}}">
                        <input type="hidden" name="email" value="{{$cek->email}}">
                        <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$cek->body}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i>
                        Sumbit</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($komen as $cek)
<div class="modal fade" id="show{{$cek->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <span class="form-control">{{$cek->name}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <span class="form-control">{{$cek->email}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Komentar</label>
                        <div class="col-sm-10">
                            <span class="form-control">{{$cek->body}}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Komentar untuk</label>
                        <div class="col-sm-10">
                            <span class="form-control">
                                @if ($cek->commentable != null)
                                {{$cek->commentable->body}}

                                @else
                                <span class="badge bi-arrow-90deg-up text-danger">Komentar sudah terhapus</span>
                                @endif


                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Komentar tanggal balas</label>
                        <div class="col-sm-10">
                            <span class="form-control">

                                {{$cek->created_at}}

                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning" data-dismiss="modal"> Close</button>
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
            text: "Mau menghapus Komentar Balasan "+ name +" ??",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes !',
            cancelButtonText: 'No !',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/komentar/balasan/delete/"+id;
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
                'Menghapus Komentar Balasan ' + name ,
                'error'
                )
            }
            })
        });
                $('#data').DataTable({
            "pageLength": 5,
            "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 'semua']],
            "bLengthChange": true,
        });
})
</script>
@endpush
