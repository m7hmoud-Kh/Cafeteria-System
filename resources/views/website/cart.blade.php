@extends('website.layout')

@section('title')
    Cart
@endsection

@section('name')
    Cart
@endsection

@section('content')
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <!-- CART TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong>
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
                            @foreach ($data['cart'] as $cart)
                            <livewire:website.cart-details-component :cart="$cart"    :key="$cart->id" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- CART NAV-->
                <div class="bg-light px-4 py-3">
                    <div class="row align-items-center text-center">
                        <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm"
                                href="{{ route('home') }}"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue
                                shopping</a></div>
                        <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm"
                                href="{{route('check-out')}}">Procceed to checkout<i
                                    class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
                    </div>
                </div>
            </div>
            <!-- ORDER TOTAL-->
            <livewire:website.cart-total />
        </div>
    </section>
@endsection
