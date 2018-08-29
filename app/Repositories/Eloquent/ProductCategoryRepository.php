<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.product.category.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.product.category.model');
    }

    public function categories()
    {
        $categories =  $this->orderBy('order','asc')
            ->orderBy('id','asc')
            ->all();
        foreach ($categories as $category) {
            $category->image = url('image/original/'.$category->image);
        }
        return $categories;
    }
}
