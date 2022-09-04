<div class="col-lg-3 col-sm-6">
    <div class="product text-center">
        <div class="mb-3 position-relative">
            <div class="badge text-white badge-"></div>
            <a class="d-block" href="#">
                <img class="img-fluid" src="{{ asset('product_image/' . $product->image) }}" alt="{{ $product->name }}">
            </a>
            <div class="product-overlay">
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href='javascript:void(0);'
                        wire:click.prevent='AddToCart({{ $product }})'>Add
                        to cart</a>
                </li>
            </div>
        </div>
        <h6> <a class="reset-anchor" href="#">{{ $product->name }}</a></h6>
        <p class="small text-muted">{{ $product->format_price($product->price) }} </p>
    </div>

</div>
