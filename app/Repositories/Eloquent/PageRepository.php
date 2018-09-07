<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.page.page.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.page.page.model');
    }

    /**
     * Get page by id or slug.
     *
     * @return void
     */
    public function getPage($var)
    {
        return $this->findBySlug($var);
    }
    public function getPages($category_id,$number=10,$order='desc')
    {
        return $this->where(['category_id' => $category_id])->orderBy('order','asc')->orderBy('id',$order)->take($number)->all();
    }
    public function getAllPages($category_id,$order='desc')
    {
        return $this->where(['category_id' => $category_id])->orderBy('order','asc')->orderBy('id',$order)->all();
    }
    public function getAllPagesByCategorySlug($category_slug,$order='desc')
    {
        $category = app('App\Repositories\Eloquent\PageCategoryRepository')->findBySlug($category_slug);
        return $this->getAllPages($category['id'],$order);
    }
    public function getPagesByCategorySlug($category_slug,$number=10,$order='desc')
    {
        $category = app('App\Repositories\Eloquent\PageCategoryRepository')->findBySlug($category_slug);
        return $this->getPages($category['id'],$number,$order);
    }
}
