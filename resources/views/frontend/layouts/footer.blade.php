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
                            <i class="bi bi-chevron-right"></i> <a href="/">Home</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="{{route('about.index')}}">About</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="{{route('contact.index')}}">Contact</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{route('visi.index')}}">Visi-Misi</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{route('sejarah.index')}}">Sejarah</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{route('galery.index')}}">Galery</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{route('blog.index')}}">Blog</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Akademik</h4>
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="{{route('guru.index')}}">Guru</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{route('siswa.index')}}">Siswa</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{route('pengumuman.index')}}">Pengumuman</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i> <a href="{{route('agenda.index')}}">Agenda</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{route('download.index')}}">Download</a>
                        </li>
                        @php
                        $p = DB::table('ppdb')->first();
                        @endphp
                        @if ($p->aktif == 1)
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a onclick="openInNewTab('{{$p->body}}')">PPDB <span
                                    class="badge badge-success">DIBUKA!</span>
                            </a>
                        </li>
                        @else

                        @endif
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
