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
        <h3 class="mb-30">{{ __('Verify Your Email Address') }}</h3>
     

        <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>

          </div>
        </div>
      </div>
  </div>
</section>
@endsection

