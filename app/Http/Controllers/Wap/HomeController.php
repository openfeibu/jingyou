<?php

namespace App\Http\Controllers\Wap;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\HomeController as BaseHomeController;
use App\Repositories\Eloquent\BannerRepositoryInterface;

class HomeController extends BaseHomeController
{
    public function __construct(BannerRepositoryInterface $banner_repository)
    {
        $this->banner_repository = $banner_repository;
        parent::__construct();
    }
    public function home(Request $request)
    {
       // return parent::home($request);
        $banners = $this->banner_repository->orderBy('order','asc')->orderBy('id','asc')->all();
        return $this->response->title(setting('station_name'))
            ->data(compact('banners'))
            ->view('home', true)
            ->output();

    }
}
