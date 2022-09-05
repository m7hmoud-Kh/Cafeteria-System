<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;



class ProductShopComponent extends Component
{
    public $catid;
    public function mount($products, $catid)
    {
        $this->catid = $catid;
    }

    public function AddToCart($product)
    {
        //check if card is Added Before or not By User
        $found = Cart::where('product_id', $product['id'])->where('user_id', Auth()->user()->id)->first();

        if (!$found) {
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
        if ($this->catid) {
            $products = Product::whereStatus(true)->where('quantity', '>=', '1')
                ->where('category_id', '=', $this->catid)
                ->select('id', 'name', 'image', 'price')
                ->paginate(15);
            return
                view('livewire.website.product-shop-component', ['products' => $products]);
        } else {
            $products = Product::whereStatus(true)->where('quantity', '>=', '1')->select('id', 'name', 'image', 'price')->paginate(15);
            return view('livewire.website.product-shop-component', ['products' => $products]);
        }
    }
}
