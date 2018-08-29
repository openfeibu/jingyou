<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Page;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;
use App\Http\Requests\PageRequest;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class HomeResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type PageRepositoryInterface $page
     *
     */
    public function __construct(PageRepositoryInterface $page,
                                PageCategoryRepositoryInterface $category_repository)
    {
        parent::__construct();
        $this->repository = $page;
        $this->category_repository = $category_repository;
    }
    public function index(PageRequest $request,$slug){
        $category = $this->category_repository->findBySlug($slug);

        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->where(['category_id' => $category->id])
                ->setPresenter(\App\Repositories\Presenter\PageListPresenter::class)
                ->orderBy('order','asc')
                ->orderBy('id','asc')
                ->all();
            return $this->response
                ->success()
                ->data($data['data'])
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->data(compact('category','slug'))
            ->view('page.home.index')
            ->output();
    }
    public function create(PageRequest $request,$slug)
    {
        $page = $this->repository->newInstance([]);
        $category = $this->category_repository->findBySlug($slug);

        return $this->response->title(trans('app.admin.panel'))
            ->view('page.home.create')
            ->data(compact('page','category','slug'))
            ->output();
    }
    public function store(PageRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['recommend_type'] = isset($attributes['home_recommend']) && $attributes['home_recommend'] == 'on' ? 'home' : "";
            $category = $this->category_repository->find($attributes['category_id']);
            $page = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => $category['name']]))
                ->code(0)
                ->status('success')
                ->url(guard_url('home/'.$category['slug']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('home/'.$category['slug']))
                ->redirect();
        }
    }
    public function show(PageRequest $request,$slug,Page $page)
    {
        if ($page->exists) {
            $view = 'page.home.show';
        } else {
            $view = 'page.home.create';
        }
        $category = $this->category_repository->find($page['category_id']);
        return $this->response->title(trans('app.view') . ' ' . $page['title'])
            ->data(compact('page','category'))
            ->view($view)
            ->output();
    }
    public function update(PageRequest $request,$slug,Page $page)
    {
        try {
            $attributes = $request->all();
            $attributes['recommend_type'] = isset($attributes['home_recommend']) && $attributes['home_recommend'] == 'on' ? 'home' : "";
            $category = $this->category_repository->find($page['category_id']);
            $page->update($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' =>$page['title']]))
                ->code(0)
                ->status('success')
                ->url(guard_url('home/'.$category['slug']))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('home/'.$category['slug'] ))
                ->redirect();
        }
    }
    public function destroy(PageRequest $request,$slug,Page $page)
    {
        try {
            $this->repository->forceDelete([$page->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => $page['title']]))
                ->status("success")
                ->code(202)
                ->url(guard_url('home/'.$slug))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('home/'.$slug))
                ->redirect();
        }
    }
    public function destroyAll(PageRequest $request,$slug)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);
            $category = $this->category_repository->findBySlug($slug);
            return $this->response->message(trans('messages.success.deleted', ['Module' => $category['name']]))
                ->status("success")
                ->code(202)
                ->url(guard_url('home/'.$slug))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('home/'.$slug))
                ->redirect();
        }
    }


}