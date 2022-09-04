<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;

class MyOrderController extends Controller
{
    public function index()
    {
         $orders = Order::where('user_id', Auth()->user()->id)->orderBy('created_at','desc')->get();
         return view('website.myorder',compact('orders'));

    }

    public function selectdate(Request $request)
    {

    // $orders = Order::whereBetween('created_at',[$request->datefrom.'00:00:00',$request->dateto.'23:59:59'])->get();
    $from = date($request->datefrom);
    $to = date($request->dateto);
    $orders = Order::whereBetween('created_at', [$from, $to])->where('user_id', Auth()->user()->id)->orderBy('created_at','desc')->get();


       return view('website.myorder',compact('orders'));
  
    }

    public function destroy(Request $request)
    {
        $order = Order::find($request -> id);
   
         $order->delete();
         return redirect()->route('myorder');
    
    }

 
}
