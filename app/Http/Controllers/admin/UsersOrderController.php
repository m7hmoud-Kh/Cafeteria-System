<?php

namespace App\Http\Controllers\admin;
use App\Models\Order;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersOrderController extends Controller
{
    public function index()
    {
         $orders = Order::orderBy('created_at','desc')->get();
         $usersUnique = $orders->unique(['user_id']);  //get uniqe user to display in selector
        return view('admin.orders.orders',compact('orders','usersUnique'));
    }


    public function update(Request $request){
    
        $order_id = $request->id;
        $order_status = $request->status;
        $order = Order::find($order_id);
        $order->update([
            'status' =>  $order_status,
        ]);

       // if($order_status == 3){
       // foreach($order->products as $product){
       // $pro_id = $product->pivot->product_id;
       // $pro = Product::find($pro_id);
       // $pro -> quantity -= $product->pivot->quantity;
      //  $pro ->save();
     //  }

    //  }
      return redirect()->route('orders');
    }

    public function select(Request $request)
    {
      
    $from = date($request->datefrom);
    $to = date($request->dateto);
    $user = $request->user_id;

   if($user != 'null' && $from == '' && $to == '' ){ 
       $orders = Order::where('user_id',$user)->orderBy('created_at','desc')->get();
   
   }

    elseif($from != '' && $to != '' && $user != 'null'){

     $orders = Order::whereBetween('created_at', [$from, $to])->where('user_id',$user)->orderBy('created_at','desc')->get();
   }
   elseif($from != '' && $to != '' && $user == 'null'){
    $orders = Order::whereBetween('created_at', [$from, $to])->orderBy('created_at','desc')->get();
   }
  else{
        $orders = Order::orderBy('created_at','desc')->get();
   }
  
     $allorders = Order::all();
     $usersUnique = $allorders->unique(['user_id']);  //get uniqe user to display in selector
     return view('admin.orders.orders',compact('orders','usersUnique'));
  
    }
}
