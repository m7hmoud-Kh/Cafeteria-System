@extends('admin.layout')

@section('title')
    Make Order
@endsection


@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/select2.min.css') }}">
@endsection


@section('content')
    <div>
        @include('admin.includes.alert-message')
    </div>
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <code class='text text-danger'>If User
                    Not Found in System</code>
                <h4 class="m-3"> <a href="{{ route('user.create') }}" class="btn btn-primary"> Add User </a>
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Manaual Order</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">Make Order</h5>
                    <form action="{{route('user-cart')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">User Name</label>
                            <select class="custom-select js-example-basic-multiple" name="user_id">
                                <option selected disabled>Choose User Name</option>
                                @forelse ($data['users'] as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @empty
                                <option>Not User Found in System</option>
                                @endforelse
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Go</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
