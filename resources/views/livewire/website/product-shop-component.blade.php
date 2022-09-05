<div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
    <div class="row">
        <!-- PRODUCT-->
        @foreach ($products as $p)
            <div wire:ignore.slef class="col-lg-4 col-sm-6">
                <div class="product text-center">
                    <div class="mb-3 position-relative">
                        <div class="badge text-white badge-"></div>
                        <a class="d-block" href="#">
                            <img class="img-fluid" src="{{ asset('product_image/' . $p->image) }}"
                                alt="{{ $p->name }}">
                        </a>
                        <div class="product-overlay">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                    href='javascript:void(0);' wire:click.prevent='AddToCart({{ $p }})'>Add
                                    to cart</a>
                            </li>
                        </div>
                    </div>
                    <h6> <a class="reset-anchor" href="#">{{ $p->name }}</a></h6>
                    <p class="small text-muted">{{ $p->format_price($p->price) }} </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links('') }}
    </div>
</div>
