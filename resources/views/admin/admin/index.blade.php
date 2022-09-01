@extends('admin.layout')

@section('title')
    Admin
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
                <h4 class="mb-0"> <a class="btn btn-primary" href="{{ route('admin.create') }}">Add Admin</a> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Admins</li>
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
                                <th scope="">#</th>
                                <th scope="">Name</th>
                                <th scope="">Email</th>
                                <th scope="">Image</th>
                                <th scope="">Register At</th>
                                <th scope="">More Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $user_count = 0;
                            @endphp
                            @foreach ($data['users'] as $user)
                                <tr>
                                    <td>{{ ++$user_count }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><img src="{{ asset('User_image/' . $user->image) }}" width="100" height="100"
                                            alt="{{ $user->name }}"></td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{route('admin.edit',$user->id)}}" class="btn btn-primary">Edit</a>

                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-id="{{$user->id}}"
                                        data-name="{{$user->name}}"
                                        data-target="#exampleModalCenter"> Delete </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="">#</th>
                                <th scope="">Name</th>
                                <th scope="">Email</th>
                                <th scope="">Image</th>
                                <th scope="">Register At</th>
                                <th scope="">More Action</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        Delete Admin
                    </div>
                </div>
                <form action="{{route('admin.destroy',1)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Do You want to Delete
                        <strong><span id="name"></span></strong>
                        <input type="hidden" name="id" id="user_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class='btn btn-danger'>
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/admin/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });


        $("#exampleModalCenter").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this);
            modal.find('.modal-body #name').html(name);
            modal.find('.modal-body #user_id').val(id);
        });

    </script>


@endsection
