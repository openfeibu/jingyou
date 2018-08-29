<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\PCaseRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class PCaseRepository extends BaseRepository implements PCaseRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.case.case.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.case.case.model');
    }

}
