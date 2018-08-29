<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Base\CompanyController as BaseCompanyController;
use Log;
use Illuminate\Http\Request;
use App\Models\PCase;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;
use App\Repositories\Eloquent\CourseRepositoryInterface;
use App\Repositories\Eloquent\PCaseRepositoryInterface;
use App\Repositories\Eloquent\QuestionRepositoryInterface;

class CompanyController extends BaseCompanyController
{
    public function __construct(PageRepositoryInterface $page_repository,
                                PageCategoryRepositoryInterface $page_category_repository,
                                CourseRepositoryInterface $course_repository,
                                PCaseRepositoryInterface $case_repository,
                                QuestionRepositoryInterface $question_repository)
    {
        parent::__construct($page_repository,$page_category_repository,$course_repository,$case_repository,$question_repository);
    }
    public function about(Request $request)
    {
        return parent::about($request);
    }
}
