<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PCaseRepositoryInterface;
use App\Models\PCase;

/**
 * Resource controller class for case.
 */
class PCaseResourceController extends BaseController
{

    /**
     * Initialize case resource controller.
     *
     * @param type PCaseRepositoryInterface $case
     */
    public function __construct(PCaseRepositoryInterface $case)
    {
        parent::__construct();
        $this->repository = $case
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
    }

    /**
     * Display a list of case.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->setPresenter(\App\Repositories\Presenter\PCaseListPresenter::class)
                ->orderBy('order','asc')
                ->orderBy('id','desc')
                ->getDataTable($limit);

            return $this->response
                ->success()
                ->count($data['recordsTotal'])
                ->data($data['data'])
                ->output();
        }
        return $this->response->title(trans('case.name'))
            ->view('case.index', true)
            ->output();
    }

    /**
     * Display case.
     *
     * @param Request $request
     * @param PCase   $case
     *
     * @return Response
     */
    public function show(Request $request, PCase $case)
    {

        if ($case->exists) {
            $view = 'case.show';
        } else {
            $view = 'case.new';
        }
        return $this->response->title(trans('app.view') . ' ' . trans('case.name'))
            ->data(compact('case'))
            ->view($view)
            ->output();
    }

    /**
     * Show the form for creating a new case.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {

        $case = $this->repository->newInstance([]);

        return $this->response->title(trans('app.new') . ' ' . trans('case.name'))
            ->view('case.create', true)
            ->data(compact('case'))
            ->output();
    }

    /**
     * Create new case.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $attributes              = $request->all();

            $case                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('case.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('case/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('case/'))
                ->redirect();
        }

    }

    /**
     * Update the case.
     *
     * @param Request $request
     * @param PCase   $case
     *
     * @return Response
     */
    public function update(Request $request, PCase $case)
    {
        try {
            $attributes = $request->all();

            $case->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('case.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('case/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('case/'))
                ->redirect();
        }

    }

    /**
     * Remove the case.
     *
     * @param Request $request
     * @param PCase   $case
     *
     * @return Response
     */
    public function destroy(Request $request, PCase $case)
    {
        try {

            $case->forceDelete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('case.name')]))
                ->status('success')
                ->code(202)
                ->url(guard_url('case/'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('case/'))
                ->redirect();
        }

    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('case.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('case'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('case'))
                ->redirect();
        }
    }


}