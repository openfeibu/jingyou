<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\QuestionRepositoryInterface;

class QuestionResourceController extends BaseController
{
    public function __construct(QuestionRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->setPresenter(\App\Repositories\Presenter\QuestionListPresenter::class)
                ->orderBy('id','desc')
                ->getDataTable($limit);

            return $this->response
                ->success()
                ->count($data['recordsTotal'])
                ->data($data['data'])
                ->output();
        }
        return $this->response->title(trans('question.name'))
            ->view('question.index')
            ->output();
    }

    public function destroy(Request $request,Question $question)
    {
        try {
            $this->repository->forceDelete([$question->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('question'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('question'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('question'))
                ->redirect();
        }
    }
}
