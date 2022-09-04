<?php

namespace App\Http\Livewire\Website;
use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

use Livewire\WithPagination;

use Flasher\Prime\FlasherInterface;


class ProductShopComponent extends Component
{
    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    // public $products ;
    public $catid;
    public function mount($products,$catid){
        // dd($catid);
        // $this->products = $products;
        $this->catid = $catid;
    }

    public function AddToCart($product , FlasherInterface $flasher){
        //check if card is Added Before or not By User
        $found = Cart::where('product_id',$product['id'])->where('user_id',Auth()->user()->id)->first();

        if(!$found){
            Cart::create([
                'user_id' => Auth()->user()->id,
                'product_id' => $product['id'],
                'price' => $product['price'],
            ]);

            $this->emit('update_cart');
            $flasher->addSuccess("Product Added To Cart");

        }
        $flasher->addError('Product Already Added');
    }
    public function render()
    {
        if ($this->catid) {
            $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')
        ->where('category_id','=',$this->catid)
        ->select('id','name','image','price')
        ->paginate(15);
            return
            view('livewire.website.product-shop-component',['products' => $products]);
        }
        else{
            $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')->select('id','name','image','price')->paginate(15);
            return view('livewire.website.product-shop-component',['products' => $products]);
        }
    }
}
//
