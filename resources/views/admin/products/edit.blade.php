@extends('admin.layout')

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

    <h1 class="text-center"> Edit Product Details </h1>
    <br>
    <form action="{{ route('products.update', $product->id) }}" method="POST" class="col-4" style="margin:auto;"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Product Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price:</label>
            <input type="number" name='price' class="form-control" value="{{ $product->price }}">
        </div>
        {{-- <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" value="{{ $product->image }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Size</label>
            <input type="number" name='size' class="form-control" value="{{ $product->size }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name='quantity' class="form-control" value="{{ $product->quantity }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="number" name='status' class="form-control" value="{{ old('status') }}">
        </div>
        <button type="submit" class="btn btn-success container">Edit</button>
    </form>
    <br>
@endsection
