<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Base\CaseController as BaseCaseController;
use Log;
use Illuminate\Http\Request;
use App\Models\PCase;
use App\Repositories\Eloquent\PCaseRepositoryInterface;

class CaseController extends BaseCaseController
{
    public function __construct(PCaseRepositoryInterface $case_repository)
    {
        parent::__construct($case_repository);
    }
    public function home(Request $request)
    {
        return parent::home($request);
    }
    public function show(Request $request,PCase $case)
    {
        return parent::show($request,$case);
    }
}
