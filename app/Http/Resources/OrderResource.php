<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'=> $this->id,
            'custommer_id'=>$this->custommer_id,
            'custommer_name'=>$this->custommer->name,
            'custommer_email'=>$this->custommer->email,
            'custommer_phone'=>$this->custommer->phone,
            'custommer_address'=>$this->custommer->address,
            'date'=>$this->date,
            'address'=>$this->address,
            'status'=>$this->status,
            'phone'=>$this->phone,
            'name'=>$this->name,
            'total_price'=>$this->total_price,
        ];
    }
}
