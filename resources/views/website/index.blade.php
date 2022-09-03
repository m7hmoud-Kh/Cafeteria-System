@extends('website.layout')

@section('title')
    Home
@endsection

@section('name')
    Shop
@endsection

@section('content')
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <!-- SHOP SIDEBAR-->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="py-2 px-4 bg-dark text-white mb-3"><strong
                            class="small text-uppercase font-weight-bold">Categories</strong></div>
                    @foreach ($categories as $category)
                        <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                            <li class="mb-2"><a class="reset-anchor" href="#"> {{ $category->name }}</a>
                            </li>
                        </ul>
                    @endforeach
                    <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">
                            tags</strong></div>
                    @foreach ($tags as $tag)
                        <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                            <li class="mb-2"><a class="reset-anchor" href="#">{{ $tag->name }}</a></li>
                        </ul>
                    @endforeach
                </div>
<<<<<<< HEAD
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row">
                        <!-- PRODUCT-->
                        @foreach ($products as $p)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product text-center">
                                    <div class="mb-3 position-relative">
                                        <div class="badge text-white badge-"></div>
                                        <a class="d-block" href="#">
                                            <img class="img-fluid" src="{{ asset('product_image/' . $p->image) }}"
                                                alt="{{ $p->name }}">
                                        </a>
                                        <div class="product-overlay">
                                            <ul class="mb-0 list-inline">
                                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                        href="#">Add to cart</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6> <a class="reset-anchor" href="#">{{ $p->name }}</a></h6>
                                    <p class="small text-muted">{{ $p->price }} EGP</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
=======
              <livewire:website.product-shop-component :products="$products">
>>>>>>> 996b614ee2e57c677f78f27d2423848a0f26f3e1
            </div>
        </div>
    </section>
@endsection

