@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Download</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List File Download</h6>
                    <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#file"><i
                            class="fas fa-plus-circle"></i> Tambah File</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="data">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Nama File</th>
                                    <th>Tanggal Post</th>
                                    <th>Oleh</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($download as $e=>$a)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>
                                        {{$a->title}}
                                    </td>
                                    <td>{{$a->created_at}}</td>
                                    <td>{{$a->author}}</td>
                                    <td>
                                        <a download class="btn btn-primary button btn-sm" title="Download"
                                            href="{{ asset('/filedownload/'.$a->data) }}"><i
                                                class="fas fa-download"></i></a>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-user-edit"
                                                data-toggle="modal" data-target="#file{{$a->id}}"></i></button>
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
@section('modal')
<style>
    .progress {
        position: relative;
        width: 100%;
    }

    .bar {
        background-color: #2320f1;
        width: 0%;
        height: 30px;
    }

    .percent {
        position: absolute;
        display: inline-block;
        left: 50%;
        color: #ffffff;
    }
</style>
<div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('adownload.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama File</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan File <small class="text-red">*Opsional</small></label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Author</label>
                        <input type="text" name="author" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="data" class="form-control" required>
                        <small><strong class="text-red">Upload file dengan extension| Pdf|doc|xls|ppt</strong></small>
                        <br>

                        <div class="progress">
                            <div class="bar">
                                <div class="percent">
                                    0%
                                </div>
                            </div>
                        </div>
                    </div>
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
@foreach ($download as $d)
<div class="modal fade" id="file{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('adownload.update',$d->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama File</label>
                        <input type="text" name="title" class="form-control" value="{{$d->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan File <small class="text-red">*Opsional</small></label>
                        <input type="text" name="keterangan" class="form-control" value="{{$a->keterangan}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Author</label>
                        <input type="text" name="author" class="form-control" value="{{$a->author}}">
                    </div>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="data" class="form-control">
                        <small><strong class="text-red">Upload file dengan extension| Pdf|doc|xls|ppt</strong></small>
                        <br>

                        <div class="progress">
                            <div class="bar">
                                <div class="percent">
                                    0%
                                </div>
                            </div>
                        </div>
                    </div>
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

        $('#data').DataTable({
            "pageLength": 5,
    "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 'semua']],
    "bLengthChange": true,
        });
var bar = $('.bar');
            var percent = $('.percent');
      $('form').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            // alert("File Uploaded Successfully");
            window.location = "/adownload";
        }
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
  text: "Mau menghapus "+ name +" ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes !',
  cancelButtonText: 'No !',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.location = "/adownload/delete/"+id;
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
      'Menghapus Post ' + name ,
      'error'
    )
  }
})
        });
})
</script>
@endpush
