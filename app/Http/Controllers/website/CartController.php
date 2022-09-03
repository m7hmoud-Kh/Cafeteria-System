<?php

namespace App\Http\Controllers\website;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){

        $cart = Cart::with('products')->where('user_id',Auth::user()->id)->orderBydesc('id')->get();
        $data = [
            'cart' => $cart
        ];
        return view('website.cart',compact('data'));
    }
}
