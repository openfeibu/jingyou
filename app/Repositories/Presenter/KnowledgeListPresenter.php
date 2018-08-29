<?php

namespace App\Repositories\Presenter;

use App\Repositories\Presenter\FractalPresenter;

class KnowledgeListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \App\Repositories\Eloquent\KnowledgeListTransformer
     */
    public function getTransformer()
    {
        return new KnowledgeListTransformer();
    }
}
