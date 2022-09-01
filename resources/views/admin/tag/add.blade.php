@extends('admin.layout')

@section('title')
    create
@endsection
@section('style')
@endsection
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Add New tag </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="default-color">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="default-color" href="{{ route('tag.index') }}">tag</a>
                    </li>
                    <li class="breadcrumb-item active">Add tag</li>

                </ol>
            </div>
        </div>
    </div>
    @include('admin.includes.error-request')


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title ">tag</h5>
                    <form action="{{ route('tag.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">

                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
