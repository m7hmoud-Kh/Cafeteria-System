<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_id',
        'user_id',
        'notes',
        'phone',
        'sub_total',
        'tax',
        'total',
        'status'
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'order_product')->withPivot('quantity');
    }

    public function transaction(){
        return $this->hasMany(TransactionOrder::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
