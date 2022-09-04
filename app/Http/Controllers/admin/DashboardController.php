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
        $all_orders=Order::all();
        $num_all_order=count($all_orders);

        $orders_in_prossing=Order::where('status','=','1')->get();
        $num_prossing_order=count($orders_in_prossing);
        $in_persent_1=number_format(($num_prossing_order/$num_all_order)*100,2);


        $orders_out_of_delivery=Order::where('status','=','2')->get();
        $num_orders_out_of_delivery=count($orders_out_of_delivery);
        $in_persent_2=number_format(($num_orders_out_of_delivery/$num_all_order)*100,2);


        $orders_done=Order::where('status','=','3')->get();
        $num_orders_done=count($orders_done);
        $in_persent_3=number_format(($num_orders_done/$num_all_order)*100,2);

        $all_user_is_not_admin= User::where('isAdmin','!=','1')->get();
        $num_all_user_is_not_admin=count($all_user_is_not_admin);

        $all_admin= User::where('isAdmin','=','1')->get();
        $num_all_admin=count($all_admin);

        $categories = Category::WhereHas('product' ,function($query) {
            $query->where('status', true);
        })->get();
        $num_categories=count($categories);
 
        $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')->get();
        $num_products=count($products);


        return view('admin.home',["num_all_order"=>$num_all_order,"num_prossing_order"=>$num_prossing_order,
        "num_orders_out_of_delivery"=>$num_orders_out_of_delivery,"num_orders_done"=>$num_orders_done
        ,"in_persent_1"=>$in_persent_1,
        "in_persent_2"=>$in_persent_2,
        "in_persent_3"=>$in_persent_3,
        "num_all_user_is_not_admin"=>$num_all_user_is_not_admin,
        "num_all_admin"=>$num_all_admin,
        "num_categories"=>$num_categories,
        "num_products"=>$num_products
        ]);
    }
}
