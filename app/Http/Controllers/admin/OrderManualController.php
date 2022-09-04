<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\TransactionOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Flasher\Prime\FlasherInterface;

class OrderManualController extends Controller
{
    public const TAX = 12;

    public function index(Request $request){

        $users = User::whereNull('isAdmin')->get();
        $data = [
            'users' => $users
        ];
        return view('admin.order-manual.index',compact('data'));

    }

    public function store_user_id(Request $request){
        $request->session()->put('user_id',$request->user_id);

        $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')->select('id','name','image','price')->orderby('name')->get();


         $data = [
            'products' => $products,
        ];
        return view('admin.order-manual.shopping',compact('data'));
    }

    public function checkout_details(Request $request){
        $carts = Cart::where('user_id',$request->session()->get('user_id'))->orderby('id','desc')->get();
        $data = [
            'carts' => $carts,
        ];
        return view('admin.order-manual.checkout-details',compact('data'));
    }

    public function place_order(Request $request ,FlasherInterface $flasher){
        $all_cart = Cart::select(
            'product_id',
            'quantity',
            DB::raw("price * quantity As sub_total")
        )->where('user_id', $request->session()->get('user_id'))
        ->get();

        $sub_total = $this->get_all_total_of_cart($all_cart);
        $tax = $sub_total / self::TAX;
        $total = $sub_total + $tax;

        $order = Order::create([
            'user_id' => $request->session()->get('user_id'),
            'ref_id' => 'Admin_'.Auth()->user()->name.'_'.Carbon::now(),
            'sub_total' => $sub_total,
            'tax' => $tax,
            'total' => $total,
            'notes' => $request->notes,
            'phone' => $request->phone
        ]);

        $all_item_in_cart = Cart::where('user_id', $request->session()->get('user_id'))->get();
        foreach ($all_item_in_cart as $cart) {
            $order->products()->syncWithoutDetaching([$cart->product_id => ['quantity' => $cart->quantity]]);
        }
        Cart::destroy($all_item_in_cart->pluck('id'));


        TransactionOrder::create([
            'order_id' => $order->id,
        ]);


        $flasher->addSuccess("Order Added with RefId: <br> $order->ref_id");
        return redirect()->route('orders');
    }

    private function get_all_total_of_cart($all_cart){
        $all_total_cart = 0;
        foreach ($all_cart as $cart) {
            $all_total_cart += $cart->sub_total;
        }
        return $all_total_cart;
    }

}
