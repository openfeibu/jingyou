<?php

namespace App\Repositories\Presenter;

use App\Repositories\Presenter\FractalPresenter;

class PCaseListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \App\Repositories\Eloquent\PCaseListTransformer
     */
    public function getTransformer()
    {
        return new PCaseListTransformer();
    }
}
