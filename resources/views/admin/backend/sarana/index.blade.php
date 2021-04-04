@extends('admin.backend.layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="section-header">
    <h1>Download</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Sarana</h6>
                    <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#file"><i
                            class="fas fa-plus-circle"></i> Tambah Sarana</button>
                    <button class="btn btn-danger btn-xs delete-all" data-url="">Delete
                        All</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="data">
                            <thead class="thead-light">
                                <tr>
                                    <th><input type="checkbox" id="check_all"></th>
                                    <th width="20px">No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sarana as $e=>$a)
                                <tr id="tr_{{$a->id}}">
                                    <td><input type="checkbox" class="checkbox" data-id="{{$a->id}}"></td>
                                    <td>{{$e+1}}</td>
                                    <td>
                                        <img src="{{asset('images/foto/sarana/'.$a->img)}}" alt=""
                                            style="max-width: 100px">
                                    </td>
                                    <td>{{$a->title}}</td>
                                    <td>{{$a->ket}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#edit{{$a->id}}"><i class="fas fa-pencil-alt"></i></button>
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
<div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create Sarana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sarana.store')}}" method="POST" enctype="multipart/form-data" id="main_form">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                        <span class="text-danger error-text title_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan <small class="text-red">*Opsional</small></label>
                        <textarea name="ket" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="img" class="form-control">
                        <span class="text-danger error-text img_error"></span>
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
@foreach ($sarana as $s)
<div class="modal fade" id="edit{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create Sarana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sarana.update',$s->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$s->title}}">
                        <span class="text-danger error-text title_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan <small class="text-red">*Opsional</small></label>
                        <textarea name="ket" class="form-control" cols="30" rows="10">{{$s->ket}}</textarea>
                    </div>
                    <div class="form-group">
                        <img src="{{asset('images/foto/sarana/'.$s->img)}}" alt="" style="max-width: 100px">
                    </div>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="img" class="form-control">
                        <span class="text-danger error-text img_error"></span>
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
    $(document).ready(function () {
        $('#data').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 25, 50, 100],
                [5, 10, 25, 50, 'semua']
            ],
            "bLengthChange": true,
        });
        $("#main_form").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(document).find('span.error-text').text('');
                },
                success: function (data) {
                    if (data.status == 0) {
                        $.each(data.error, function (prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#main_form')[0].reset();
                        window.setTimeout(function () {
                            location.reload()
                        }, 1000)
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-center',
                            showConfirmButton: false,
                            timer: false,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: 'Sarana Has been Createad'
                        })
                    }
                }
            });
        });

        $('body').on('click', '.delete', function () {
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
                text: "Mau menghapus " + name + " ??",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes !',
                cancelButtonText: 'No !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/sarana/delete/" + id;
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
                        'Menghapus sarana ' + name,
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
                if (confirm("Are you sure, you want to delete the selected categories?")) {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('category.multiple-delete') }}",
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
