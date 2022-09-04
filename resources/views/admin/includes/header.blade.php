<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Dashbord-@yield('title')</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.ico')}}" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->

   
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/app.css')}}" />
@livewireStyles
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@yield('style')

</head>
<body>

