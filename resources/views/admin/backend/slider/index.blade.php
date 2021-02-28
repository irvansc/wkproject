@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Slider</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Foto Slider</h6>
                    <a href="{{route('slider.create')}}" class="btn btn-primary ml-auto"><i
                            class="fas fa-plus-circle"></i> Tambah Slider</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Title</th>
                                    <th>Deskripsi</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider as $e=>$a)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$a->title}}</td>
                                    <td>{!!$a->deskripsi!!}</td>
                                    <td>
                                        <img src="{{url('storage/images/web_foto/'.$a->img)}}" alt=""
                                            style="width:200px;">
                                    </td>
                                    <td>
                                        <a href="{{route('slider.edit',$a->id)}}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-user-edit"></i></a>
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
  text: "Mau menghapus Slider "+ name +" ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes !',
  cancelButtonText: 'No !',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.location = "/slider/delete/"+id;
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
      'Menghapus Slider ' + name ,
      'error'
    )
  }
})
        });
        })
</script>
@endpush
