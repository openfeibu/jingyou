<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;
use Tree;
/**
 * Resource controller class for page.
 */
class ProductCategoryResourceController extends BaseController
{
    /**
     * Initialize category resource controller.
     *
     * @param type ProductCategoryRepositoryInterface $category
     *
     */
    public function __construct(ProductCategoryRepositoryInterface $category)
    {
        parent::__construct();
        $this->repository = $category;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageCategoryResourceCriteria::class);
    }

    public function index(Request $request)
    {
        if ($this->response->typeIs('json'))
        {
            $categories = $this->repository
                ->categories()->toArray();
            return $this->response
                ->success()
                ->data($categories)
                ->output();
        }
        return $this->response->title(trans('app.category'))
            ->view('product.category.index', true)
            ->output();
    }
    public function show(Request $request, ProductCategory $category)
    {
        return $this->response->title(trans('app.view') . ' ' . trans('product.category.name'))
            ->data(compact('category'))
            ->view('product.category.show')
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $category = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('product.category.name')]))
                ->success()
                ->url(guard_url('product/category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/category/create'))
                ->redirect();
        }
    }
    public function update(Request $request,ProductCategory $category)
    {
        try {
            $attributes = $request->all();
            $category->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('product.category.name')]))
                ->success()
                ->url(guard_url('product/category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/category'))
                ->redirect();
        }
    }
    public function destroy(Request $request,ProductCategory $category)
    {
        try {
            $this->repository->forceDelete([$category->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.category.name')]))
                ->success()
                ->url(guard_url('product/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product/category'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.category.name')]))
                ->success()
                ->url(guard_url('product/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product/category'))
                ->redirect();
        }
    }
}