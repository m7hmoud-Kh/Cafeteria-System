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
                <h4 class="mb-0"> Update Product </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="default-color">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="default-color" href="{{ route('products.index') }}">Product</a>
                    </li>
                    <li class="breadcrumb-item active">Update Product</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">Product</h5>
                    <form action="{{ route('products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputPassword1"
                                placeholder="Name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputPassword1"
                                value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Size</label>
                            <select class="custom-select" name="size">
                                <option>Choose Size</option>
                                <option value="1" @if ($product->size == 1) selected @endif>Small</option>
                                <option value="2" @if ($product->size == 2) selected @endif>Medium</option>
                                <option value="3" @if ($product->size == 3) selected @endif>Large</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputPassword1"
                                value="{{ $product->quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <input type="number" name="status" class="form-control" id="exampleInputPassword1"
                                value="{{ $product->status }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="custom-select" name="category_id">
                                <option disabled>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <select class="custom-select js-example-basic-multiple" name="tags[]" multiple>
                                <option disabled>Choose Tags</option>
                                {{-- @foreach ($tags as $tag) [1,2,3,4]
                                    @foreach ($product->tags as $product_tag) [1,4]
                                        @if ($product_tag->id == $tag->id)
                                            <option selected value="{{ $tag->id }}"> [1]
                                                {{ $tag->name }}
                                            </option>
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach --}}

                                @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}"
                                            @foreach ($product->tags as $product_tag)
                                                @if ($product_tag->id == $tag->id)
                                                    selected
                                                @endif
                                            @endforeach
                                            >
                                            {{$tag->name}}
                                        </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="custom-file mb-10 mt-10 ">
                            <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
                            <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
