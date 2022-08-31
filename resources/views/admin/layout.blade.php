@include('admin.includes.header')
<div class="wrapper">

    <!--preloader -->
    @include('admin.includes.loader')
    <!--preloader -->


    <!--header start-->

    @include('admin.includes.nav')

    <!--header End-->

    <!--Main content -->

    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar start-->
            @include('admin.includes.sidebar')
            <!-- Left Sidebar End-->

            <!--wrapper -->
            <div class="content-wrapper">

                @yield('content')
                <!--wrapper -->

                @include('admin.includes.footer')
