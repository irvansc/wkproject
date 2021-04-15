@extends('frontend.layouts.master')

@section('content')
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/file.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkfile.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact" id="download">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-striped" id="data">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>File</th>
                                <th>Keterangan</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($download as $e=> $d)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$d->title}}</td>
                                <td>{{$d->keterangan}}</td>
                                <td>{{$d->author}}</td>
                                <td>
                                    <a href="{{asset('images/file/'.$d->data)}}" title="Download"
                                        class="btn btn-utama"><i class="bi bi-download"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 download">
                <div class="card ">
                    <div class="card-header">
                        Recent Post
                    </div>
                    <div class="card-body">
                        @if ($postsWeek->isNotEmpty())
                        @foreach ($postsWeek as $post)
                        <div class="media">
                            <img src="{{$post->getImage()}}" class="mr-3" alt="...">
                            <div class="media-body recent">
                                <h5 class="mt-0"><a href="">{{$post->title}}</a></h5>
                                <h6>{!!Str::limit($post->content , 50 , '..')!!}</h6>
                            </div>
                        </div>
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

        $('#data').DataTable({
            "pageLength": 5,
            "lengthMenu": [[ 5,10, 25, 50, 100], [5,10, 25, 50, 'semua']],
            "bLengthChange": true,
        });
});
</script>
@endpush
