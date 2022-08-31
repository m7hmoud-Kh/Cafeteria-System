@extends('layouts.app')

@section('content')
<section class="height-100vh d-flex align-items-center page-section-ptb login" 
style="background-image: url({{ asset('assets/admin/images/register-bg.jpg')}});">
  <div class="container">
     <div class="row no-gutters">
       <div class="col-lg-4 offset-lg-1 col-md-6 login-fancy-bg bg parallax" style="background-image: url(images/register-inner-bg.jpg);">
         <div class="login-fancy">
          <h2 class="text-white mb-20">Hello world!</h2>
          <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose responsive template along with powerful features.</p>
          <ul class="list-unstyled pos-bot pb-30">
            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
          </ul>
         </div> 
       </div>
       <div class="col-lg-4 col-md-6 bg-white">
        <div class="login-fancy pb-40 clearfix">    
        <h3 class="mb-30">Signup</h3>
        <form method="POST" action="{{ route('register') }}"enctype="multipart/form-data">
          @csrf
         <div class="row">
             <div class="section-field mb-20 col-sm-12">
               <label class="mb-10" for="name">Name* </label>
                 <input id="fname" class="web form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}"required autocomplete="name" autofocus>
                 @error('name')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
              </div>
          </div>

            <div class="section-field mb-20">
                 <label class="mb-10" for="email">Email* </label>
                  <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"value="{{ old('email') }}"required autocomplete="email">
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

             <div class="section-field mb-20">
                 <label class="mb-10" for="email">Image </label>
                  <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image"value="{{ old('image') }}"required autocomplete="image">
   
             </div>
             
             <button type="submit" class="button">
              <span>Signup</span>
              <i class="fa fa-check"></i>
          </button>

             <p class="mt-20 mb-0">Do you have account? <a href="{{ route('login') }}"> LOGIN</a></p>
          </div>
        </div>
      </div>
  </div>
</section>
@endsection
