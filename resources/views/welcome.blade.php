<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ComingSoon - W-School</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @php
    $img = DB::table('image_web')->where('id','=',1)->first();
    @endphp
    <!-- Favicons -->
    <link href="{{asset('images/foto/web/'.$img->favicon)}}" rel="icon">
    <link href="{{asset('')}}theme/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('')}}theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('')}}theme/vendor/icofont/icofont.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('')}}theme/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: ComingSoon - v2.2.1
  * Template URL: https://bootstrapmade.com/comingsoon-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center">

            <h1>ComingSoon</h1>
            <h2>FrontEnd Website Sedang Dalam Pengembangan</h2>
            <div class="countdown d-flex justify-content-center" data-count="2021/03/25">
                <div>
                    <h3>%D</h3>
                    <h4>Days</h4>
                </div>
                <div>
                    <h3>%H</h3>
                    <h4>Hours</h4>
                </div>
                <div>
                    <h3>%M</h3>
                    <h4>Minutes</h4>
                </div>
                <div>
                    <h3>%S</h3>
                    <h4>Seconds</h4>
                </div>
            </div>

            <div class="subscribe">
                <h4>Login Here!</h4>
                <a href="/login" class="btn btn-primary">Login</a>
            </div>

            <div class="social-links text-center">
                <a href="https://www.twitter.com/irvansc" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="https://www.facebook.com/irvhan.cievhan"><i class="icofont-facebook"></i></a>
                <a href="#" class="https://www.instagram.com/irvansc"><i class="icofont-instagram"></i></a>
                <a href="https://www.yputube.com/c/BangDevanz" class="linkedin"><i class="icofont-linkedin"></i></a>
            </div>

        </div>
    </header><!-- End #header -->

    <main id="main">

        {{-- <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row content">
                    <div class="col-lg-6">
                        <h2>Eum ipsam laborum deleniti velitena</h2>
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee
                            trave</h3>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                        <ul>
                            <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa
                            </li>
                            <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit
                            </li>
                            <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in</li>
                        </ul>
                        <p class="font-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section --> --}}

        {{-- <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="icofont-google-map"></i>
                                    <h4>Location:</h4>
                                    <p>A108 Adam Street<br>New York, NY 535022</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>info@example.com<br>contact@example.com</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-phone"></i>
                                    <h4>Call:</h4>
                                    <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row  justify-content-center">
                    <div class="col-lg-10">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" data-rule="minlen:4"
                                        data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" data-rule="email"
                                        data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" data-rule="minlen:4"
                                    data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Us Section --> --}}

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>W-SCHOOL</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/comingsoon-free-html-bootstrap-template/ -->
                by <a href="">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End #footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('')}}theme/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('')}}theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('')}}theme/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="{{asset('')}}theme/vendor/php-email-form/validate.js"></script>
    <script src="{{asset('')}}theme/vendor/jquery-countdown/jquery.countdown.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('')}}theme/js/main.js"></script>

</body>

</html>
