<!DOCTYPE html>

<html lang="en">



<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Cafeteria-@yield('title') </title>
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="all,follow">



    <link rel="stylesheet" href="{{ asset('assets/website/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.css') }}">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/website/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Lightbox-->

    <link rel="stylesheet" href="{{ asset('assets/website/vendor/lightbox2/css/lightbox.min.css') }}">

    <!-- Range slider-->

    <link rel="stylesheet" href="{{ asset('assets/website/vendor/nouislider/nouislider.min.css') }}">

    <!-- Bootstrap select-->

    <link rel="stylesheet" href="{{ asset('assets/website/vendor/bootstrap-select/css/bootstrap-select.min.css') }}">

    <!-- Owl Carousel-->

    <link rel="stylesheet" href="{{ asset('assets/website/vendor/owl.carousel2/assets/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/website/vendor/owl.carousel2/assets/owl.theme.default.css') }}">

    <!-- Google fonts-->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->

    <link rel="stylesheet" href="{{ asset('assets/website/css/style.default.css') }}" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes-->

    <link rel="stylesheet" href="{{ asset('assets/website/css/custom.css') }}">

    <!-- Favicon-->

    <link rel="shortcut icon" href="{{ asset('assets/website/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/jquery.dataTables.min.css') }}">

    @livewireStyles

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .badge-counter {
            border-radius: 50%;
            position: absolute;
            width: 20px;
            height: 20px;
            top: -5px;
            left: 2px;
        }
    </style>
    @yield('style')
</head>

<body>

    <div class="page-holder">
