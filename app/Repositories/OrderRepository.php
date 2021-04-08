<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Order::class;
    }

    /**
     * get All User
     * @return Array Order and custommer
     */
    public function getAll()
    {
        $order = $this->getModel()::with('custommer')->paginate(5);
        return $order;
    }

     /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id){
        return $this->getModel()::with('custommer')->find($id);
    }
}
