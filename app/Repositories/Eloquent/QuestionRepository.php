<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\QuestionRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.question.question.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.question.question.model');
    }

}
