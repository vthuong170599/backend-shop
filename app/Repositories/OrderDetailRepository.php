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

    public function getAll()
    {
        return $this->getModel()::with(['product','order'])->paginate(5);
    }
}