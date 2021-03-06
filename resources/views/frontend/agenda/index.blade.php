@extends('frontend.layouts.master')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
</section><!-- End Breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-img">
                <img src="{{asset('theme/img/agenda.png')}}" class="card-img" alt="...">
            </div>
        </div>
    </div>
</div>
<section class="services-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($agendas as $a)

                <div class="so-item">
                    <div class="so-title">
                        <div class="so-number"><i class="ri-calendar-check-line"></i></div>
                        <h5>{{$a->name}}</h5>
                        <h6>Tanggal : {{date("d M Y", strtotime($a->tanggal))}} -
                            {{date("d M Y", strtotime($a->selesai))}}
                        </h6>
                        <h6>Pukul : {{$a->waktu}}</h6>
                        @if ($a->keterangan != null)
                        <h6>Ket : {{$a->keterangan}}</h6>

                        @else

                        @endif
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        magna aliqua. Quis ipsum suspendisse ultrices gravida.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    <h6>- Irvan Maulana.Sp.d</h6>
                </div>
                @endforeach
                <nav>
                    {{ $agendas->links() }}
                </nav>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #4154f1;">
                            <h4>Recent Posts</h4>
                        </div>
                        <div class="card-body">
                            @if ($postsWeek->isNotEmpty())
                            @foreach ($postsWeek as $post)
                            <div class="so-item">
                                <div class="so-title">
                                    <div class="so-number">P</div>
                                    <h5><a href="{{route('blog.show',$post->alias)}}"></a> {{$post->title}}</h5>
                                </div>
                                <p>
                                    {!! Str::limit($post->content, 300, '...') !!}
                                </p>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
