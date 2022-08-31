<?php


namespace App\Http\Controllers\admin;
namespace App\Http\Controllers;
use App\Models\Product;
// use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view("admin.products.index", ["products"=>$products]);
    }
    /**
     *  the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
    return view("admin.products.create",/*["categories"=>$categories]*/);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // $image = $request->file("image");
        // if($image){
        //     $imageName=implode(".",[date('YmdHis'),$data["name"], $image->getClientOriginalExtension()]);
        //     $destPath ="assets/admin/productsimages/";
        //     //public\assets\admin\productsimages
        //     $image->move($destPath, $imageName);
        //     $data["image"] = $imageName;
        // }
        Product::create($data);
        return to_route("products.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     *  the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view("admin.products.edit", ["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $oldData= $request->all();
        if($request->file("image")){
            $this->deleteImage($product);
            $newImage= $request->file("image");
            $imageName=implode(".",
                [date('YmdHis'),$oldData["name"], $newImage->getClientOriginalExtension()]);
            $destPath ="assets/admin/productsimages/";
            $newImage->move($destPath, $imageName);
            $oldData["image"] = $imageName;
        }
        $product->update($oldData);
        return to_route("products.index", $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(File::exists(public_path("assets/admin/productsimages/$product->image")))
        {
            File::delete(public_path("assets/admin/productsimages/$product->image"));
        }
        $product->delete();
        return to_route("products.index");
    }

    private function  deleteImage(Product $product){
        if(File::exists(public_path("assets/admin/productsimages/$product->image"))){
            File::delete(public_path("assets/admin/productsimages/$product->image"));
        }
    }
}
