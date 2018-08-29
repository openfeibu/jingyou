<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\KnowledgeRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class KnowledgeRepository extends BaseRepository implements KnowledgeRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.knowledge.knowledge.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.knowledge.knowledge.model');
    }

}
