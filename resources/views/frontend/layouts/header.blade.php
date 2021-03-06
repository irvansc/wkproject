<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>W-School</title>
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
    <link href="{{asset('images/foto/web/'.$img->favicon)}}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="{{asset('')}}theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('')}}theme/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{asset('')}}theme/vendor/aos/aos.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('')}}theme/vendor/fontawesome/css/all.css" type="text/css">
    <link href="{{asset('')}}theme/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="{{asset('')}}theme/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="{{asset('')}}theme/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="{{asset('')}}theme/vendor/icofont/icofont.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('')}}theme/css/jssocials.css" rel="stylesheet">
    <link href="{{asset('')}}theme/css/jssocials-theme-flat.css" rel="stylesheet">
    <link href="{{asset('')}}theme/css/style.css" rel="stylesheet" />
    <link href="{{asset('')}}theme/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}theme/vendor/sweetalert2/dist/sweetalert2.min.css">
    <link href="{{asset('')}}theme/vendor/toastr/build/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" rel="stylesheet" href="{{ asset('') }}assets/modules/datatables/datatables.min.css">

</head>
