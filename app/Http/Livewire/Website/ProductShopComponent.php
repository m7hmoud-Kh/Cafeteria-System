<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use Livewire\Component;


class ProductShopComponent extends Component
{
    public $products ;
    public function mount($products){
        $this->products = $products;
    }

    public function AddToCart($product){
        //check if card is Added Before or not By User
        $found = Cart::where('product_id',$product['id'])->where('user_id',Auth()->user()->id)->first();

        if(!$found){
            Cart::create([
                'user_id' => Auth()->user()->id,
                'product_id' => $product['id'],
                'price' => $product['price'],
            ]);

            $this->emit('update_cart');
        }

    }
    public function render()
    {
        return view('livewire.website.product-shop-component');
    }
}
