<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Base\BaseController;
use Log;
use Illuminate\Http\Request;
use App\Models\PCase;
use App\Repositories\Eloquent\PCaseRepositoryInterface;

class CaseController extends BaseController
{
    public function __construct(PCaseRepositoryInterface $case_repository)
    {
        parent::__construct();
        $this->case_repository = $case_repository;
        $this->view_prefix = 'case.';
    }
    public function home(Request $request)
    {
        $cases = $this->case_repository
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->paginate(10);

        return $this->response->title('成功案例')
            ->data(compact('cases'))
            ->view($this->view_prefix.'home', true)
            ->output();
    }

    public function show(Request $request,PCase $case)
    {
        $case->increment('views');
        $previous = $this->case_repository
            ->where([['id','<',$case->id]])
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->first();
        $next = $this->case_repository
            ->where([['id','>',$case->id]])
            ->orderBy('order','asc')
            ->orderBy('id','desc')
            ->first();
        return $this->response->title($case->title)
            ->data(compact('case','previous','next'))
            ->view($this->view_prefix.'show', true)
            ->output();
    }
}
