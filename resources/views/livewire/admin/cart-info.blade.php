 <tr x-data="{show: true}" x-show='show'>
        <th class="pl-0 border-0" scope="row">
            <div class="media align-items-center"><a class="reset-anchor d-block animsition-link"
                    href="javascript:void(0);">
                    <img src="{{ asset('Product_image/' . $cart->products->image) }}" alt="..." width="70" /></a>

                <div class="media-body ml-3"><strong class="h6"><a
                            class="reset-anchor animsition-link">{{ $cart->products->name }}</a></strong></div>
            </div>
        </th>
        <td class="align-middle border-0">
            <p class="mb-0 small">{{ $cart->price }}</p>
        </td>
        <td class="align-middle border-0">
            <div class="border d-flex align-items-center justify-content-between px-3"><span
                    class="small text-uppercase text-gray headings-font-family">Quantity</span>
                <div class="quantity">
                    <button wire:click.prevent="DecreaseQuantity({{$cart->id}})" class="p-0">
                        <i class="fa fa-caret-left fa-lg"></i>
                    </button>
                    <span class="form-control form-control-sm border-0 shadow-0 px-2 text-center">
                        {{ $cart->quantity }}
                    </span>
                    <button wire:click.prevent="IncreaseQuantity({{$cart->id}})" class="p-0">
                        <i class="fa fa-caret-right fa-lg"></i>
                    </button>
                </div>
            </div>
        </td>
        <td class="align-middle border-0">
            <p class="mb-0 small"> {{ $cart->quantity * $cart->price }} </p>
        </td>
        <td class="align-middle border-0">
            <a class="reset-anchor"  @click="show = false" wire:click.prevent="RemoveCart({{ $cart->id }})">
                <i class="fa fa-trash small text-muted"></i>
            </a>
        </td>
    </tr>
