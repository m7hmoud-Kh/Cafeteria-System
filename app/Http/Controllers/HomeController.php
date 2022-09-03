<?php
namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::WhereHas('product' ,function($query) {
            $query->where('status', true);
        })->select('id','name')->get();

        $tags = Tag::all();

        // $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')->select('id','name','image','price')->paginate(5);
        $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')->select('id','name','image','price')->get();
        // $products = Product::paginate(15);
        // dd($categories);
        // dd($products);
        return view('website.index',
        compact('categories','tags','products'));
        // ["categories"=>$categories,"tags"=>$tags,"products"=>$products]);
    }
}
