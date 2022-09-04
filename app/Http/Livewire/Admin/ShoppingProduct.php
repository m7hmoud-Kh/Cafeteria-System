<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class ShoppingProduct extends Component
{

    public $product;

    public function mount($product){
        $this->product = $product;

    }

    public function AddToCart($product,Request $request, FlasherInterface $flasher){
        $this->save = null;
        $this->not_added = null;
        // check if card is Added Before or not By User
        $found = Cart::where('product_id',$product['id'])->where('user_id',$request->session()->get('user_id'))->first();
        if(!$found){
            Cart::create([
                'user_id' => $request->session()->get('user_id') ,
                'product_id' => $product['id'],
                'price' => $product['price'],
            ]);
            $flasher->addSuccess("Product Added To Cart");
        }else{
            $flasher->addError('Already Added before To Cart');
        }


    }


    public function render()
    {
        return view('livewire.admin.shopping-product');
    }
}
