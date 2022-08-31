@extends('admin.layout')
@section('title')
categories
@endsection
@section('content')

<h1> All categories </h1>
<div class="table-responsive">
    <table class="mb-0 table table-bordered table-3 text-center table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>image</th>
                <th>control</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td> {{ $category['id'] }} </td>
                    <td> {{ $category['name'] }} </td>
                    <td><img src="{{ asset('categoryimage\/') . $category['image'] }}" width="50" alt=""></td>

                    <td>
                    <a href="{{route('category.update',$category['id'])}}" class="btn btn-warning "> Edit </a>
           
                <form action="{{route('category.destroy',$category['id'])}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="submit"  class="btn btn-danger" value="Delete">
                </form>
            </td>
                </tr>

                  
               
            @endforeach
        </tbody>
    </table>
    </div>
    <a href="{{route('category.edit'}}" class="btn btn-primary">add new category</a>
@endsection