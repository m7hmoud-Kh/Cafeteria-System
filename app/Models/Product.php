<?php

namespace App\Models;

use App\Http\trait\FormatPriceTrait;
use App\Models\Tag;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory , FormatPriceTrait;
    protected $fillable = ["name","price","size",'status',"quantity","image","category_id"];

    /**one to many **/
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    /**many to many */

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tag');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_product');
    }

    /** make mutation */



    /**get Size */
    public function Size($value){
        switch ($value) {
            case '1':
                return 'Small';
            case '2':
                return 'Medium';
            case '3':
                return 'Large';
            default:
                break;
        }
    }
    /**get bage of Success */
    public function status($value){
        return  $value ? '<span class="badge badge-success">Avilable</span>' : '<span class="badge badge-danger">Unavilable</span>';
    }

}
