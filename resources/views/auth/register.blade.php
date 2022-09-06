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
</style>

<video autoplay muted loop id="myVideo">
<source src="{{asset('assets/admin/images/reg.mp4')}}" type="video/mp4">
</video>

<section class="height-100vh d-flex align-items-center page-section-ptb login">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
                    <div class="login-fancy">
                        <h2 class="text-white mb-60">Café teria</h2>
                        <h5 class="mb-20 text-white">Discover The Test Of Relay Coffee</h5>
                        <h5 class="mb-20 text-white">We’re open daily for dine in or take-away orders</h5>

                        <img src="{{asset('assets/admin/images/register-image.png')}}">
                        <ul class="list-unstyled pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="{{route('home')}}"> Home</a> </li>
                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 login-fancy-bg bg parallax">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-20"style="color:snow">Signup</h3>
                        <form method="POST" action="{{ route('register') }}"enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="section-field mb-10 col-sm-12">
                                    <label class="mb-10" for="name">Name* </label>
                                    <input id="fname" class="web form-control @error('name') is-invalid @enderror"
                                        type="text" name="name" value="{{ old('name') }}"required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="section-field mb-10">
                                <label class="mb-10" for="email">Email* </label>
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"value="{{ old('email') }}"required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="section-field mb-10">
                                <label class="mb-10" for="password">Password* </label>
                                <input class="Password form-control @error('password') is-invalid @enderror" id="password"
                                    type="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="section-field mb-10">
                                <label class="mb-10" for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input class="Password form-control" id="password-confirm" type="password"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="section-field mb-10">
                                <label class="mb-10" for="email">Image </label>
                                <input type="file" id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    name="image"value="{{ old('image') }}"required autocomplete="image">

                            </div>

                            <button type="submit" class="button">
                                <span>Signup</span>
                                <i class="fa fa-check"></i>
                            </button>

                            <p class="mt-20 mb-0" style="color: snow">Do you have account? <a href="{{ route('login') }}"> LOGIN</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
