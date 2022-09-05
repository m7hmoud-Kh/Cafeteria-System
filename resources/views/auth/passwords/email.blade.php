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

.alert-success {
  
  width: 296px;
}
</style>


<video autoplay muted loop id="myVideo"style="position:fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;">
<source src="{{asset('assets/admin/images/login.mp4')}}" type="video/mp4">
</video>

<section class="height-100vh d-flex align-items-center page-section-ptb login">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
       <div class="login-fancy">
           <h2 class="text-white mb-30">Café teria</h2>
        
          <img src="{{asset('assets/admin/images/login-image.png')}}">
        </div>
       </div>
       <div class="col-lg-4 col-md-6 login-fancy-bg bg parallax">
        <div class="login-fancy pb-40 clearfix">
        <h3 class="mb-30"style="color:snow">{{ __('Reset Password') }}</h3>

        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

</div>
         <div class="section-field mb-20">
        
         <form method="POST" action="{{ route('password.email') }}">
                        @csrf
             <label class="mb-10" for="name"for="email">Email* </label>
               <input id="name" class="web form-control @error('email') is-invalid @enderror" type="email"  name="email" required autofocus autocomplete="email"value="{{ old('email') }}">

               
               @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>


              <button type="submit" class="button">
                <span>{{ __('Send Password Reset Link') }}</span>
            </button>

      
        </div>
      </div>
  </div>
</section>
@endsection
