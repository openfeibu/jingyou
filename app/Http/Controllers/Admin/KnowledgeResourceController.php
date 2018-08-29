<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\KnowledgeRepositoryInterface;
use App\Repositories\Eloquent\KnowledgeCategoryRepositoryInterface;
use App\Models\Knowledge;

/**
 * Resource controller class for knowledge.
 */
class KnowledgeResourceController extends BaseController
{

    /**
     * Initialize knowledge resource controller.
     *
     * @param type KnowledgeRepositoryInterface $knowledge
     * @param type KnowledgeCategoryRepositoryInterface $category_repository
     */
    public function __construct(KnowledgeRepositoryInterface $knowledge,
                                KnowledgeCategoryRepositoryInterface $category_repository)
    {
        parent::__construct();
        $this->repository = $knowledge
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
        $this->category_repository = $category_repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
    }

    /**
     * Display a list of knowledge.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        $category_id = $request->input('category_id','');
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->with(['category'])
                ->setPresenter(\App\Repositories\Presenter\KnowledgeListPresenter::class)
                ->orderBy('order','asc')
                ->orderBy('id','desc')
                ->getDataTable($limit);

            return $this->response
                ->success()
                ->count($data['recordsTotal'])
                ->data($data['data'])
                ->output();
        }
        $categories = $this->category_repository->categories();
        return $this->response->title(trans('knowledge.name'))
            ->data(compact('categories','category_id'))
            ->view('knowledge.index', true)
            ->output();
    }

    /**
     * Display knowledge.
     *
     * @param Request $request
     * @param Knowledge   $knowledge
     *
     * @return Response
     */
    public function show(Request $request, Knowledge $knowledge)
    {

        if ($knowledge->exists) {
            $view = 'knowledge.show';
        } else {
            $view = 'knowledge.new';
        }
        $categories = $this->category_repository->categories();
        return $this->response->title(trans('app.view') . ' ' . trans('knowledge.name'))
            ->data(compact('knowledge','categories'))
            ->view($view)
            ->output();
    }

    /**
     * Show the form for creating a new knowledge.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {

        $knowledge = $this->repository->newInstance([]);
        $categories = $this->category_repository->categories();

        return $this->response->title(trans('app.new') . ' ' . trans('knowledge.name'))
            ->view('knowledge.create', true) 
            ->data(compact('knowledge','categories'))
            ->output();
    }

    /**
     * Create new knowledge.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $attributes              = $request->all();

            $knowledge                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('knowledge.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('knowledge/knowledge/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('knowledge/knowledge'))
                ->redirect();
        }

    }

    /**
     * Update the knowledge.
     *
     * @param Request $request
     * @param Knowledge   $knowledge
     *
     * @return Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {
        try {
            $attributes = $request->all();

            $knowledge->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('knowledge.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('knowledge/knowledge/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('knowledge/knowledge/'))
                ->redirect();
        }

    }

    /**
     * Remove the knowledge.
     *
     * @param Request $request
     * @param Knowledge   $knowledge
     *
     * @return Response
     */
    public function destroy(Request $request, Knowledge $knowledge)
    {
        try {

            $knowledge->forceDelete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('knowledge.name')]))
                ->status('success')
                ->code(202)
                ->url(guard_url('knowledge/knowledge/'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('knowledge/knowledge/'))
                ->redirect();
        }

    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('knowledge.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('knowledge/knowledge'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('knowledge/knowledge'))
                ->redirect();
        }
    }


}