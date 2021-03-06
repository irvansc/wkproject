<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-person-bounding-box"></i>
                    <div>
                        @php
                        $g = DB::table('guru')->count();
                        @endphp
                        <span data-purecounter-start="0" data-purecounter-end="{{$g}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Guru</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-people"></i>
                    <div>
                        @php
                        $g = DB::table('siswa')->count();
                        @endphp
                        <span data-purecounter-start="0" data-purecounter-end="{{$g}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Siswa</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-megaphone"></i>
                    <div>
                        @php
                        $g = DB::table('pengumuman')->count();
                        @endphp
                        <span data-purecounter-start="0" data-purecounter-end="{{$g}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Pengumuan</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-calendar-check"></i>
                    <div>
                        @php
                        $g = DB::table('agenda')->count();
                        @endphp
                        <span data-purecounter-start="0" data-purecounter-end="{{$g}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Agenda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Counts Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <p>Testimonials</p>
        </header>
        @php
        $testi = DB::table('testimoni')->orderBy('tanggal','DESC')->get();
        @endphp
        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
                @foreach ($testi as $t)
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                            {!!$t->pesan!!}.
                        </p>
                        <div class="profile mt-auto">
                            <img src="{{asset('images/foto/testi/'.$t->foto)}}" class="testimonial-img" alt="" />
                            <h3>{{$t->nama}}</h3>
                            <h4>{{$t->ket}}</h4>
                        </div>
                    </div>
                </div>
                <!-- End testimonial item -->
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- End Testimonials Section -->
