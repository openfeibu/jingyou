<?php

namespace App\Repositories\Presenter;

use App\Repositories\Presenter\FractalPresenter;

class QuestionListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \App\Repositories\Eloquent\Presenter\QuestionListTransformer
     */
    public function getTransformer()
    {
        return new QuestionListTransformer();
    }
}
