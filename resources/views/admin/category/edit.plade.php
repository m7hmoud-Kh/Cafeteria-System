@extends('admin.layout')

@section('title')
Edit
@endsection
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

<h1>Edit category</h1>
<form action="{{route('category.update'}}" method="POST">
@csrf
@method("PUT")
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value ="{{$category->name}}">
   
    <div class="mb-3">
  <label for="image" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="image" name="image"  value ="{{$category->image}}">
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
