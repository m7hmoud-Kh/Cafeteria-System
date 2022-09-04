@extends('admin.layout')

@section('title')
    Make Order
@endsection


@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/select2.min.css') }}">
    <style>
        .product img {
            -webkit-filter: grayscale(40%);
            filter: grayscale(40%);
            transition: all 0.3s;
        }

        .product-overlay {
            width: 100%;
            position: absolute;
            left: 0;
            bottom: 0;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: end;
            align-items: flex-end;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 1rem 0;
            opacity: 0;
            transition: all 0.3s;
        }

        .product-overlay ul li {
            transition: all 0.3s;
        }

        .product-overlay ul li:first-of-type {
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px);
            opacity: 0;
        }

        .product-overlay ul li:last-of-type {
            -webkit-transform: translateX(10px);
            transform: translateX(10px);
            opacity: 0;
        }

        .product:hover img {
            opacity: 0.3;
        }

        .product:hover .product-overlay {
            opacity: 1;
        }

        .product:hover .product-overlay li {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
        }

        .product .badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 999;
        }


        .product-view {
            min-height: 20rem;
        }

        .quantity {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            font-family: inherit;
        }

        .quantity input {
            width: 2rem;
            text-align: center;
        }

        .quantity button {
            background: none;
            border: none;
            width: 1rem;
            outline: none;
        }
    </style>
@endsection


@section('content')
    <div>
        @include('admin.includes.alert-message')
    </div>
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="m-3"> Add To Cart
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Add To cart</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="row">
        {{-- <div class="col-xl-5 mb-30">
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="text-uppercase mb-4">Cart Info</h5>
                    <div class="table-responsive mb-4">
                        <table class="table">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0" scope="col"> <strong
                                            class="text-small text-uppercase">Product</strong>
                                    </th>
                                    <th class="border-0" scope="col"> <strong
                                            class="text-small text-uppercase">Price</strong></th>
                                    <th class="border-0" scope="col"> <strong
                                            class="text-small text-uppercase">Quantity</strong></th>
                                    <th class="border-0" scope="col"> <strong
                                            class="text-small text-uppercase">Total</strong></th>
                                    <th class="border-0" scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($data['carts'] as $cart)
                                    <livewire:admin.cart-info :cart="$cart" :key="$cart->id" />
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center font-weight-bold mt-2">Not Product In Cart
                                        </td>
                                    </tr>
                                @endforelse



                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-body">
                    <h5 class="text-uppercase mb-4">Cart total</h5>
                    <livewire:admin.cart-total />
                </div>
            </div>
        </div> --}}
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics mb-30">
                <div  class="card-body">
                    <div>
                        <a class="btn btn-success" href="{{route('checkout-details')}}">Go Check Out Details</a>
                    </div>
                    <div class="col-sm-12">
                        <h4 class="m-3 text-center">All Products Available
                        </h4>
                    </div>


                    <div class="row">
                        @forelse ($data['products'] as $product)
                            <livewire:admin.shopping-product :product="$product" :key="$product->id" />
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


