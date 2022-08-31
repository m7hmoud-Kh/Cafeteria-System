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
<h1> All Tags </h1>
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
<div class="table-responsive">
   
    <table class="table table-striped table-bordered p-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                
                <th>control</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td> {{ $tag->id }} </td>
                    <td> {{ $tag->name }} </td>
                   
                    <td>
                    <a href="{{route('tag.edit',$tag->id)}}" class="btn btn-warning "> Edit </a>
           
                <form action="{{route('tag.destroy',$tag->id)}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="submit"  class="btn btn-danger" value="Delete">
                </form>
            </td>
                </tr>

              
               
            @endforeach
            <tfoot>
                <tr>
                    <th scope="">#</th>
                    <th scope="">Name</th>
                    <th scope="">control</th>
                
                </tr>
            </tfoot>
        </tbody>
    </table>
    </div>



    <a href="{{route('tag.create')}}" class="btn btn-primary">add new category</a>


  


@endsection