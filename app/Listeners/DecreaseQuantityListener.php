<?php

namespace App\Listeners;

use App\Models\Product;
use App\Events\DecreaseQuantityEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DecreaseQuantityListener
{
    
    public function handle(DecreaseQuantityEvent $event)
    {
        foreach($event->order->products as $product){
            $pro = Product::find($product->pivot->product_id);
            $pro->quantity -= $product->pivot->quantity;
            $pro->save();
        }
    }
}
