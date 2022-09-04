<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;


class CartInfo extends Component
{


    public $cart ;

    public function mount($cart){
        $this->cart = $cart;
    }

    public function IncreaseQuantity($cart_id){
        $cart_info = Cart::find($cart_id);
        $product = Product::select('quantity')->whereId($cart_info->products->id)->first();
        $all_quantity = $product->quantity;
        if($cart_info->quantity < $all_quantity){
            $cart_info->quantity += 1;
            $cart_info->update([
                'quantity' => $cart_info->quantity
            ]);
        }
        $this->emit('update_cart_checkout');
    }

    public function DecreaseQuantity($cart_id){
        $cart_info = Cart::find($cart_id);

        if($cart_info->quantity > 1){
            $cart_info->quantity -= 1;
            $cart_info->update([
                'quantity' => $cart_info->quantity
            ]);
        }
        $this->emit('update_cart_checkout');
    }

    public function getTotal(){
        $this->total = $this->cart->quantity * $this->cart->price;
    }

    public function RemoveCart($cart_id){
        $removed_cart = Cart::find($cart_id);
        $removed_cart->delete();
        
        $this->emit('update_cart_checkout');
    }

    public function render()
    {
        return view('livewire.admin.cart-info');
    }
}
