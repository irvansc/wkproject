@extends('frontend.layouts.master')

@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/siswa.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darksiswa.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="galery">
    <style>
        .siswa {
            border-radius: 25px;
        }
    </style>
    <!-- Page Content -->
    <div class="container">
        <div class="siswa">
            @if ($siswas->isNotEmpty())
            <button type="button" class="btn btn-utama mb-2 siswa ">
                Total Siswa: <span class="badge badge-light">{{ count($siswas) }}</span>
            </button>
            @else
            <div class="alert alert-danger alert-block">
                <strong>Tidak ada data</strong>
            </div>
            @endif
        </div>
        <div class="row">

            @foreach ($siswas as $s)
            <div class="col-lg-3 col-md-4 col-6 mb-1">
                <a href="" class="h-100">
                    <div class="siswa">
                        <img src="{{$s->getSiswa()}}" alt="">
                        <div class="team-content">
                            <h3 class="title">{{$s->nama}}</h3>
                            <span class="post">{{$s->kelas->nama_kelas}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 py-3  d-flex">
                <ul class="pagination mx-auto">
                    {{ $siswas->links() }}
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
