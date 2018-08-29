<?php

namespace App\Repositories\Presenter;

use App\Repositories\Presenter\FractalPresenter;

class ProductListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \App\Repositories\Eloquent\ProductListTransformer
     */
    public function getTransformer()
    {
        return new ProductListTransformer();
    }
}
