@extends('frontend.layouts.master')
@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/ekstra.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkekstra.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="esktra">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 " id="posts">
                @foreach ($ekstra as $e)
                <div class="card mb-2 ek">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{$e->getEkstra()}}" alt="...">
                        </div>
                        <div class="col">
                            <h5>{{$e->nama}}</h5>
                            <p class="text">{!!$e->keterangan!!}</p>
                            <p class="mut"><small class="badge badge-dark">{{$e->status}}</small></p>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($ekstra->hasMorePages() == 1)
                <div class="text-center mb-1">
                    <button id="load" class="btn btn-utama" data-url="{{ $ekstra->nextPageUrl() }}">Load
                        More</button>
                </div>
                @endif
            </div>

            <div class="col-md-4 sid" id="sid">
                <div class="card mb-2">
                    <div class="card-header">
                        Recent Post
                    </div>
                    <div class="card-body">
                        @if ($postsWeek->isNotEmpty())
                        @foreach ($postsWeek as $post)
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1" style="font-size: 15px"><a
                                    href="{{route('blog.show',$post->alias)}}">{{$post->title}}</a></h6>
                            {{-- <time datetime="2020-01-01">Jan
                                1, 2020</time> --}}
                        </div>
                        <hr>
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
@push('jsf')
<script>
    $(document).ready(function(){
        $(document).on('click', '#load', function(){
            $("<div>").load($(this).data("url") + "#posts", function() {
            $("#posts").append($(this).find("#posts").html());
        });
        $(this).parent().remove();
        });
    });
</script>

@endpush
