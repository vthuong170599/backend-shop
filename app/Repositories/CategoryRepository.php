<?php
namespace App\Repositories;

use App\Http\Resources\CategoryResource;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Category::class;
    }
}