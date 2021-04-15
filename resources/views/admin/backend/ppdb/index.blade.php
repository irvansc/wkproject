@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>PENERIMAAN PESERTA DIDIK BARU</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">PPDB</h6>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data">
                            <thead class="thead-light">
                                <tr>
                                    <th width="3%">No</th>
                                    <th>title</th>
                                    <th>body</th>
                                    <th>Aktif</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppdb as $e=>$k)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$k->title}}</td>
                                    <td>{!!substr($k->body, 0,200)!!}</td>
                                    <td>
                                        @if ($k->aktif == 1)
                                        <span class="badge badge-primary">AKTIF</span>
                                        @else
                                        <span class="badge badge-danger">NON-AKTIF</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#edit{{$k->id}}">Edit</button>
                                        @if ($k->aktif == 1)
                                        <a href="{{route('status.nonaktif',$k->id)}}"
                                            class="btn btn-danger btn-sm">NON-AKTIKAN</a>
                                        @else
                                        <a href="{{route('status.aktif',$k->id)}}"
                                            class="btn btn-info btn-sm">AKTIKAN</a>
                                        @endif
                                        <a href="" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    </td>
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
@foreach ($ppdb as $row)
<div class="modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit PPDB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('ppdb.update',$row->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$row->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Link Url Google Form</label>
                        <textarea name="body" id="body" cols="30" rows="10"
                            class="form-control">{{$row->body}}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
    $(function(){
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
