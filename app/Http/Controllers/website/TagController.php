<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Request $request){


        $tags = Tag::WhereHas('products',function($q){
            $q->whereStatus(true)->where('quantity' , '>=' , '1');
        })->select('id','name')->get();

        $tag = Tag::find($request->id);

        $data = [
            'tag' => $tag,
            'tags' => $tags,
            'tagid' => $request->id
        ];

        return view('website.tag',compact('data'));


    }
}
