<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            @php
            $img = DB::table('image_fron')->where('id','=',1)->first();
            @endphp
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex
                            align-items-center">
                        <img data-src="{{asset('images/foto/web/'.$img->img)}}" alt="" />
                    </a>
                    @php
                    $pro = DB::table('foot')->first();
                    @endphp
                    <p>
                        {{$pro->alamat}} <br />
                        <strong>Phone:</strong> {{$pro->phone}}<br />
                        <strong>Email:</strong> {{$pro->email}}<br />
                    </p>
                    @php
                    $s = DB::table('sosmed')->first();
                    @endphp
                    <div class="social-links mt-3">
                        <a href="{{$s->twitter}}" class="twitter"><i class="bi
                                    bi-twitter"></i></a>
                        <a href="{{$s->fb}}" class="facebook"><i class="bi
                                    bi-facebook"></i></a>
                        <a href="{{$s->ig}}" class="instagram"><i class="bi
                                    bi-instagram bx
                                    bxl-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Main Links</h4>
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">Home</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">About</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">Contact</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Visi-Misi</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Sejarah</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Galery</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Blog</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Akademik</h4>
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">Guru</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Siswa</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Pengumuman</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="#">Agenda</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Download</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center
                        text-md-start">
                    @php
                    $po = DB::table('foot')->first();
                    @endphp
                    <h4>Maps</h4>
                    <iframe src="{{$po->maps}}" width="250" height="150" style="border:0;" allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>WS-School</span></strong>.
            All Rights
            Reserved
        </div>
    </div>
</footer>
