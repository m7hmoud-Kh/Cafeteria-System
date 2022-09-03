@extends('website.layout')

@section('title')
    check Out
@endsection

@section('name')
    CheckOut
@endsection

@section('content')
    <section class="py-5">
        @include('website.includes.error-request')
        <!-- BILLING ADDRESS-->
        <h2 class="h5 text-uppercase mb-4">Billing details</h2>
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('confirm-order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="phone_number">Phone Number</label>
                            <input class="form-control form-control-lg" id="phone_number" name="phone" type="text">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="firstName">Notes</label>
                            <textarea class="form-control form-control-lg" id="firstName" name="notes" type="text"
                            ></textarea>
                        </div>
                        <div class="col-lg-12 form-group">
                            <button class="btn btn-dark" type="submit">Place order</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ORDER TOTAL-->
            <livewire:website.cart-total />
        </div>
    </section>
@endsection

