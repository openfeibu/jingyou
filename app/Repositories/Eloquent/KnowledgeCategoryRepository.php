<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\KnowledgeCategoryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class KnowledgeCategoryRepository extends BaseRepository implements KnowledgeCategoryRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.knowledge.category.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.knowledge.category.model');
    }

    public function categories()
    {
        return $this->orderBy('order','asc')
            ->orderBy('id','asc')
            ->all()
            ->toArray();
    }
}
