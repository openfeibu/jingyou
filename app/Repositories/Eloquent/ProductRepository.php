<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ProductRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.product.product.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.product.product.model');
    }
    public function relation($category_id,$limit=4)
    {
        return $this->where(['category_id' => $category_id])->orderBy('id','desc')->take($limit)->all();
    }

}
