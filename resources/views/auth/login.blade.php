@extends('layouts.app')
@section('content')
<style>
.form-control {
    background: #d3c5b7;
    color: #e5e5e5;
    border-radius: 5px !important;
}
label{
 color:snow;
}
#myVideo{
    position:fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}
.remember-checkbox label:before {
    background-color: #a96518;
}
</style>

    <section class="height-100vh d-flex align-items-center page-section-ptb login">
        <video autoplay muted loop id="myVideo">
        <source src="{{asset('assets/admin/images/login.mp4')}}" type="video/mp4">
        </video>
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
                    <div class="login-fancy">
                    <h2 class="text-white mb-60">Café teria</h2>
                        <h5 class="mb-20 text-white">Discover The Test Of Relay Coffee</h5>
                        <h5 class="mb-20 text-white">We’re open daily for dine in or take-away orders</h5>
                        <img src="{{asset('assets/admin/images/login-image.png')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 login-fancy-bg bg parallax">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30"style="color:snow">Sign In </h3>
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
                        <p class="mt-20 mb-0" style="color: snow">Don't have an account? <a href="{{ route('register') }}"> Create one here</a>
                        </p>
                        <p><a class="text-white" href="{{route('home')}}"> Home</a> </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection