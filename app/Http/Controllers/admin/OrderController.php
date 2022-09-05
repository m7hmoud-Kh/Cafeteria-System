<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('id', 'ref_id', 'notes', 'phone', 'sub_total', 'tax', 'total', 'status', 'created_at')->orderby('id','desc')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('products', 'user')->find($id);
        $user = User::find($order->user_id);
        // dd($order);
    return view('admin.order.show', ['order' => $order, 'user' => $user]);
    }

    public function processing_orders()
    {
        $processing_orders = Order::whereStatus(true)->where('status', '=', '1')->orderby('id','desc')->paginate(10);
        return view('admin.order.processing', ['orders' => $processing_orders]);
    }
    public function out_of_delivery_orders()
    {
        $out_of_delivery_orders = Order::whereStatus(2)->orderby('id','desc')->paginate(10);
        return view('admin.order.out-of-delivery', ['orders' => $out_of_delivery_orders]);
    }
    public function done_orders()
    {
        $done_orders = Order::whereStatus(3)->orderby('id','desc')->paginate(10);
        return view('admin.order.done', ['orders' => $done_orders]);
    }
}
