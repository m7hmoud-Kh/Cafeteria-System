@extends('admin.layout')

@section('title')
    create
@endsection
@section('content')
    <h1> category Info </h1>
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('categoryimage\/') . $category['image'] }}" class="card-img-top">
        <div class="card-body">
            <p class="card-text">Title {{ $category->name }}</p>
            <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
