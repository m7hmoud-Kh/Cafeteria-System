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
@endsection
