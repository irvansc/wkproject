@extends('admin.backend.layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="section-header">
    <h1>Artikel</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Artikel</h6>
                    <button class="btn btn-danger btn-xs delete-all ml-auto" data-url="">Delete
                        All</button>
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
                        <table class="table table-bordered" id="postData">
                            <thead class="">
                                <tr>
                                    <th><input type="checkbox" id="check_all"></th>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>kategori</th>
                                    <th>Dipublikasikan pada</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $e=>$post)
                                <tr id="tr_{{$post->id}}">
                                    <td><input type="checkbox" class="checkbox" data-id="{{$post->id}}"></td>
                                    <td>{{$e+1}}</td>
                                    <td>
                                        <a href="{{route('post.show',$post->id)}}">{!!str_limit($post->title,50)!!}</a>
                                    </td>
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
                                        <a href="{{route('post.show',$post->id)}}" class="btn btn-info btn-sm"><i
                                                class="fas fa-eye"></i></a>
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
@push('js')
<script>
    $(document).ready(function(){
        $('#postData').DataTable({
            "pageLength": 5,
    "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 'semua']],
    "bLengthChange": true,
        });

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

        $('#check_all').on('click', function (e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });
        $('.checkbox').on('click', function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#check_all').prop('checked', true);
            } else {
                $('#check_all').prop('checked', false);
            }
        });
        $('.delete-all').on('click', function (e) {
            var idsArr = [];
            $(".checkbox:checked").each(function () {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0)
            {
                alert("Please select atleast one record to delete.");
            } else {
                if (confirm("Are you sure, you want to delete the selected post?")) {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('post.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + strIds,
                        success: function (data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function () {

                                    $(this).parents("tr").remove();
                                });
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Sarana deleted successfully!'
                                })
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }
            }
        });

        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });
})
</script>
@endpush
