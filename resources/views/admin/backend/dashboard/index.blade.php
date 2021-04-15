@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pengguna</h4>
                    </div>
                    <div class="card-body">
                        {{$user}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Siswa</h4>
                    </div>
                    <div class="card-body">
                        {{$siswa}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Guru</h4>
                    </div>
                    <div class="card-body">
                        {{$guru}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Artikel</h4>
                    </div>
                    <div class="card-body">
                        {{-- {{$post}} --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Jumlah Guru Berdasarkan Jenis Kelamin</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Jumlah Siswa Berdasarkan Jenis Kelamin</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Popular Views</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive" id="data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postsWeek as $e=>$post)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$post->title}}</td>
                                <td>{!!Str::limit($post->content, 50, '...')!!}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->views}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Views</h4>
                    </div>
                    <div class="card-body">
                        {{$total}}
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
        $('#data').DataTable({
            "pageLength": 5,
    "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 'semua']],
    "bLengthChange": true,
        });
        var ctx = document.getElementById("myChart1").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                data: [{!! json_encode($jenisG->Laki) !!},{!! json_encode($jenisG->Perempuan) !!}],
                backgroundColor: [
                    '#ffa426',
                    '#6777ef',
                ]
                }],
                labels: [
                'Perempuan',
                'Laki Laki'
                ],
            },
            options: {
                responsive: true,
                legend: {
                position: 'left',
                },
            }
        });
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                data: [{!! json_encode($jenisI->Laki) !!},{!! json_encode($jenisI->Perempuan) !!}],
                backgroundColor: [
                    '#ffa426',
                    '#6777ef',
                ]
                }],
                labels: [
                'Perempuan',
                'Laki Laki'
                ],
            },
            options: {
                responsive: true,
                legend: {
                position: 'left',
                },
            }
        });
    })
</script>
@endpush
