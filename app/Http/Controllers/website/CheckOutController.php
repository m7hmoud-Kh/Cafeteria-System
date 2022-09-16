<?php

namespace App\Http\Controllers\website;

use Carbon\Carbon;
use App\Models\Order;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\trait\OrderNotificationTrait;
use App\Jobs\SendNotificationForAdminsJob;
use App\Http\Requests\website\StoreOrderRequest;
use App\Http\trait\CheckoutTrait;

class CheckOutController extends Controller
{
    use OrderNotificationTrait , CheckoutTrait;


    public function store(StoreOrderRequest $request,FlasherInterface $flasher){

        $all_prices = $this->calc_total_tax(Auth()->user()->id);
        $order = Order::create([
            'user_id' => Auth()->user()->id,
            'ref_id' => Auth()->user()->name.'_'.Carbon::now(),
            'sub_total' => $all_prices['sub_total'],
            'tax' => $all_prices['tax'],
            'total' => $all_prices['total'],
            'notes' => $request->notes,
            'phone' => $request->phone
        ]);
        $all_item_in_cart = $this->put_products_in_order($order,Auth()->user()->id);
        $this->destory_cart($all_item_in_cart);
        $this->add_transactionOrder($order);

        SendNotificationForAdminsJob::dispatch($order,Auth::user()->name);

        $flasher->addSuccess("Make Successfully with:ref_id: $order->ref_id");

        return redirect()->route('myorder');
    }





}
