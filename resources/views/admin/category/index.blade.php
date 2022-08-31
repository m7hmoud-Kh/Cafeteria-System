@extends('admin.layout')

@section('title')
categories
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/jquery.dataTables.min.css') }}">
@endsection
@section('content')
<div>
    @include('admin.includes.alert-message')
</div>
<h1> All categories </h1>
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
<div class="table-responsive">
   
    <table class="table table-striped table-bordered p-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>image</th>
                <th>control</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td> {{ $category->id }} </td>
                    <td> {{ $category->name }} </td>
                    <td><img src="{{ asset('Category_image/'.$category->image )}}" width="50" alt=""></td>

                    <td>
                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning "> Edit </a>
           
                <form action="{{route('category.destroy',$category->id)}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="submit"  class="btn btn-danger" value="Delete">
                </form>
            </td>
                </tr>

                <tfoot>
                    <tr>
                        <th scope="">#</th>
                        <th scope="">Name</th>
                        <th scope="">Image</th>
                        <th scope="">control</th>
                    </tr>
                </tfoot>
               
            @endforeach
        </tbody>
    </table>
    </div>



    <a href="{{route('category.create')}}" class="btn btn-primary">add new category</a>


  


@endsection