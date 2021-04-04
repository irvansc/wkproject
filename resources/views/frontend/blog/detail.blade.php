@extends('frontend.layouts.master')
@section('content')
<!-- navigatin End -->
<section id="abc">
    <div class="container" id="ab">
        <div class="row">
            <div class="col-md-12">
                <div class="abou" id="abou">
                    <img src="{{asset('')}}theme/img/blog.png" alt="" class="light">
                    <img src="{{asset('')}}theme/img/darkblog.png" alt="" class="dark">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="blog" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8 hov">
                <div class="card mb-2 post">
                    <img src="{{$post->getImage()}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="">{{$post->title}}</a></h5>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{$post->user->name}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time
                                            datetime="2020-01-01">{{$post->created_at}}</time></a>
                                </li>
                                <li class="d-flex
                                            align-items-center"><i class="bi
                                                bi-chat-dots"></i>
                                    <a href="blog-single.html">12
                                        Comments</a>
                                </li>
                                <li class="d-flex
                                            align-items-center"><i class="bi
                                                bi-eye"></i>
                                    <a href="blog-single.html">{{$post->views}} Views</a>
                                </li>
                            </ul>
                        </div>
                        <p class="card-text">
                            {!!$post->content!!}
                        </p>
                        <div class="entry-footer">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                @if ($post->categories->isNotEmpty())
                                @foreach ($post->categories as $key=>$kate)
                                <li><a href="#">{{$kate->name}}|</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="shareon">
                            <a class="facebook"></a>
                            <a class="messenger"></a>
                            <a class="pinterest"></a>
                            <a class="whatsapp"></a>
                            <a class="twitter"></a>
                        </div>
                        <button class="btn btn-utama float-right" id="btn-komentar-utama"><i
                                class="bi bi-pencil-square"></i>
                            Tinggalkan Komentar</button>
                    </div>


                </div>
                <div class="blog-comments">
                    @if ($message = Session::get('pesan'))
                    <div class="alert alert-info alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="reply-form" style="margin-top: 10px; display:none" id="komentar-utama">
                        <form action="{{ route('addComment', $post->id) }}" method="POST" id="komentar">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input name="name" type="text" class="form-control" name="name"
                                        placeholder=" Your Name*">
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" type="text" class="form-control " placeholder="Your Email*">
                                    <span class="text-danger error-text email_error"></span>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="body" class="form-control " placeholder="Your Comment*"></textarea>
                                    <span class="text-danger error-text body_error"></span>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Post
                                Comment</button>
                            <strong><small> *Berkomentarlah yang baik dan
                                    santun</small></strong>
                        </form>
                    </div>
                    <h4 class="comments-count mt-3">Komentar</h4>
                    @foreach ($post->comments()->where('status', '=', 'y')->orderBy('created_at','desc')->get()
                    as $com)

                    <div id="comment-2" class="comment">
                        <div class="d-flex">
                            <div class="comment-img"><img src="{{asset('')}}theme/img/default.png" alt=""></div>
                            <div class="komen">
                                <h5><a href="">{{$com->name}}</a> </h5>
                                <time datetime="2020-01-01">{{$com->created_at}}</time>
                                <p>
                                    {!!$com->body!!}
                                </p>
                            </div>
                        </div>
                        @forelse ($com->comment()->orderBy('created_at','desc')->get() as $reply)
                        <div id="comment-reply-1" class="comment comment-reply">
                            <div class="d-flex">
                                <div class="comment-img"><img src="{{asset('')}}theme/img/admin.png" alt="">
                                </div>
                                <div>
                                    <h5>{{$reply->name}} | <strong class="text-primary">Admin</strong>
                                    </h5>
                                    <time datetime="2020-01-01">{{$reply->created_at}}</time>
                                    <p>
                                        {!!$reply->body!!}
                                    </p>
                                </div>
                            </div>
                        </div><!-- End comment reply #1-->
                        @empty

                        @endforelse
                    </div><!-- End comment #2-->
                    @endforeach
                </div><!-- End blog comments -->
            </div>
            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-header">
                        Search
                    </div>
                    <div class="card-body">
                        <div class="sidebar-item search-form">
                            <form action="{{route('blog.index')}}" method="GET">
                                <input type="text" name="search" placeholder="Cari apa ?">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Categories
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($kategori as $kate)
                            <a href="{{url('kategori',$kate->alias)}}" class="btn
                                        btn-outline-primary ml-1 mb-1">
                                {{$kate->name}} <span class="badge
                                            badge-light">{{$kate->post->count()}}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Recent Post
                    </div>
                    <div class="card-body">
                        @if ($postsWeek->isNotEmpty())
                        @foreach ($postsWeek as $post)
                        <style>
                            .media img {
                                max-width: 70px;
                            }
                        </style>
                        <div class="media">

                            <img src="{{$post->getImage()}}" class="mr-3" alt="...">
                            <div class="media-body recent">
                                <h5 class="mt-0"><a href="{{route('blog.show',$post->alias)}}">{{$post->title}}</a>
                                </h5>
                                <h6>{!!Str::limit($post->content, 50, '...')!!}</h6>
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
<!-- End Blog -->
@endsection
@push('jsf')
<script>
    $(document).ready(function(){

        $("#komentar").on('submit', function(e){
                  e.preventDefault();

                  $.ajax({
                      url:$(this).attr('action'),
                      method:$(this).attr('method'),
                      data:new FormData(this),
                      processData:false,
                      dataType:'json',
                      contentType:false,
                      beforeSend:function(){
                          $(document).find('span.error-text').text('');
                      },
                      success:function(data){
                          if(data.status == 0){
                              $.each(data.error, function(prefix, val){
                                  $('span.'+prefix+'_error').text(val[0]);
                              });
                          }else{
                              $('#komentar')[0].reset();
                              const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'bottom-right',
                                    showConfirmButton: true,
                                    // timer: 3000,
                                    // timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Komentar terkirim, Menunggu Moderasi'
                                })

                          }
                      }
                  });
              });
        $("#btn-komentar-utama").click(function(){
            $('#komentar-utama').toggle('slide');
        });

    });
</script>
@endpush
