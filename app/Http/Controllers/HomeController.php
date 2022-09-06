<?php
namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::WhereHas('product' ,function($query) {
            $query->where('status', true);
        })->select('id','name')->get();

        $tags = Tag::WhereHas('products',function($q){
            $q->whereStatus(true)->where('quantity' , '>=' , '1');
        })->select('id','name')->get();

        $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')->select('id','name','image','price')->get();
        $catid = false;
        return view('website.index',compact('categories','tags','products','catid'));
    }
}
