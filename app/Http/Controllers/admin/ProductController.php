<?php


namespace App\Http\Controllers\admin;
use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\trait\ImageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;


class ProductController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();

        $data = [
            'products' => $products
        ];
        return view("admin.products.index",compact('data'));
    }
    /**
     *  the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        $tags = Tag::select('id','name')->get();
        return view("admin.products.create",[
            "categories"=>$categories,
            "tags" => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        $data['image'] = $this->insertImage($request->name,$request->image,'Product_image/');
        $product = Product::create($data);
        $product->tags()->syncWithoutDetaching($request->tags);
        return redirect()->route('products.index')->with([
            'message' => 'Product Added Successfully',
            'alert' => 'success'
        ]);
    }

    /**
     *  the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id','name')->get();
        $tags = Tag::select('id','name')->get();

        return view("admin.products.edit",
        ["product"=>$product,
        "categories"=>$categories,
        "tags" => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data= $request->all();
        if($request->file("image")){
            Storage::disk('product_image')->delete($product->image);
            $data['image'] = $this->insertImage($request->name,$request->image,'Product_image/');
        }
        // $product->tags()->delete();
        $product->update($data);
        $product->tags()->sync($request->tags);

        return redirect()->route('products.index')->with([
            'message' => 'Product Updated Successfully',
            'alert' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        if($product){
            Storage::disk('product_image')->delete($product->image);
            $product->delete();
        }
        return redirect()->route('products.index')->with([
            'message' => 'Product Deleted Successfully',
            'alert' => 'danger'
        ]);
    }

}
