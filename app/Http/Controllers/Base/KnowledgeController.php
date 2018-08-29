<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Base\BaseController;
use Log;
use Illuminate\Http\Request;
use App\Models\Knowledge;
use App\Repositories\Eloquent\KnowledgeRepositoryInterface;
use App\Repositories\Eloquent\KnowledgeCategoryRepositoryInterface;

class KnowledgeController extends BaseController
{
    public function __construct(KnowledgeRepositoryInterface $knowledge_repository,
                                KnowledgeCategoryRepositoryInterface $knowledge_category_repository)
    {
        parent::__construct();
        $this->knowledge_repository = $knowledge_repository;
        $this->knowledge_category_repository = $knowledge_category_repository;
        $this->view_prefix = 'knowledge.';
    }
    public function home(Request $request)
    {
        $this->knowledge_categories = $this->knowledge_category_repository->categories();
        $this->knowledge_list = $this->knowledge_repository;
        $category_id = $request->input('category_id');
        $search = $request->input('search');
        if($request->input('search'))
        {
            $this->knowledge_list = $this->knowledge_list->where(['title' => ['title','like','%'.$search.'%']]);
        }
        if($category_id)
        {
            $this->knowledge_list = $this->knowledge_list->where(['category_id' => $category_id]);
        }
        $this->knowledge_list = $this->knowledge_list->orderBy('order','asc')
            ->orderBy('id','desc')
            ->paginate(10);

        return $this->response->title('精油学院')
            ->data([
                'knowledge_categories' => $this->knowledge_categories,
                'knowledge_list' => $this->knowledge_list,
                'category_id' => $category_id,
                'search' => $search,
            ])
            ->view($this->view_prefix.'home', true)
            ->output();
    }

    public function show(Request $request,Knowledge $knowledge)
    {
        $knowledge->increment('views');
        $category = $this->knowledge_category_repository->find($knowledge->category_id);
        $previous = $this->knowledge_repository
            ->where([['id','<',$knowledge->id]])
            ->where(['category_id' => $knowledge->category_id])
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->first();
        $next = $this->knowledge_repository
            ->where([['id','>',$knowledge->id]])
            ->where(['category_id' => $knowledge->category_id])
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->first();
        return $this->response->title($knowledge->title)
            ->data(compact('category','knowledge','previous','next'))
            ->view($this->view_prefix.'show', true)
            ->output();
    }

}

