@extends('admin.layout')

@section('title')
    Edit
@endsection
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Update tag </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="default-color">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="default-color" href="{{ route('tag.index') }}">tag</a>
                    </li>
                    <li class="breadcrumb-item active">Update tag</li>
                </ol>
            </div>
        </div>
    </div>


    @include('admin.includes.error-request')


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <form action="{{ route('tag.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $tag->name }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endsection
