@extends('layouts.app')

@section('content')



<section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(images/login-bg.jpg);" >
  <div class="container">
     <div class="row justify-content-center no-gutters vertical-align">
       <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
         <div class="login-fancy">
          <h2 class="text-white mb-20">Hello world!</h2>
          <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose responsive template along with powerful features.</p>
          <ul class="list-unstyled  pos-bot pb-30">
            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
          </ul>
         </div> 
       </div>
       <div class="col-lg-4 col-md-6 bg-white">
        <div class="login-fancy pb-40 clearfix">
        <h3 class="mb-30">{{ __('Reset Password') }}</h3>

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
