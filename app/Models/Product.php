<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','desc','thumb','price','qty','discount','sale_price','cate_id'];

     /**
     * get category
     * @return Array category
     */
    public function category(){
        return $this->belongsTo(Category::class,'cate_id');
    }

    
}
