<?php

namespace App\Models;

use App\Http\trait\FormatPriceTrait;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory , FormatPriceTrait;

    const PROCESSING = 1;
    const OUT_OF_DELIVERY = 2;
    const DONE = 3;
    const TAX = 12;

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


    public function status($value){
        switch ($value) {
            case self::PROCESSING:
                return '<span class="badge badge-warning">Processing</span>';
            case self::OUT_OF_DELIVERY:
                return '<span class="badge badge-primary">Out of Delivery</span>';
            case self::DONE:
                return '<span class="badge badge-success">Done</span>';
            default:
                break;
        }
    }

    public function next_status($value){
        switch ($value) {
            case self::OUT_OF_DELIVERY:
                return 'Out of Delivery';
            case self::DONE:
                return 'Done';
            default:
                break;
        }
    }
}
