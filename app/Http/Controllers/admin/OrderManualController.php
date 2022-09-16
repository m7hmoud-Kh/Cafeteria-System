<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use App\Http\trait\CheckoutTrait;
use App\Http\trait\OrderNotificationTrait;

class OrderManualController extends Controller
{
    use OrderNotificationTrait , CheckoutTrait;


    public function index(Request $request)
    {

        $users = User::whereNull('isAdmin')->get();
        $data = [
            'users' => $users
        ];
        return view('admin.order-manual.index', compact('data'));
    }

    public function store_user_id(Request $request)
    {
        $request->session()->put('user_id', $request->user_id);
        return redirect()->route('fill-cart');
    }

    public function fill_cart()
    {
        $products = Product::whereStatus(true)->where('quantity', '>=', '1')->select('id', 'name', 'image', 'price')->orderby('name')->paginate(10);

        $data = [
            'products' => $products,
        ];
        return view('admin.order-manual.shopping', compact('data'));
    }

    public function checkout_details(Request $request)
    {
        $carts = Cart::where('user_id', $request->session()->get('user_id'))->latest()->get();
        $data = [
            'carts' => $carts,
        ];
        return view('admin.order-manual.checkout-details', compact('data'));
    }

    public function place_order(Request $request, FlasherInterface $flasher)
    {

        $all_prices = $this->calc_total_tax($request->session()->get('user_id'));
        $user = User::find($request->session()->get('user_id'));

        $order = Order::create([
            'user_id' => $request->session()->get('user_id'),
            'ref_id' => 'Admin_' . $user->name . '_' . Carbon::now(),
            'sub_total' => $all_prices['sub_total'],
            'tax' => $all_prices['tax'],
            'total' => $all_prices['total'],
            'notes' => $request->notes,
            'phone' => $request->phone
        ]);


        $all_item_in_cart = $this->put_products_in_order($order,$request->session()->get('user_id'));
        $this->destory_cart($all_item_in_cart);
        $this->add_transactionOrder($order);



        $data = [
            'next_status' => 'Processing',
            'order_ref_id' => $order->ref_id,
        ];

        $this->send_notification_order_to_specifi_user($request->session()->get('user_id'),$data);


        $flasher->addSuccess("Order Added with RefId: <br> $order->ref_id");
        return redirect()->route('orders');

    }


}
