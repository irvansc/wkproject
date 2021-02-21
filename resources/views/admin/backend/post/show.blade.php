@extends('admin.backend.layouts.master')

@section('content')
<div class="section-header">
    <h1>Artikel Detail</h1>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="font-weight-bold ">Artikel</h6>
                    </div>
                </div>
                <div class="card-body">
                    <article class="article article-style-c">

                        <div class="article-header">
                            <div class="article-image" data-background="{{asset('artikel/'.$post->img)}}"
                                style="background-image: url({{asset('artikel/'.$post->img)}});">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-category"><a href="#"> @if ($post->categories->isNotEmpty())
                                    @foreach ($post->categories as $key => $category)
                                    <span class="badge badge-primary ">
                                        {{ $category->name }}
                                    </span>
                                    @endforeach
                                    @endif</a>
                                <div class="bullet"></div> <a href="#">{{$post->created_at}}</a>
                            </div>
                            <div class="article-title">
                                <h2><a href="#">{{$post->title}}</a></h2>
                            </div>
                            <p>{!!$post->content!!}</p>
                            <div class="article-user">
                                <img alt="image" src="{{$post->user->getPhoto()}}">
                                <div class="article-user-details">
                                    <div class="user-detail-name">
                                        <a href="#">{{$post->user->name}}</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
