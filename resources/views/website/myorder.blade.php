@extends('website.layout')

@section('title')
    Home
@endsection

@section('name')
    My Orders
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
@endsection

@section('content')


    @if(!empty($orders[0]->id))

    <?php $total = 0; ?>

    <form class="form-inline mt-5 mb-3" action="{{ route('selectdate') }}"method="post">
        @csrf
        <div class="form-group mb-2">
            <input type="date" class="form-control"name="datefrom">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="date" class="form-control"name="dateto">
        </div>
        <button type="submit" class="btn btn-warning mb-2">select</button>
    </form>

    <table class="fold-table mt-5 mb-5">
        <thead>

            <tr>
                <th>#</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Phone</th>
                <th>Notes</th>
                <th>Total</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
            {{$count = 0}}
            @foreach ($orders as $order)
                <?php
                $total = $order->pluck('total')->sum();
                ?>
                <tr class="view">
                    <td>{{++$count}}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{!! $order->status($order->status) !!}</td>
                    <td>{{ $order->phone }} </td>
                    <td>{{ $order->notes }} </td>
                    <td>{{ $order->format_price($order->total) }} </td>
                    @if ($order->status == 1)
                        <td title="cancel order">
                            <a href="" data-toggle="modal" data-target="#deleteModel" data-id="{{ $order->id }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    @else
                        <td title="cancel order">
                            <a href="" data-toggle="modal" data-target="#deleteModel1">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    @endif
                </tr>
                <tr class="fold">
                    <td colspan="7">
                        <div class="fold-content text-center">
                            <div class="container">
                                <div class="row">

                                    @foreach ($order->products as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                                                <div class="profile-thumb mt-3 mb-4" style="position: relative;">
                                                    <img class="rounded-circle" src="/Product_image/{{ $product->image }}"
                                                        alt="" style="width: 150px;height:150px;">
                                                    <div class="profile-thumb-edit bg-success  text-white"
                                                        data-bs-toggle="tooltip" title=""
                                                        data-bs-original-title="Change Profile Picture">
                                                        {{ $product->price }}

                                                    </div>
                                                </div>
                                                <h4>{{ $product->name }}</h4>
                                                <h4>{{ $product->pivot->quantity }}</h4>
                                                <h6>{{ $product->Size($product->size) }}</h6>
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                            </div>


                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="total"style=""dir="ltr">
        <h3>Total: <?php echo $total; ?> EGP</h3>

    </div>


    @else
        <div class="total text-center mt-4 mb-4" dir="ltr">
            <h3>Not Found Order</h3>
            <p>Shopping  <a href="{{route('home')}}">Here</a> </p>
        </div>
    @endif
    <!-- cancel order Modal=>1
              ================================== -->
    <div id="deleteModel" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-400">Cancel Order</h5>
                </div>
                <div class="modal-body p-4">

                    <form id="emailAddresses" method="post"action="{{ route('deleteorder') }}" class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="emailID2" class="form-label">Do you want to cancel this order </label>
                            <div class="input-group">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="d-grid w-100">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- cancel order  End -->

    <!-- cancel order Modal =================================== -->
    <div id="deleteModel1" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-400">Cancel Order</h5>
                </div>
                <div class="modal-body p-4">

                    <div class="mb-3">
                        <h5 for="emailID2" class="form-label">
                            <span style="color:red">This order can`t be canceled</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cancel order  End -->
@endsection
