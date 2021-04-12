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
    
     /**
     * get model
     * @return string
     */
    public function getAll(){
        $product = $this->getModel()::with('category')->paginate(10);
        return $product;
    }

     /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id){
        $product = $this->getModel()::with('category')->find($id);
        return $product;
    }

    /**
     * search
     * @param String fileds keyword
     * @return Array 
     */
    public function search($field,$keyword){
        return $this->getModel()::where($field, 'like', "%{$keyword}%")->with('category')->get();
    }

    /**
     * get product by category
     * @param int $id
     * @return Array 
     */
    public function getProductByCategory($id){
        return $this->getModel()::where('cate_id',$id)->get();
    }
}