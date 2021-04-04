<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @php
        $slider = DB::table('slider')->get();
        @endphp
        @foreach ($slider as $key=>$slid)

        <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-bs-interval="10000">
            <div class="banner" style="background-image:
                            url({{asset('images/foto/web/'.$slid->img)}});">
            </div>
            <div class="carousel-caption">
                <h3 class="animated lightSpeedIn" style="animation-delay: 1s">
                    {!!$slid->title!!}
                </h3>
                <p class="animated fadeInUp" style="animation-delay: 2s">
                    {!!$slid->deskripsi!!}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
