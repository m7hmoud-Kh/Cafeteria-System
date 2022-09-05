<?php

namespace App\Http\Controllers\admin;
use App\Models\Order;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\trait\OrderNotificationTrait;
use App\Models\TransactionOrder;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;


class UsersOrderController extends Controller
{
    use OrderNotificationTrait;
    public function index()
    {
        $orders = Order::orderBy('created_at','desc')->get();
        $usersUnique = $orders->unique(['user_id']);  //get uniqe user to display in selector
        return view('admin.orders.orders',compact('orders','usersUnique'));
    }


    public function update(Request $request, FlasherInterface $flasher){
        $order = Order::find($request->order_id);
        $order->update([
            'status' => $request->next_status
        ]);
        TransactionOrder::create([
            'order_id' => $request->order_id,
            'status' => $request->next_status
        ]);


        if($request->next_status == 2){
            foreach($order->products as $product){
                $pro = Product::find($product->pivot->product_id);
                $pro->quantity -= $product->pivot->quantity;
                $pro->save();
            }
        }

        $data = [
            'next_status' => $order->next_status($request->next_status),
            'order_ref_id' => $order->ref_id,
        ];
        $this->send_notification_order_to_specifi_user($order->user->id,$data);

        $flasher->addSuccess("Order Change Status Successfully");
        
        return redirect()->route('orders');
    }

    public function select(Request $request){
        $from = date($request->datefrom);
        $to = date($request->dateto);
        $user = $request->user_id;

        if($user != 'null' && $from == '' && $to == '' ){
            $orders = Order::where('user_id',$user)->orderBy('created_at','desc')->get();

        }elseif($from != '' && $to != '' && $user != 'null'){

        $orders = Order::whereBetween('created_at', [$from, $to])->where('user_id',$user)->orderBy('created_at','desc')->get();
        }
        elseif($from != '' && $to != '' && $user == 'null'){
            $orders = Order::whereBetween('created_at', [$from, $to])->orderBy('created_at','desc')->get();
        }else{
            $orders = Order::orderBy('created_at','desc')->get();
        }

        $allorders = Order::all();
        $usersUnique = $allorders->unique(['user_id']);  //get uniqe user to display in selector
        return view('admin.orders.orders',compact('orders','usersUnique'));
    }
}
