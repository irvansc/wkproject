@extends('admin.backend.layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="section-header">
    <h1>Guru</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Guru</h6>
                    <div class="ml-auto">
                        <a href="{{route('aguru.create')}}" class="btn btn-primary "> <i class="fas fa-plus-circle"></i>
                            Tambah
                            Guru</a>
                        <button type="button" class="btn btn-info btn-xs mb-1" data-toggle="modal" data-target="#guru">
                            <i class="bi bi-arrow-bar-up"></i> Import Guru
                        </button>
                        <button class="btn btn-danger btn-xs delete-all " data-url="">Delete
                            All</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <div class="row">
                            <h6 class="font-weight-bold text-primary">Filter Data</h6>
                            <div class="col-md-4 mb-3">
                                <select id="filter-kelas" class="form-control filter">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $row)
                                    <option value="{{$row->id}}">{{$row->nama_kelas}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data">
                            <thead class="thead-light">
                                <tr>
                                    <th><input type="checkbox" id="check_all"></th>
                                    <th width="3%">No</th>
                                    <th>Nip</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Mapel</th>
                                    <th>kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <style>
                @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");

                #accordion .panel-title>a:before {
                    float: right !important;
                    font-family: FontAwesome;
                    content: "\f068";
                    padding-right: 5px;
                }

                #accordion .panel-title>a.collapsed:before {
                    float: right !important;
                    content: "\f067";
                }

                #accordion .panel-title>a:hover,
                #accordion .panel-title>a:active,
                #accordion .panel-title>a:focus {
                    text-decoration: none;
                }
            </style>
            <div id="accordion">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <i class="bi bi-megaphone-fill"></i> Information
                                        </a>
                                    </h5>

                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        Sebelum melakukan Import Data Guru, terlebih dahulu harus mendownload File
                                        dibawah ini,
                                        dan lihat video dokumentasi untuk penjelasannya. <br>
                                        <a href="{{asset('images/file/dataguru.xlsx')}}" download
                                            class="btn btn-primary btn-sm"><i class="bi bi-download"></i>
                                            Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<!-- Modal -->
<div class="modal fade" id="guru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'guru.import', 'class' => 'form-horizontal','enctype'=>
                'multipart/form-data']) !!}
                {!! Form::file('data_guru') !!}
                <br>
                <small><strong class="text-danger">Upload file dengan extension | xlsx</strong></small>
                <br>

                <div class="progress">
                    <div class="bar">
                        <div class="percent">
                            0%
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input class="btn btn-success" type="submit" value="Kirim">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function(){

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
            window.location = "/aguru";
        }
      });
    let kelas = $("#filter-kelas").val();
    // let semester = $("#filter-semester").val();
    const table = $('#data').DataTable({
    "pageLength": 5,
    "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 100]],
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    "processing":true,
    "bServerSide": true,
    "ajax":{
      url: "{{url('')}}/aguru/data",
      type: "POST",
      data:function(d){
        d.kelas = kelas;
        // d.semester = semester;
        return d
      }
      },
      columnDefs: [
    {targets: '_all', visible:true},
    {
        "targets": 0,
        "sortable":false,
        "render": function(data, type, row, meta){
            let tampilan = `
            <input type="checkbox" class="checkbox" data-id="${row.id}">
       `;
          return tampilan;
        }
      },
    {
        "targets": 1,
        "sortable":false,
        "render": function(data, type, row, meta){
            return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      {
        "targets": 2,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.nip
        }
      },
      {
        "targets": 3,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.nama_guru
        }
      },
      {
        "targets": 4,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.jenkel
        }
      },
      {
        "targets": 5,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.mapel
        }
      },
      {
        "targets": 6,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.kelas
        }
      },
      {
        "targets": 7,
        "sortable":false,
        "render": function(data, type, row, meta){
            let tampilan = `
        <a href="{{url('')}}/aguru/${row.id}/edit"  class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
        <button class="btn btn-danger btn-sm delete" onclick="delete" name="${row.nama_guru}" id="${row.id}">
            <i class="fas fa-trash"></i></button>`;

          return tampilan;
        }
      },
      ]
    });

    $(".filter").on('change',function(){
    kelas = $("#filter-kelas").val()
    table.ajax.reload(null,false)
  })
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
        text: "Mau menghapus Guru "+ name +" ??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes !',
        cancelButtonText: 'No !',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/aguru/delete/"+id;
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
            'Menghapus Guru ' + name ,
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
                alert("Pilih setidaknya satu data untuk dihapus.");
            } else {
                if (confirm("Anda yakin ingin menghapus Guru yang dipilih?")) {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('guru.multiple-delete') }}",
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
                                    title: 'Guru deleted successfully!'
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
{{-- // https://forms.gle/fSXE8RPnq1qWjTYWA --}}
