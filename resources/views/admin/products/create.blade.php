@extends('admin.layout')

@section('title')
    Product
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/select2.min.css') }}">
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Add New Product </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="default-color">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="default-color" href="{{ route('products.index') }}">Product</a>
                    </li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div>
        </div>
    </div>


    @include('admin.includes.error-request')

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
                                value="{{ old('price') }}" min="1" step="0.5">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Size</label>
                            <select class="custom-select" name="size">
                                <option selected>Choose Size</option>
                                <option value="1">Small</option>
                                <option value="2">Medium</option>
                                <option value="3">Large</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputPassword1"
                                value="{{ old('quantity', 1) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="custom-select" name="category_id">
                                <option selected disabled>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <select class="custom-select js-example-basic-multiple" name="tags[]" multiple>
                                <option disabled>Choose Tags</option>
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="custom-file mb-10 mt-10 ">
                            <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
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
    <script src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
