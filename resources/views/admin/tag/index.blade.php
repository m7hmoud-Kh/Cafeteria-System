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
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> <a class="btn btn-primary" href="{{ route('tag.create') }}">Add tag</a> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">tags</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td> {{ $tag->id }} </td>
                                    <td> {{ $tag->name }} </td>
                                    <td>
                                        <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary "> Edit </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        <tfoot>
                            <tr>
                                <th scope="">#</th>
                                <th scope="">Name</th>
                                <th>Edit</th>
                                <th>delete</th>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            @endsection
            @section('script')
                <script src="{{ asset('assets/admin/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
                <script>
                    $(document).ready(function() {
                        $('#datatable').DataTable();
                    });
                </script>
            @endsection
