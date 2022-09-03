<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class CartDetailsComponent extends Component
{

    public $cart;
    public $total;

    public function mount($cart){
        $this->cart = $cart;
        $this->getTotal();
    }


    public function IncreaseQuantity(){
        $product = Product::select('quantity')->whereId($this->cart->products->id)->first();
        $all_quantity = $product->quantity;
        if($this->cart->quantity < $all_quantity){
            $this->cart->update([
                'quantity' => ++$this->cart->quantity
            ]);
        }
        $this->getTotal();
        $this->emit('update_cart_total');
    }

    public function DecreaseQuantity(){
        if($this->cart->quantity > 1){
            $this->cart->update([
                'quantity' => --$this->cart->quantity
            ]);
        }
        $this->getTotal();
        $this->emit('update_cart_total');
    }

    public function getTotal(){
        $this->total = $this->cart->quantity * $this->cart->price;
    }

    public function RemoveCart($cart_id){
        $removed_cart = Cart::find($cart_id);
        $removed_cart->delete();
        $this->emit('update_cart_total');
        $this->emit('update_cart');
    }

    public function render()
    {
        return view('livewire.website.cart-details-component');
    }
}
