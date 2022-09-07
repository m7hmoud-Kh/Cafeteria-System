<?php
namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::WhereHas('product' ,function($query) {
            $query->where('status', true);
        })->select('id','name')->get();

        $products = Product::whereStatus(true)->where('quantity' , '>=' , '1')
        ->where('category_id','=',$category->id)
        ->select('id','name','image','price')
        ->get();

        return view("website.category",["category"=>$category,"categories"=>$categories,"products"=>$products ,"cat_id"=>$id]);
    }
}
