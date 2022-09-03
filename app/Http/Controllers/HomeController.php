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
        $tags=Tag::all();
        $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')->select('id','name','image','price')->get();

        return view('website.index',["categories"=>$categories, "tags"=>$tags,"products"=>$products]);
    }
}
