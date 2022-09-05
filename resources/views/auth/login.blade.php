@extends('layouts.app')


@section('style')
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
@endsection

@section('content')
    <section class="height-100vh d-flex align-items-center page-section-ptb login"
        style="background-image: url({{ asset('assets/admin/images/login-bg.jpg') }});">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose responsive
                            template along with powerful features.</p>
                        <ul class="list-unstyled  pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30">Sign In </h3>
                        <div class="section-field mb-20">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label class="mb-10" for="name"for="email">Email* </label>
                                <input id="name" class="web form-control @error('email') is-invalid @enderror"
                                    type="email" name="email" required autofocus autocomplete="email">


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>


                        <div class="section-field mb-20">
                            <label class="mb-10" for="Password">Password* </label>
                            <input id="Password" class="Password form-control @error('password') is-invalid @enderror"
                                type="password" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="section-field">
                            <div class="remember-checkbox mb-30">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember"> Remember me</label>
                                <a href="{{ route('password.request') }}" class="float-right">Forgot Password?</a>
                            </div>
                        </div>

                        <button type="submit" class="button">
                            <span>Log in</span>
                            <i class="fa fa-check"></i>
                        </button>

                        <p class="mt-20 mb-0">Don't have an account? <a href="{{ route('register') }}"> Create one here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
