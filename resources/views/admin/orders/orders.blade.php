@extends('admin.layout')

@section('title')
    categories
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/select2.min.css') }}">
@endsection
@section('content')
    <div>
        @include('admin.includes.alert-message')
    </div>

    <div class="container-fluid"style="min-height :70vh">

        <form class="form-inline mt-5 mb-3" action="{{ route('selectorders') }}"method="post">
            @csrf
            <div class="form-group mb-2">
                <input type="date" class="form-control"name="datefrom">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="date" class="form-control"name="dateto">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <select class="custom-select js-example-basic-multiple" name="user_id"required>
                    <option value="null"  selected>all user</option>
                    @foreach ($usersUnique as $order)
                        <option value="{{ $order->user->id }}">{{ $order->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning mb-2">select</button>
        </form>

        <table class="fold-table mt-5 mb-5">
            <thead>

                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Order Date</th>
                    <th>Phone</th>
                    <th>Notes</th>
                    <th>Sub Total</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="view">
                        <td>#</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->notes}}</td>
                        <td>{{ $order->format_price($order->sub_total) }} </td>
                        <td>{{ $order->format_price($order->tax) }} </td>
                        <td>{{ $order->format_price($order->total) }} </td>
                        <td>{!! $order->status($order->status) !!}</td>

                        {{-- @if ($order->status == 1 or $order->status == 2)
                            <td title="cancel order">
                                <a href="" data-toggle="modal" data-target="#deleteModel"
                                    data-id="{{ $order->id }}">
                                    <i class="ti-reload"></i>
                                </a>
                            </td>
                        @endif
                        @if ($order->status == 3)
                            <td title="cancel order">
                                <a href="" data-toggle="modal" data-target="#StatusModel1"
                                    data-id="{{ $order->id }}">
                                    <i class="ti-reload"></i>
                                </a>
                            </td>
                        @endif --}}
                    </tr>

                    <tr class="fold">
                        <td colspan="7">
                            <div class="fold-content">

                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered p-0">
                                        <thead>
                                            <tr>
                                                <th scope="">Product Name</th>
                                                <th scope="">price</th>
                                                <th scope="">Quantity</th>
                                                <th scope="">Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->format_price($product->price) }}</td>
                                                    <td>{{ $product->pivot->quantity }}</td>
                                                    <td><img class="" src="/Product_image/{{ $product->image }}"
                                                            alt="" style="width: 80px;height:80px;"></td>
                                                </tr>
                                            @endforeach
                                        <tfoot>
                                            <tr>
                                                <th scope="">Product Name</th>
                                                <th scope="">price</th>
                                                <th scope="">Quantity</th>
                                                <th scope="">Image</th>
                                            </tr>
                                        </tfoot>

            </tbody>
        </table>

    </div>
    </div>

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>

    {{-- <!-- cancel order Modal=>1
              ================================== -->
    <div id="deleteModel" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-400">Change Status</h5>
                </div>
                <div class="modal-body p-3">

                    <form id="emailAddresses" method="post"action="{{ route('changestatus') }}" class="modal-body">
                        @csrf
                        <div class="mb-5">
                            <div class="input-group">
                                <input type="hidden" id="id" name="id">

                                <select class="custom-select" name="status" required>
                                    <option value="1">Processing</option>
                                    <option value="2">Out of delivery</option>
                                    <option value="3">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid w-100">
                            <button class="btn btn-warning" type="submit">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- change order status  End -->

    <!-- change order status Modal=>1
              ================================== -->
    <div id="StatusModel1" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-400">Change Status</h5>
                </div>
                <div class="modal-body p-3">
                    <div class="mb-5">
                        <div class="input-group">
                            <lable><span style="color:red;">Can`t change this order status</span></lable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cancel order  End -->
    </div> --}}

    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/admin/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>


    <script src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
