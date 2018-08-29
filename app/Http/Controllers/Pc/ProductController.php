<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Base\ProductController as BaseProductController;
use Log;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Eloquent\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;

class ProductController extends BaseProductController
{
    public function __construct(ProductRepositoryInterface $product_repository,
                                ProductCategoryRepositoryInterface $product_category_repository)
    {
        parent::__construct($product_repository,$product_category_repository);

    }
    public function home(Request $request)
    {
        return parent::home($request);
    }
    public function category(Request $request,$slug)
    {
        return parent::category($request,$slug);
    }
    public function productShow(Request $request,Product $product)
    {
        return parent::productShow($request,$product);
    }
}
