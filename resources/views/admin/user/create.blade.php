@extends('admin.layout')

@section('title')
    User
@endsection

@section('style')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Add New User </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="default-color">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="default-color" href="{{ route('user.index') }}">User</a>
                    </li>
                    <li class="breadcrumb-item active">Add User</li>

                </ol>
            </div>
        </div>
    </div>


    @include('admin.includes.error-request')

    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1"
                                placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name='email' class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <div class="custom-file mb-10">
                            <input type="file" name="image" class="custom-file-input" id="validatedCustomFile"
                                required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection
