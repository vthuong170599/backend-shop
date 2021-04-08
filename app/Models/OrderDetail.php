<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * get product
     * @return Array product
     */
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

     /**
     * get order
     * @return Array order
     */
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
