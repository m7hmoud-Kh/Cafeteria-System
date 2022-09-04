<?php

namespace App\Http\Livewire\Website;
use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
<<<<<<< HEAD
=======
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
>>>>>>> ae290ff9f5910ced22f710545aacc73a43be38a7

class ProductShopComponent extends Component
{
    public $catid;
    public function mount($products,$catid){
        $this->catid = $catid;
    }

<<<<<<< HEAD
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

=======
    public function AddToCart($product , FlasherInterface $flasher){
        if(Auth::user()){
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
            return redirect()->route('login');
        }
>>>>>>> ae290ff9f5910ced22f710545aacc73a43be38a7
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
