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
.remember-checkbox label:before {
    background-color: #a96518;
}

</style>


<video autoplay muted loop id="myVideo"style="position:fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;">
<source src="{{asset('assets/admin/images/reg.mp4')}}" type="video/mp4">
</video>



<section class="height-100vh d-flex align-items-center page-section-ptb login">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
       <div class="login-fancy">
           <h2 class="text-white mb-30">Café teria</h2>
        
          <img src="{{asset('assets/admin/images/register-image.png')}}">
        </div>
       </div>
       <div class="col-lg-4 col-md-6 login-fancy-bg bg parallax">
        <div class="login-fancy pb-40 clearfix">    
        <h3 class="mb-30"style="color:snow">{{ __('Reset Password') }}</h3>
        <form method="POST" action="{{ route('password.update') }}">
                 @csrf
                 <input type="hidden" name="token" value="{{ $token }}">

            <div class="section-field mb-20">
                 <label class="mb-10" for="email">Email* </label>
                  <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"vvalue="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
             </div>

            <div class="section-field mb-20">
             <label class="mb-10" for="password">Password* </label>
               <input class="Password form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
               @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>

            <div class="section-field mb-20">
              <label class="mb-10" for="password-confirm">{{ __('Confirm Password') }}</label>
                <input class="Password form-control" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
             </div>
             <button type="submit" class="button">
              <span>{{ __('Reset Password') }}</span>
          </button>
         </form>
          </div>
        </div>
      </div>
  </div>
</section>
@endsection
