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
                                <th scope="">Order</th>
                                <th scope="">Notes</th>
                                <th scope="">Phone</th>
                                <th scope="">Sub Total</th>
                                <th scope="">Tax</th>
                                <th scope="">Total</th>
                                <th scope="">Status</th>
                                <th scope="">Craeted At</th>
                                <th scope="">More Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $order_count = 0;
                            @endphp
                            @forelse ($orders as $order)
                                @php
                                    $next_status = '';
                                    if ($order->status == 1) {
                                        $next_status = 2;
                                    } elseif ($order->status == 2) {
                                        $next_status = 3;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ ++$order_count }}</td>
                                    <td>{{ $order->ref_id }}</td>
                                    <td>{{ $order->notes }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->format_price($order->sub_total) }}</td>
                                    <td>{{ $order->format_price($order->tax) }}</td>
                                    <td>{{ $order->format_price($order->total) }}</td>
                                    <td>{!! $order->status($order->status) !!}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if (!empty($next_status))
                                            <button type="button" data-target="#exampleModalCenter" data-toggle="modal"
                                                class='btn btn-success' data-order_id="{{ $order->id }}"
                                                data-next_status="{{ $next_status }}"
                                                data-ref_id="{{ $order->ref_id }}">Status</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="10">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="">#</th>
                                <th scope="">Order</th>
                                <th scope="">Notes</th>
                                <th scope="">Phone</th>
                                <th scope="">Sub Total</th>
                                <th scope="">Tax</th>
                                <th scope="">Total</th>
                                <th scope="">Status</th>
                                <th scope="">Craeted At</th>
                                <th scope="">More Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
