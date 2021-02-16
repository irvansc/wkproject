<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>W-School - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('')}}assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('')}}assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{asset('')}}assets/css/custom.css" rel="stylesheet">

</head>

<body style="background-image: url({{asset('')}}assets/img/bg.jpg)" class="bg">

    <div class="container">
        <style>
            .imgg {
                width: 100px;
                height: 100px;
                margin-top: 1rem;
                filter: drop-shadow(0px 5px 3px black);
            }
        </style>
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-5" style="padding-top: 5%">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <center>
                        <img src="{{asset('')}}assets/img/sma.png" alt="" class="imgg">
                    </center>
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-password form-control-user  @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" name="password" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group float-sm-left">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input form-checkbox "
                                                    id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Show
                                                    Password</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src=" {{asset('')}}assets/vendor/jquery/jquery.min.js"> </script>
    <script src="{{asset('')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('')}}assets/vendor/jquery-easing/jquery.easing.min.js">
    </script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('')}}assets/js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.form-checkbox').click(function(){
                if($(this).is(':checked')){
                    $('.form-password').attr('type','text');
                }else{
                    $('.form-password').attr('type','password');
                }
            });
        });
    </script>
</body>

</html>
