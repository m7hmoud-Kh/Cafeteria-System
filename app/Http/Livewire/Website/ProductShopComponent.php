<?php

namespace App\Http\Livewire\Website;

use App\Models\Tag;
use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;



class ProductShopComponent extends Component
{
    public $catid;
    public $tagid;
    public function mount($products, $catid , $tagid)
    {
        $this->catid = $catid;
        $this->tagid = $tagid;
    }

    public function AddToCart($product,FlasherInterface $flasher)
    {
        if(Auth::user() && !Auth::user()->isAdmin){
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
            }else{
                $flasher->addError('Product Already Added');
            }
        }else{
            $flasher->addError('Must be You Are Admin Or Not Login');
            return redirect()->route('login');
        }
    }
    public function render()
    {
        if ($this->catid) {
            $products = Product::whereStatus(true)->where('quantity', '>=', '1')
                ->where('category_id', '=', $this->catid)
                ->select('id', 'name', 'image', 'price')
                ->paginate(15);

        }elseif($this->tagid){
            $products = Product::whereHas('tags',function($q){
                $q->where('tag_id',$this->tagid);
            })->whereStatus(true)->where('quantity', '>=', '1')->paginate(15);
        }else {
            $products = Product::whereStatus(true)->where('quantity', '>=', '1')->select('id', 'name', 'image', 'price')->paginate(15);

        }
        return view('livewire.website.product-shop-component', ['products' => $products]);
    }
}
