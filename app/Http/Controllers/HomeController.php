<?php

namespace App\Http\Controllers;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\ProductController;
use App\Models\Category; 
use App\Models\Tag; 
use App\Models\Product; 

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $tags=Tag::all();
        $products = Product::all();
        return view('website.index',["categories"=>$categories, "tags"=>$tags,"products"=>$products]);
    }
}
