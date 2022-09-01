{{-- @extends('admin.layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="text-center"> Add Product </h1>
    <br>
    <form action="{{ route('products.store') }}" method="POST" class="col-4" style="margin:auto;"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Product</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name='price' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Size</label>
            <input type="number" name='size' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name='quantity' class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="number" name='status' class="form-control">
        </div>
        <button type="submit" class="btn btn-success" style="width: 45%">Save </button>
        <button type="reset" class="btn btn-primary " style="width: 45%">Restet</button>
    </form>
    <br>
@endsection --}}


@extends('admin.layout')

@section('title')
    Product
@endsection

@section('style')
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Add New Product </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    {{-- <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="default-color">Home</a>
                    </li> --}}
                    <li class="breadcrumb-item active">
                        <a class="default-color" href="{{ route('products.index') }}">Product</a>
                    </li>
                    <li class="breadcrumb-item active">Add Product</li>

                </ol>
            </div>
        </div>
    </div>


    {{-- @include('admin.includes.error-request') --}}

    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">Product</h5>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1"
                                placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputPassword1"
                                value="{{ old('price') }}">
                        </div>
                        <div class="custom-file mb-10">
                            <input type="file" name="image" class="custom-file-input" id="validatedCustomFile"
                                required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Size</label>
                            <input type="number" name="size" class="form-control" id="exampleInputPassword1"
                                value="{{ old('size') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputPassword1"
                                value="{{ old('quantity') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <input type="number" name="status" class="form-control" id="exampleInputPassword1"
                                value="{{ old('status') }}">
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
