@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Profile </h1>
    <a href="{{route('permissions.index')}}" class="btn btn-warning ml-auto"><i class="fas fa-hand-point-left"></i>
        Kembali</a>
</div>
<div class="section-body">
    <h2 class="section-title">Hi, {{Auth::user()->name}} !</h2>
    <p class="section-lead">
        Detail Informasi Pengguna Disini.
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{$user->getPhoto()}}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Jumlah Artikel Saya</div>
                            <div class="profile-widget-item-value">
                                @if ($user->post <= 1) {{$count}} @else No Post @endif </div> </div> </div> </div> <div
                                    class="profile-widget-description">
                                    <div class="profile-widget-name">{{$user->name}} <div
                                            class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div>
                                            @foreach ($user->roles as $r)
                                            <span class="badge badge-primary">{{$r->name}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama :</label>
                                            <div class="col-sm-9">
                                                <label for="">{{$user->name}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label">Email :</label>
                                            <div class="col-sm-9">
                                                <label for="">{{$user->email}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label">Telphone
                                                :</label>
                                            <div class="col-sm-9">
                                                <label for="">
                                                    {{$user->telp}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kelamin
                                                :</label>
                                            <div class="col-sm-9">
                                                <label for="">
                                                    @if ($user->jenkel == 'L')
                                                    Laki Laki
                                                    @else
                                                    Perempuan
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat
                                                :</label>
                                            <div class="col-sm-9">
                                                <label for="">
                                                    {{$user->alamat}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-3 col-form-label">Bergabung Sejak
                                                :</label>
                                            <div class="col-sm-9">
                                                <label for="">
                                                    {{$user->created_at}}
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                    @if (Auth::user()->id)
                                    <a href="{{route('profiles.edit',Auth::user()->id)}}" class="btn btn-info">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit data saya
                                    </a>
                                    @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h4>Artikel</h4>
                            </div>
                            <div class="card-body">
                                @if ($posts->IsNotEmpty())
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Post</th>
                                                <th>Created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                            <tr>
                                                <th><a href="{{ route('post.show', $post->title) }}"
                                                        class="text-dark">{{ $post->title }}</a></th>
                                                <td>{{ $post->created_at }}</td>
                                                <td>
                                                    <div class="my-2 d-flex">
                                                        <a href="{{ route('post.edit', $post->id) }}"
                                                            class="btn btn-sm btn-warning mr-2 border">Edit</a>
                                                        <button class="btn btn-danger btn-sm delete"
                                                            name="{{$post->title}}" id="{{$post->id}}"><i
                                                                class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $posts->links() }}
                                </div>
                                @endif

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
  text: "Mau menghapus "+ name +" ??",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes !',
  cancelButtonText: 'No !',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.location = "/post/delete/"+id;
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
