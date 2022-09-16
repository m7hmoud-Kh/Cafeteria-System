<?php

namespace  App\Http\trait;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\TransactionOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


trait CheckoutTrait
{


    protected function calc_total_tax($user_id){
        $sub_total = $this->get_all_total_of_cart($user_id);
        $tax = $sub_total / Order::TAX;
        $total = $sub_total + $tax;

        return [
            'sub_total' => $sub_total,
            'tax' => $tax,
            'total' => $total
        ];
    }

    protected function put_products_in_order($order,$user_id){
        $all_item_in_cart = Cart::where('user_id', $user_id)->get();
        foreach ($all_item_in_cart as $cart) {
            $order->products()->syncWithoutDetaching([$cart->product_id => ['quantity' => $cart->quantity]]);
        }

        return $all_item_in_cart;
    }

    protected function add_transactionOrder($order){
        TransactionOrder::create([
            'order_id' => $order->id,
        ]);
    }


    protected function destory_cart($all_item_in_cart){
        Cart::destroy($all_item_in_cart->pluck('id'));
    }


    protected function get_all_product_in_cart($user_id){
        return Cart::select(
            'product_id',
            'quantity',
            DB::raw("price * quantity As sub_total")
        )->where('user_id',$user_id)
        ->get();
    }


    protected function get_all_total_of_cart($user_id){
        $all_total_cart = 0;
        foreach ($this->get_all_product_in_cart($user_id) as $cart) {
            $all_total_cart += $cart->sub_total;
        }
        return $all_total_cart;
    }

}
