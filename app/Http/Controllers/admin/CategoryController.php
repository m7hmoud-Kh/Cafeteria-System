<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories=Category::all();
       return view("admin.category.index",["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("admin.category.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required"
            
        ]);
        
        $inputdata = $request->all();
        $inputdata->file("image");
        if($image){
            $imagename=implode(".",
                [date('YmdHis'),$inputdata["title"], $image->getClientOriginalExtension()]);
            $dstentaiton_path ="categoryimage/";
            $image->move($dstentaiton_path, $imagename);
            $inputdata["image"] = $imagename;
        }
        Category::create($inputdata);
        return to_route("admin.category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("admin.category.show",["category"=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.category.edit",["category"=>$category]);
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
        $inputdata=$request->all();
        $inputdata->file("image");
        if ($request->file("image")) {
            $this->deleteImage($category);
            $new_image = $request->file("image"); 
          
            $imagename = implode(".",
                [date('YmdHis'), $inputdata["title"], $new_image->getClientOriginalExtension()]);
           
            $dstentaiton_path = "categoryimage/";
            $new_image->move($dstentaiton_path, $imagename);
            $inputdata["image"] = $imagename;
        }
        $category->update($inputdata);
        return to_route("admin.category.show", $category->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route("admin.category.index");
    }
}
