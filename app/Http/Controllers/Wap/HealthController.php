<?php

namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Base\PageController as BasePageController;
use Log;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Repositories\Eloquent\PageRepositoryInterface;

class HealthController extends BasePageController
{
    public function __construct(PageRepositoryInterface $page_repository)
    {
        parent::__construct($page_repository);
    }
    public function show(Request $request,$slug="health")
    {
        return parent::show($request,$slug);
    }
}
