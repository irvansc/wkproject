@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Album</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Album</h6>
                    <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#file"><i
                            class="fas fa-plus-circle"></i> Tambah Album</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Nama Album</th>
                                    <th>Cover Album</th>
                                    <th>Jumlah Foto</th>
                                    <th>Video</th>
                                    <th>Dibuat Pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($albums as $e=>$a)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$a->nama}}</td>
                                    <td>
                                        <img src="{{asset('images/foto/album/'.$a->cover)}}" alt="" style="width:80px;">
                                    </td>
                                    <td>
                                        {{$a->foto->count()}}
                                    </td>
                                    <td>
                                        @foreach ($a->foto as $item)
                                        <a href="{{$item->url_video}}">{{str_limit($item->url_video, 30)}}</a>
                                        @endforeach
                                    </td>
                                    <td>{{$a->created_at}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-user-edit"
                                                data-toggle="modal" data-target="#file{{$a->id}}"></i></button>
                                        <button class="btn btn-danger btn-sm delete" name="{{$a->nama}}"
                                            id="{{$a->id}}"><i class=" fas fa-trash"></i></button>
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
<div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Upload File Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('albums.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Album</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Cover Album</label>
                        <input type="file" name="cover" class="form-control" required>
                        <small><strong class="text-red">Upload file dengan extension| jpg|png|jpeg</strong></small>
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
@foreach ($albums as $d)
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
                <form action="{{route('albums.update',$d->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama Album</label>
                        <input type="text" name="nama" value="{{$d->nama}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Cover Album</label>
                        <img src="{{asset('images/foto/album/'.$d->cover)}}" style="width: 100px" alt="">
                    </div>

                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="cover" class="form-control">
                        <small><strong class="text-red">Upload file dengan extension| jpg|png|jpeg</strong></small>

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
  text: "Mau menghapus Albums "+ name +" ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes !',
  cancelButtonText: 'No !',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.location = "/albums/delete/"+id;
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
      'Menghapus Albums ' + name ,
      'error'
    )
  }
})
        });
        })
</script>
@endpush
