<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\KnowledgeCategoryRepositoryInterface;
use App\Models\KnowledgeCategory;
use Tree;
/**
 * Resource controller class for page.
 */
class KnowledgeCategoryResourceController extends BaseController
{
    /**
     * Initialize category resource controller.
     *
     * @param type KnowledgeCategoryRepositoryInterface $category
     *
     */
    public function __construct(KnowledgeCategoryRepositoryInterface $category)
    {
        parent::__construct();
        $this->repository = $category;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageCategoryResourceCriteria::class);
    }

    public function index(Request $request)
    {
        if ($this->response->typeIs('json'))
        {
            $categories = $this->repository->categories();
            return $this->response
                ->success()
                ->data($categories)
                ->output();
        }
        return $this->response->title(trans('app.category'))
            ->view('knowledge.category.index', true)
            ->output();
    }

    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $category = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('knowledge.category.name')]))
                ->success()
                ->url(guard_url('knowledge/category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('knowledge/category/create'))
                ->redirect();
        }
    }
    public function update(Request $request,KnowledgeCategory $category)
    {
        try {
            $attributes = $request->all();
            $category->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('knowledge.category.name')]))
                ->success()
                ->url(guard_url('knowledge/category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('knowledge/category'))
                ->redirect();
        }
    }
    public function destroy(Request $request,KnowledgeCategory $category)
    {
        try {
            $this->repository->forceDelete([$category->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('knowledge.category.name')]))
                ->success()
                ->url(guard_url('knowledge/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('knowledge/category'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('knowledge.category.name')]))
                ->success()
                ->url(guard_url('knowledge/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('knowledge/category'))
                ->redirect();
        }
    }
}