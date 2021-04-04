<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WK-School</title>
    @php
    $met = DB::table('meta')->first();
    @endphp
    <meta content="{{$met->description}}" name="description" />
    <meta content="{{$met->keywords}}" name="keywords" />
    <!-- Favicons -->
    @php
    $img = DB::table('image_web')->where('id','=',1)->first();
    @endphp
    <link href="{{asset('images/foto/web/'.$img->favicon)}}" rel="icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/owl-carousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/owl-carousel/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('')}}theme/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('')}}theme/css/style.css" id="style1">
    <link href="{{asset('')}}theme/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- <link id="dark-theme-style" rel="stylesheet" /> -->
    <link rel="stylesheet" href="{{asset('')}}theme/css/component-custom-switch.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}theme/css/utils.css">
    @stack('head')
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/icofont/icofont.min.css">
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/share/shareon.min.css">
    <link rel="stylesheet" href="{{asset('')}}assets/modules/sweetalert2/dist/sweetalert2.min.css">
    <link href="{{asset('')}}assets/modules/toastr/build/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" rel="stylesheet" href="{{ asset('') }}assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/fancy/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/slick/slick.css">
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/slick/slick-theme.css">

<body>
