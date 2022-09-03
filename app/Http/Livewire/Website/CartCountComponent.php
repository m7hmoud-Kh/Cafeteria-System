<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use Livewire\Component;

class CartCountComponent extends Component
{
    protected $listeners = ['update_cart' => 'UpdateCart'];

    public $count ;

    public function mount(){
        $this->UpdateCart();
    }

    public function UpdateCart(){
        $this->count = Cart::where('user_id',Auth()->user()->id)->count();
    }
    public function render()
    {
        return view('livewire.website.cart-count-component');
    }
}
