@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Inbox</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Inbox</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telphone</th>
                                    <th>status</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontaks as $e=>$a)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$a->nama}}</td>
                                    <td>{{$a->email}}</td>
                                    <td>{{$a->telp}}</td>
                                    <td>
                                        @if ($a->status == 0)
                                        <span class="badge badge-danger">Belum dibaca</span>
                                        @else
                                        <span class="badge badge-info">Sudah dibaca</span>

                                        @endif
                                    </td>
                                    <td>{{date("d M Y",strtotime($a->tanggal))}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" title="baca pesan" data-toggle="modal"
                                            data-target="#show{{$a->id}}"><i class="fas fa-eye"></i>
                                        </button>
                                        @if ($a->status == 0)
                                        <a href="{{route('inbox.edit',$a->id)}}" class="btn btn-warning btn-sm"
                                            title="sudah dibaca">
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                        @else

                                        @endif

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
@foreach ($kontaks as $row)

<div class="modal fade" id="show{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="{{$row->nama}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Pesan</label>
                    <textarea class="form-control" disabled>{{$row->pesan}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
  text: "Mau menghapus Inbox "+ name +" ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes !',
  cancelButtonText: 'No !',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.location = "/inbox/delete/"+id;
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
      'Menghapus Inbox ' + name ,
      'error'
    )
  }
})
        });
        })
</script>
@endpush
