@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Siswa</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary">List Siswa</h6>
                    <a href="{{route('asiswa.create')}}" class="btn btn-primary ml-auto"> <i
                            class="fas fa-plus-circle"></i> Tambah
                        Siswa</a>
                </div>
                <div class="card-body">
                    <div class="col-md-8">
                        <div class="row">
                            <h6 class="font-weight-bold text-primary">Filter Data</h6>
                            <div class="col-md-4 mb-3">
                                <select id="filter-prodi" class="form-control filter">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $row)
                                    <option value="{{$row->id}}">{{$row->nama_kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-4 mt-1">
                                <select id="filter-semester" class="form-control filter">
                                    <option value="">Pilih Semester</option>
                                    @foreach ($semester as $smt)
                                    <option value="{{$smt->id}}">{{$smt->nama}}</option>
                            @endforeach
                            </select>
                        </div> --}}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="data">
                        <thead class="thead-light">
                            <tr>
                                <th width="3%">No</th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($siswass as $e=>$k)
                                <tr>
                                    <td>{{$e+1}}</td>
                            <td>{{$k->nis}}</td>
                            <td>{{$k->nama}}</td>
                            <td>{{$k->jenkel}}</td>
                            <td>{{$k->kelas->nama_kelas}}</td>
                            <td>
                                <a href="{{route('asiswa.edit',$k->id)}}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-user-edit"></i></a>
                                <button class="btn btn-danger btn-sm delete" name="{{$k->nama}}" id="{{$k->id}}"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                            </tr>
                            @endforeach --}}
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
      url: "{{url('')}}/asiswa/data",
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
            return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      {
        "targets": 1,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.nis
        }
      },
      {
        "targets": 2,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.nama
        }
      },
      {
        "targets": 3,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.jenkel
        }
      },
      {
        "targets": 4,
        "class":"text-nowrap",
        "render": function(data, type, row, meta){
          return row.kelas
        }
      },
      {
        "targets": 5,
        "sortable":false,
        "render": function(data, type, row, meta){
            let tampilan = `
        <a href="{{url('')}}/asiswa/${row.id}/edit"  class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
        <button class="btn btn-danger btn-sm delete" onclick="delete" name="${row.nama}" id="${row.id}">
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
        text: "Mau menghapus Siswa "+ name +" ??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes !',
        cancelButtonText: 'No !',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/asiswa/delete/"+id;
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
            'Menghapus Siswa ' + name ,
            'error'
            )
        }
        })
        });


})
</script>
@endpush
