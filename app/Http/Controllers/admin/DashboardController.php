<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){

        $orders_in_prossing = 0;
        $orders_out_of_delivery =0;
        $orders_done = 0;
        $all_orders=Order::count();
        $all_orders=$all_orders ? $all_orders : 1;
        if ($all_orders){

        $orders_in_prossing=Order::where('status','1')->count();
        
        $orders_out_of_delivery=Order::where('status','2')->count();

        $orders_done=Order::where('status','3')->count();
        }
        $orders_count = ($orders_in_prossing + $orders_out_of_delivery + $orders_done) ?null : 'zero';

        $all_user_is_not_admin= User::whereNull('isAdmin')->count();

        $all_admin= User::where('isAdmin',1)->count();
        
        $categories = Category::WhereHas('product' ,function($query) {
            $query->where('status', true);
        })->count();
    
 
        $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')->count();
       


        return view('admin.home',["all_orders"=>$all_orders,"orders_in_prossing"=>$orders_in_prossing,
        "orders_out_of_delivery"=>$orders_out_of_delivery,"orders_done"=>$orders_done,
        "all_user_is_not_admin"=>$all_user_is_not_admin,
        "all_admin"=>$all_admin,
        "categories"=>$categories,
        "products"=>$products,
        'orders_count'=>$orders_count
        ]);
    }
}
