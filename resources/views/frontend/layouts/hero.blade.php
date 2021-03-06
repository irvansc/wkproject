<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
            $slider = DB::table('slider')->get();
            @endphp
            @foreach ($slider as $key=>$s)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                <img src="{{asset('images/foto/web/'.$s->img)}}" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-md-block">
                    <div class="slider_title">
                        <h1>{{$s->title}}</h1>
                        <h4>
                            {!!$s->deskripsi!!}
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- End Hero -->
