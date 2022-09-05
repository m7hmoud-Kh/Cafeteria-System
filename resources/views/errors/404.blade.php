@extends('errors::minimal')

{{-- @section('title', __('Not Found')) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <style type="text/css">
        body{
          margin-top: 150px;
            background-color: #C4CCD9;
        }
        .error-main{
          background-color: #fff;
          box-shadow: 0px 10px 10px -10px #5D6572;
        }
        .error-main h1{
          font-weight: bold;
          color: #444444;
          font-size: 100px;
          text-shadow: 2px 4px 5px #6E6E6E;
        }
        .error-main h6{
          color: #42494F;
        }
        .error-main p{
          font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
@section('message')

      <div class="row text-center">
        <div class="col-lg-12 error-main p-15">
            <div class="row">
                <div class="col-lg-12">
                <h1 class="m-0">404</h1>
                <h6>Page not found - Online Cafeteria</h6>
                <p>Are you interested to Shopping in Our Cafateria?</p>
                <p><a href="{{ URL::to('/') }}" class="btn btn-dark">Click here</a></p>
                </div>
            </div>
        </div>
      </div>

@endsection
</div>
</body>
</html>
