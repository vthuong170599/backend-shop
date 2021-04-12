<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'cate_id'=>$this->cate_id,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'category'=>$this->category->name,
            'categories'=>$this->category,
            'thumb'=>$this->thumb,
            'qty'=>$this->qty,
            'sale_price'=>$this->sale_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
