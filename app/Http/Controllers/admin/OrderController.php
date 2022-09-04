<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use GuzzleHttp\Psr7\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::select('id','ref_id','notes','phone','sub_total','tax','total','status','created_at')->paginate(10);
        return view('admin.order.index',compact('orders'));
    }

    public function show(Order $order){
        
        return view('admin.order.show');
    }
}
