@extends('admin.layout')

@section('title')
    create
@endsection
@section('style')
@endsection
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Add New category </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="default-color">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="default-color" href="{{ route('category.index') }}">category</a>
                    </li>
                    <li class="breadcrumb-item active">Add category</li>
                </ol>
            </div>
        </div>
    </div>
    @include('admin.includes.error-request')


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title ">category</h5>
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="custom-file mb-10">
                            <input type="file" name="image" class="custom-file-input" id="validatedCustomFile"
                                required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
