<?php
namespace App\Http\Controllers\website;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\TransactionOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\website\StoreOrderRequest;
use App\Http\trait\ImageTrait;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
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
        return view("website.category",["category"=>$category,"categories"=>$categories,"products"=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
    }
}
