<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['custommer_id','name','address','status','phone','date'];
    public function custommer(){
        return $this->belongsTo(Custommer::class,'custommer_id');
    }
}
