@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Video</h1>

</div>
<p>
    <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        <i class="fas fa-info-circle text-danger"></i> Informasi Penting
    </button>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        Url video harus dengan format seperti ini
        <span class="text-danger">https://www.youtube.com/embed/4eKN_H-iavM</span>
        <p>bisa dilihat di Youtube, lalu klik bagikan pilih sematkan video, ambil Urlnya saja.
        </p>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Video</h6>

                    <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#file"><i
                            class="fas fa-plus-circle"></i> Tambah Video</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Title</th>
                                    <th>Url Video</th>
                                    <th>Dipost pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $e=>$a)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$a->title}}</td>
                                    <td>
                                        <a href="{{$a->url}}">{{$a->url}}</a>
                                    </td>
                                    <td>{{$a->tanggal}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-user-edit"
                                                data-toggle="modal" data-target="#file{{$a->id}}"></i></button>
                                        <button class="btn btn-danger btn-sm delete" name="{{$a->title}}"
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Upload Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('avideo.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Video</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Url Video</label>
                        <input type="text" name="url" class="form-control" required>
                        {{-- <small><strong class="text-red">Upload file dengan extension| jpg|png|jpeg</strong></small> --}}
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
@foreach ($videos as $d)
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
                <form action="{{route('avideo.update',$d->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nama Foto</label>
                        <input type="text" name="title" value="{{$d->title}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Url Video</label>
                        <input type="text" name="url" class="form-control" value="{{$d->url}}">
                        {{-- <small><strong class="text-red">Upload file dengan extension| jpg|png|jpeg</strong></small> --}}

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
  text: "Mau menghapus Video "+ name +" ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes !',
  cancelButtonText: 'No !',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.location = "/avideo/delete/"+id;
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
      'Menghapus Video ' + name ,
      'error'
    )
  }
})
        });
        })
</script>
@endpush
