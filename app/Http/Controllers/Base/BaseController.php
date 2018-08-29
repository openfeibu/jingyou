<?php

namespace App\Http\Controllers\Base;

use Route;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Hash;
use App\Traits\Theme\ThemeAndViews;
use App\Http\Response\ResourceResponse;

class BaseController extends Controller
{
    use Helpers,ThemeAndViews;

    public $response;

    public function __construct()
    {
        $this->response = app(ResourceResponse::class);
        // 根据路由分组命名决定调用视图模板
        $route = Route::currentRouteName();
        $prefix = strstr($route, '.', TRUE);
        $this->setTheme($prefix);
    }
}
