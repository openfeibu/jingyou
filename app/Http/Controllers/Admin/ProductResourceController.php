<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;
use App\Models\Product;

/**
 * Resource controller class for product.
 */
class ProductResourceController extends BaseController
{

    /**
     * Initialize product resource controller.
     *
     * @param type ProductRepositoryInterface $product
     * @param type ProductCategoryRepositoryInterface $category_repository
     */
    public function __construct(ProductRepositoryInterface $product,
                                ProductCategoryRepositoryInterface $category_repository)
    {
        parent::__construct();
        $this->repository = $product
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
        $this->category_repository = $category_repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
    }

    /**
     * Display a list of product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        $category_id = $request->input('category_id','');
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->with(['category'])
                ->setPresenter(\App\Repositories\Presenter\ProductListPresenter::class)
                ->orderBy('order','asc')
                ->orderBy('id','desc')
                ->getDataTable($limit);

            return $this->response
                ->success()
                ->count($data['recordsTotal'])
                ->data($data['data'])
                ->output();
        }
        $categories = $this->category_repository->categories();
        return $this->response->title(trans('product.name'))
            ->data(compact('categories','category_id'))
            ->view('product.index', true)
            ->output();
    }

    /**
     * Display product.
     *
     * @param Request $request
     * @param Product   $product
     *
     * @return Response
     */
    public function show(Request $request, Product $product)
    {

        if ($product->exists) {
            $view = 'product.show';
        } else {
            $view = 'product.new';
        }
        $categories = $this->category_repository->categories();
        return $this->response->title(trans('app.view') . ' ' . trans('product.name'))
            ->data(compact('product','categories'))
            ->view($view)
            ->output();
    }

    /**
     * Show the form for creating a new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {

        $product = $this->repository->newInstance([]);
        $categories = $this->category_repository->categories();

        return $this->response->title(trans('app.new') . ' ' . trans('product.name'))
            ->view('product.create', true) 
            ->data(compact('product','categories'))
            ->output();
    }

    /**
     * Create new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $attributes              = $request->all();

            $product                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('product.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('product/product/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/product'))
                ->redirect();
        }

    }

    /**
     * Update the product.
     *
     * @param Request $request
     * @param Product   $product
     *
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $attributes = $request->all();

            $product->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('product.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('product/product/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/product/'))
                ->redirect();
        }

    }

    /**
     * Remove the product.
     *
     * @param Request $request
     * @param Product   $product
     *
     * @return Response
     */
    public function destroy(Request $request, Product $product)
    {
        try {

            $product->forceDelete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.name')]))
                ->status('success')
                ->code(202)
                ->url(guard_url('product/product/'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/product/'))
                ->redirect();
        }

    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('product/product'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product/product'))
                ->redirect();
        }
    }


}