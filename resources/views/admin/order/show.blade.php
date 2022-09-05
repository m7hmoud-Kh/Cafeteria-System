@extends('admin.layout')

@section('title')
    Order Details
@endsection


@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> Invoice</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card mb-30">
            <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-20"><img class="logo-small mt-0"
                                src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="logo"></div>
                        <ul class="addresss-info invoice-addresss list-unstyled">
                            <li>Cafeteria</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 text-left text-sm-right mb-5">
                        <h4>Invoice Information</h4>
                        <div>
                            <p> Invoice No: <a href="#">{{ $order->ref_id }}</a> </p> <br>
                            <h4><small>Invoice to:</small> {{ $user->name }}</h4>
                        </div>
                        <ul class="list-unstyled">
                            <li><span><strong>Email: </strong> {{ $user->email }}</span></li>
                            <li><span><strong>Phone: </strong> <a href="{{ $order->phone }}"> {{ $order->phone }}</a></span>
                            </li>
                        </ul>
                        <span>Invoice Date: {{ $order->created_at }}</span>
                        <br>
                        <span>Due Date: {{ $order->created_at }}</span>
                    </div>
                </div>
                <div class="page-invoice-table table-responsive">
                    <table class="table table-hover text-right">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-left">Name</th>
                                <th class="text-right">Quantity</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $order_products_count = 0;
                            @endphp
                            @foreach ($order->products as $product)
                                <tr>
                                    <td class="text-center">{{ ++$order_products_count }}</td>
                                    <td class="text-left">{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->pivot->quantity * $product->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right clearfix mb-3 mt-2">
                    <div class="float-right mt-30">
                        <h6>Sub - Total amount: <strong>{{ $order->sub_total }} EGP</strong></h6>
                        <h6>Tax: <strong>{{ $order->tax }} EGP</strong></h6>
                        <h6 class="grand-invoice-amount">Grand Total: <strong>{{ $order->total }} EGP</strong></h6>
                    </div>
                </div>
               <div class="container">
                <div class="row">
                    <div class="col-10">
                        <a href="" class="btn btn-primary print-button"onclick="print_invoice()"aria-hidden="true">print invoices</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('orders') }}" class="btn btn-primary back-button">Back to all Orders</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script>
function print_invoice() {
	$(".side-menu-fixed").hide();
    $(".admin-header").hide();
    $(".page-title").hide();
    $(".print-button").hide();
    $(".back-button").hide();
	window.print();
    $(".side-menu-fixed").show();
    $(".admin-header").show();
    $(".page-title").show();
};

</script>
