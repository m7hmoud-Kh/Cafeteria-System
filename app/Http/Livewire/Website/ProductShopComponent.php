<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductShopComponent extends Component
{
    use WithPagination;
    // public $products ;

    // public function mount($products){
    //     $this-> $products = $products;
    // }

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
        $products = Product::paginate(5);
        
    return view('livewire.website.product-shop-component',['products' => $products]);
    }
}
