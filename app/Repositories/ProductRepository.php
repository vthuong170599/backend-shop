<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }
    
    public function getAll(){
        $product = $this->getModel()::with('category')->paginate(5);
        return $product;
    }

    public function find($id){
        $product = $this->getModel()::with('category')->find($id);
        return $product;
    }

    public function search($fields,$keyword){
        return $this->getModel()::where($fields, 'like', "%{$keyword}%")->with('category')->get();
    }
}