@extends('frontend.layouts.master')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/file.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-striped" id="data">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Files</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Oleh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($download as $e=> $d)

                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$d->title}}</td>
                                <td>{{$d->keterangan}}</td>
                                <td>{{date('d M Y', strtotime($d->created_at))}}</td>
                                <td>{{$d->author}}</td>
                                <td>
                                    <a class="btn btn-primary button btn-sm" title="Download"
                                        href="{{asset('images/file/'.$d->data)}}"><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('jsf')
<script>
    $(document).ready(function(){

        $('#data').DataTable({
            "pageLength": 5,
            "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 'semua']],
            "bLengthChange": true,
        });
});
</script>
@endpush
