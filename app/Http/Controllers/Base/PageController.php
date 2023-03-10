<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Base\BaseController;
use Log;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Repositories\Eloquent\PageRepositoryInterface;

class PageController extends BaseController
{
    public function __construct(PageRepositoryInterface $page_repository)
    {
        parent::__construct();
        $this->page_repository = $page_repository;
        $this->view_prefix = 'page.';
    }
    public function show(Request $request,$slug)
    {
        $page = $this->page_repository->findBySlug($slug);

        return $this->response->title($page->title)
            ->data(compact('page'))
            ->view($this->view_prefix.$slug, true)
            ->output();
    }

}
