<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class OrderDetailRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\OrderDetail::class;
    }

     /**
     * get model
     * @return string
     */
    public function getAll()
    {
        return $this->getModel()::with(['product','order'])->paginate(5);
    }

    /**
     * show by order id
     * @param Integer id order
     * @return Array order detail
     */
    public function showByOrderId($orderId){
       return $this->getModel()::with('product')->where('order_id',$orderId)->get();
    }
}