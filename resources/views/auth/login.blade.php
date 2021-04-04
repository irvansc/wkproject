<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- General CSS Files -->
    <link rel="stylesheet" rel="stylesheet" href="{{ url('') }}/assets/modules/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('')}}assets/modules/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('')}}assets/css/style.css">
    <link rel="stylesheet" href="{{asset('')}}assets/css/components.css">
</head>
<style>
    .cov {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 1;
    }
</style>

<body style="background-image: url('{{asset('')}}sekolah/pic1.jpg');" class="cov">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div @php $img=DB::table('image_web')->where('id','=',1)->first();
                        @endphp
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4
                        offset-xl-4">
                        <div class="login-brand">
                            <img src="{{asset('images/foto/web/'.$img->favicon)}}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            @if (session()->has('flash_notification.success')) <div class="alert alert-success">{!!
                                session('flash_notification.success') !!}</div>
                            @endif
                            <div class="card-body">
                                <form method="POST" id="loginForm" action="{{ url('/login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            tabindex="1" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control form-password @error('password') is-invalid @enderror"
                                            name="password" tabindex="2">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input form-checkbox "
                                                id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Show
                                                Password</label>
                                        </div>
                                    </div>
                                    <!-- google recaptcha -->
                                    <div class="form-group mt-4 mb-4">
                                        <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                ↻
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input id="captcha" type="text"
                                            class="form-control @error('captcha') is-invalid @enderror"
                                            placeholder="Enter Captcha" name="captcha">
                                        @error('captcha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-submit"
                                            tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ url('') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ url('') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{asset('')}}assets/modules/toastr/build/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('.form-checkbox').click(function () {
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type', 'text');
                } else {
                    $('.form-password').attr('type', 'password');
                }
            });
        });
        $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });



    });
    </script>

</body>

</html>
