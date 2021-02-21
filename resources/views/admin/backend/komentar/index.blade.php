@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>List Komentar</h1>
</div>
<div class="section-body">
    <div class="col-md-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class="font-weight-bold text-primary">Komentar</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tab-bordered">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Tanggapan untuk</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $e=>$c)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{str_limit($c->body,50)}}</td>
                                <td>{{$c->commentable_id}}</td>
                                <td>
                                    @if ($c->status == 'n')
                                    <span class="badge badge-warning">Menungu Persetujuan</span>
                                    @else
                                    <span class="badge badge-primary">Disetujui</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($c->status == 'n')
                                    <a title="Publish" href="{{url('comments/pub',$c->id)}}" class="btn btn-primary "><i
                                            class="ni ni-send"></i>
                                    </a>
                                    @else
                                    <button title="Balas" class="btn btn-success" data-toggle="modal"
                                        data-target="#balas{{$c->id}}"><i class=" fa fa-reply"></i>
                                    </button>
                                    @endif
                                    <button title="Detail" href="" class="btn btn-info " data-toggle="modal"
                                        data-target="#detail{{$c->id}}"><i class="fa fa-eye"></i>
                                    </button>
                                    <button title="Delete" class="btn btn-danger delete" id="{{$c->id}}"
                                        name="{{$c->name}}" title="Delete"><i class="fas fa-trash"></i>
                                    </button>
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
@section('modal')
@foreach ($comment as $cek)

<div class="modal fade" id="balas{{$cek->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('comments/balas',$cek->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Komentar Reply</label>
                        <input type="hidden" name="name" value="{{Auth::user()->name}}">
                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                        <textarea cols="30" rows="10" class="form-control" name="body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-primary float-right"><i class="ni ni-send"></i>
                        Reply</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('js')
<script>
    $(document).ready(function(){

    $('body').on('click','.delete',function(){
            var mhs_id = $(this).attr('id');
            var mhs_name = $(this).attr('name');
            swal({
                title: "Yakin?",
                text: "Mau Mengahapus "+ mhs_name +" ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/komentar/delete/"+mhs_id;
                    // swal("Data siswa dengan name "+ siswa_name +" telah berhasil dihapus!", {
                    // icon: "success",
                    // });

                } else {
                    swal("Batal Menghapus  "+ mhs_name);
                }
            });
        });
})
</script>
@endsection
