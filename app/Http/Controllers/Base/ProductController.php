<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Base\BaseController;
use Log;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Eloquent\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;

class ProductController extends BaseController
{
    public function __construct(ProductRepositoryInterface $product_repository,
                                ProductCategoryRepositoryInterface $product_category_repository)
    {
        parent::__construct();
        $this->product_repository = $product_repository;
        $this->product_category_repository = $product_category_repository;
        $this->view_prefix = 'product.';
    }
    public function home(Request $request)
    {
        $this->product_categories = $this->product_category_repository->categories();
        foreach ($this->product_categories as $key=> $category) {

            $this->product_categories[$key]['products'] = $this->product_repository
                ->setPresenter(\App\Repositories\Presenter\ProductListPresenter::class)
                ->where(['category_id' => $category['id']])
                ->orderBy('order','asc')
                ->take(2)
                ->all()['data'];
        }
        return $this->response->title('产品中心')
            ->data(['product_categories' => $this->product_categories])
            ->view($this->view_prefix.'home', true)
            ->output();
    }
    public function category(Request $request,$slug)
    {
        $category = $this->product_category_repository->findBySlug($slug);
        $where['category_id'] = $category->id ;
        $search = $request->input('search','');
        if($search)
        {
            $where['title'] = ['title','like','%'.$search.'%'];
        }
        $products = $this->product_repository
            ->where($where)
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->paginate(12);

        return $this->response->title($category->name)
            ->data(compact('category','products','search'))
            ->view($this->view_prefix.'category.show', true)
            ->output();
    }
    public function productShow(Request $request,Product $product)
    {
        $category = $this->product_category_repository->find($product->category_id);
        return $this->response->title($product->title)
            ->data(compact('category','product'))
            ->view($this->view_prefix.'show', true)
            ->output();
    }
}
