<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\admin\CategorydController;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image',
    ];
    use HasFactory;
    
    function product(){
        return $this->hasMany(Product::class);
    }
}
