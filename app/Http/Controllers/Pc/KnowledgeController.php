<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Base\KnowledgeController as BaseKnowledgeController;
use Log;
use Illuminate\Http\Request;
use App\Models\Knowledge;
use App\Repositories\Eloquent\KnowledgeRepositoryInterface;
use App\Repositories\Eloquent\KnowledgeCategoryRepositoryInterface;

class KnowledgeController extends BaseKnowledgeController
{
    public function __construct(KnowledgeRepositoryInterface $knowledge_repository,
                                KnowledgeCategoryRepositoryInterface $knowledge_category_repository)
    {
        parent::__construct($knowledge_repository,$knowledge_category_repository);
    }
    public function home(Request $request)
    {
        return Parent::home($request);
    }

}

