@extends('admin.layout')

@section('title')
    Make Order
@endsection


@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/select2.min.css') }}">
@endsection


@section('content')
    <div>
        @include('admin.includes.alert-message')
    </div>
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="m-3"> <a href="{{ route('make-order') }}" class="btn btn-primary"> New Order </a>
                </h4>


            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
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
                                <th scope="">Order Date</th>
                                <th scope="">Status</th>
                                <th scope="">Total</th>
                                <th scope="">More Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $order_count = 0;
                            @endphp
                            @foreach ($processing_orders as $order)
                                <tr>
                                    <td>{{ ++$order_count }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        <a href="" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="">#</th>
                                <th scope="">Order Date</th>
                                <th scope="">Status</th>
                                <th scope="">Total</th>
                                <th scope="">More Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $processing_orders->links() }}
            </div>
        </div>
    </div>
@endsection
