@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Artikel</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="font-weight-bold text-primary">List Artikel</h6>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Light table -->
                    <style>
                        .img {
                            width: 50px;
                            height: 50px;
                            border-radius: 50%;
                        }
                    </style>
                    {{-- py-4 --}}
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data">
                            <thead class="">
                                <tr>
                                    <th width="20px">No</th>
                                    <th>Image</th>
                                    <th width="30%">Judul</th>
                                    <th width="30px">Penulis</th>
                                    <th>kategori</th>
                                    <th width="30px">Dipublikasikan pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $e=>$post)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td><img src="{{asset('artikel/'.$post->img)}}" alt="" class="img"></td>
                                    <td>{!!str_limit($post->title,50)!!}</td>
                                    {{-- <td>{!! str_limit ($post->content,50) !!}</td> --}}
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        @if ($post->categories->isNotEmpty())
                                        <div class="mb-2">
                                            @foreach ($post->categories as $key => $category)
                                            <span class=" badge badge-primary mr-1">
                                                {{ $category->name }}
                                            </span>
                                            @endforeach
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning btn-sm"><i
                                                class="fas fa-pencil-alt"></i></a>

                                        <button class="btn btn-danger btn-sm delete" name="{{$post->title}}"
                                            id="{{$post->id}}"><i class="fas fa-trash"></i></button>
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

@section('js')
<script>
    $(document).ready(function(){
    $('.form-checkbox').click(function(){
        if($(this).is(':checked')){
        $('.form-password').attr('type','text');
        }else{
        $('.form-password').attr('type','password');
        }
    });
    $('body').on('click','.delete',function(){
            var id = $(this).attr('id');
            var name = $(this).attr('name');
            swal({
                title: "Yakin?",
                text: "Mau Mengahapus "+ name +" ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/post/delete/"+id;
                    // swal("Data siswa dengan name "+ siswa_name +" telah berhasil dihapus!", {
                    // icon: "success",
                    // });

                } else {
                    swal("Batal Menghapus  "+ name);
                }
            });
        });
})
</script>
@endsection