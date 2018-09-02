<?php

// Admin  routes  for user
Route::group([
    'namespace' => 'Admin',
    'prefix' => set_route_guard('web',null,'admin')
], function () {
    Auth::routes();
    Route::get('password', 'UserController@getPassword');
    Route::post('password', 'UserController@postPassword');
    Route::get('/', 'ResourceController@home')->name('home');
    Route::get('/dashboard', 'ResourceController@dashboard')->name('dashboard');
    Route::resource('banner', 'BannerResourceController');
    Route::post('/banner/destroyAll', 'BannerResourceController@destroyAll');

    Route::resource('system_page', 'SystemPageResourceController');
    Route::post('/system_page/destroyAll', 'SystemPageResourceController@destroyAll')->name('system_page.destroy_all');
    /*
    Route::group(['prefix' => 'menu'], function ($router) {
        Route::get('index', 'MenuResourceController@index');
    });
    */

    Route::get('/setting/company', 'SettingResourceController@company')->name('setting.company.index');
    Route::post('/setting/updateCompany', 'SettingResourceController@updateCompany');
    Route::get('/setting/station', 'SettingResourceController@station')->name('setting.station.index');
    Route::post('/setting/updateStation', 'SettingResourceController@updateStation');
    Route::get('/setting/publicityVideo', 'SettingResourceController@publicityVideo')->name('setting.publicity_video.index');
    Route::post('/setting/updatePublicityVideo', 'SettingResourceController@updatePublicityVideo');
    Route::resource('link', 'LinkResourceController');
    Route::post('/link/destroyAll', 'LinkResourceController@destroyAll')->name('link.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::resource('role', 'RoleResourceController');

    Route::resource('case', 'PCaseResourceController');
    Route::post('/case/destroyAll', 'PCaseResourceController@destroyAll')->name('case.destroy_all');

    Route::resource('course', 'CourseResourceController');
    Route::post('/course/destroyAll', 'CourseResourceController@destroyAll')->name('course.destroy_all');

    Route::group(['prefix' => 'product','as' => 'product.'], function ($router) {
        Route::resource('product', 'ProductResourceController');
        Route::post('/product/destroyAll', 'ProductResourceController@destroyAll')->name('product.destroy_all');
        Route::resource('category', 'ProductCategoryResourceController');
        Route::post('/category/destroyAll', 'ProductCategoryResourceController@destroyAll')->name('category.destroy_all');
    });

    Route::group(['prefix' => 'knowledge','as' => 'knowledge.'], function ($router) {
        Route::resource('knowledge', 'KnowledgeResourceController');
        Route::post('/knowledge/destroyAll', 'KnowledgeResourceController@destroyAll')->name('knowledge.destroy_all');
        Route::resource('category', 'KnowledgeCategoryResourceController');
        Route::post('/category/destroyAll', 'KnowledgeCategoryResourceController@destroyAll')->name('category.destroy_all');
    });

    Route::group(['prefix' => 'page','as' => 'page.'], function ($router) {
        Route::resource('page', 'PageResourceController');
        Route::resource('category', 'PageCategoryResourceController');


    });
    Route::group(['prefix' => 'page','as' => 'page.','namespace' => 'Page'], function ($router) {
        Route::get('/about/show', 'AboutResourceController@show')->name('about.show');
        Route::post('/about/store', 'AboutResourceController@store')->name('about.store');
        Route::put('/about/update/{page}', 'AboutResourceController@update')->name('about.update');
        Route::get('/health/show', 'HealthResourceController@show')->name('health.show');
        Route::post('/health/store', 'HealthResourceController@store')->name('health.store');
        Route::put('/health/update/{page}', 'HealthResourceController@update')->name('health.update');
        Route::get('/cooperation/show', 'CooperationResourceController@show')->name('cooperation.show');
        Route::post('/cooperation/store', 'CooperationResourceController@store')->name('cooperation.store');
        Route::put('/cooperation/update/{page}', 'CooperationResourceController@update')->name('cooperation.update');
        Route::resource('cooperator', 'CooperatorResourceController');
        Route::post('/cooperator/destroyAll', 'CooperatorResourceController@destroyAll')->name('cooperator.destroy_all');
        Route::get('/dealer/show', 'DealerResourceController@show')->name('dealer.show');
        Route::post('/dealer/store', 'DealerResourceController@store')->name('dealer.store');
        Route::put('/dealer/update/{page}', 'DealerResourceController@update')->name('dealer.update');
        Route::get('/qualification/show', 'QualificationResourceController@show')->name('qualification.show');
        Route::post('/qualification/store', 'QualificationResourceController@store')->name('qualification.store');
        Route::put('/qualification/update/{page}', 'QualificationResourceController@update')->name('qualification.update');
        Route::resource('news', 'NewsResourceController');
        Route::post('/news/destroyAll', 'NewsResourceController@destroyAll')->name('news.destroy_all');
    });
    /*
    Route::group(['prefix' => 'home','as' => 'home.'],function($router){

    });
    */
    Route::get('/home/{slug}', 'HomeResourceController@index')->name('home.index');
    Route::get('/home/{slug}/create', 'HomeResourceController@create')->name('home.create');
    Route::get('/home/{slug}/{page}', 'HomeResourceController@show')->name('home.show');
    Route::post('/home/{slug}/store', 'HomeResourceController@store')->name('home.store');
    Route::put('/home/{slug}/{page}', 'HomeResourceController@update')->name('home.update');
    Route::delete('/home/{slug}/{page}', 'HomeResourceController@destroy')->name('home.destroy');
    Route::post('/home/{slug}/destroyAll', 'HomeResourceController@destroyAll')->name('home.destroyAll');

    Route::group(['prefix' => 'home','as' => 'home.'], function ($router) {
        Route::resource('why_need_aroma', 'HomeResourceController');
        Route::post('why_need_aroma/destroyAll', 'HomeResourceController@destroyAll')->name('why_need_aroma.destroyAll');
        Route::resource('aroma_can_bring', 'HomeResourceController');
        Route::post('aroma_can_bring/destroyAll', 'HomeResourceController@destroyAll')->name('aroma_can_bring.destroyAll');
        Route::resource('applicable_place', 'HomeResourceController');
        Route::post('applicable_place/destroyAll', 'HomeResourceController@destroyAll')->name('applicable_place.destroyAll');
        Route::resource('brand_advantage', 'HomeResourceController');
        Route::post('brand_advantage/destroyAll', 'HomeResourceController@destroyAll')->name('brand_advantage.destroyAll');
        Route::resource('hot_recommend', 'HomeResourceController');
        Route::post('hot_recommend/destroyAll', 'HomeResourceController@destroyAll')->name('hot_recommend.destroyAll');
        Route::resource('information_center', 'HomeResourceController');
        Route::post('information_center/destroyAll', 'HomeResourceController@destroyAll')->name('information_center.destroyAll');
        Route::resource('brand_introduction', 'HomeResourceController');
        Route::post('brand_introduction/destroyAll', 'HomeResourceController@destroyAll')->name('brand_introduction.destroyAll');
    });


    Route::group(['prefix' => 'nav','as' => 'nav.'], function ($router) {
        Route::resource('nav', 'NavResourceController');
        Route::post('/nav/destroyAll', 'NavResourceController@destroyAll')->name('nav.destroy_all');
        /*
        Route::resource('category', 'NavCategoryResourceController');
        Route::post('/category/destroyAll', 'NavCategoryResourceController@destroyAll')->name('category.destroy_all');
        */
    });
    Route::resource('question', 'QuestionResourceController');
    Route::post('/question/destroyAll', 'QuestionResourceController@destroyAll')->name('question.destroy_all');

    Route::post('/upload/{config}/{path?}', 'UploadController@upload')->where('path', '(.*)');

    Route::resource('admin_user', 'AdminUserResourceController');
    Route::post('/admin_user/destroyAll', 'AdminUserResourceController@destroyAll')->name('admin_user.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::post('/permission/destroyAll', 'PermissionResourceController@destroyAll')->name('permission.destroy_all');
    Route::resource('role', 'RoleResourceController');
    Route::post('/role/destroyAll', 'RoleResourceController@destroyAll')->name('role.destroy_all');
    Route::get('logout', 'Auth\LoginController@logout');
});

//Route::get('
///{slug}.html', 'PagePublicController@getPage');
/*
Route::group(
    [
        'prefix' => trans_setlocale() . '/admin/menu',
    ], function () {
    Route::post('menu/{id}/tree', 'MenuResourceController@tree');
    Route::get('menu/{id}/test', 'MenuResourceController@test');
    Route::get('menu/{id}/nested', 'MenuResourceController@nested');

    Route::resource('menu', 'MenuResourceController');
   // Route::resource('submenu', 'SubMenuResourceController');
});
*/
Route::group([
    'namespace' => 'Wap',
    'as' => 'wap.',
    'domain' => env('WAP_URL'),
], function () {
    Route::get('/','HomeController@home')->name('home');
    Route::get('product','ProductController@home')->name('product.home');
    Route::get('product/category/{slug}','ProductController@category')->name('product.category');
    Route::get('product/{product}','ProductController@productShow')->name('product.show');
    Route::get('case','CaseController@home')->name('case.home');
    Route::get('case/{case}','CaseController@show')->name('case.show');
    Route::get('page/{slug}','PageController@show')->name('page.show');
    Route::get('health','HealthController@show')->name('health');
    Route::get('knowledge','KnowledgeController@home')->name('knowledge.home');
    Route::get('knowledge/{knowledge}','KnowledgeController@show')->name('knowledge.show');
    Route::get('company','CompanyController@about')->name('company.about');
    Route::get('company/qualification','CompanyController@qualification')->name('company.qualification');
    Route::get('company/news','CompanyController@news')->name('company.news');
    Route::get('company/news/{news}','CompanyController@newsShow')->name('company.news.show');
    Route::get('company/news','CompanyController@news')->name('company.news');
    Route::get('company/contact','CompanyController@contact')->name('company.contact');
    Route::post('company/questionStore','CompanyController@questionStore')->name('company.question.store');
});
Route::group([
    'namespace' => 'Pc',
    'as' => 'pc.',
], function () {
    Route::get('/','HomeController@home')->name('home');
    Route::get('product','ProductController@home')->name('product.home');
    Route::get('product/category/{slug}','ProductController@category')->name('product.category');
    Route::get('product/{product}','ProductController@productShow')->name('product.show');
    Route::get('case','CaseController@home')->name('case.home');
    Route::get('case/{case}','CaseController@show')->name('case.show');
    Route::get('page/{slug}','PageController@show')->name('page.show');
    Route::get('health','HealthController@show')->name('health');
    Route::get('knowledge','KnowledgeController@home')->name('knowledge.home');
    Route::get('knowledge/{knowledge}','KnowledgeController@show')->name('knowledge.show');
    Route::get('company','CompanyController@about')->name('company.about');
    Route::get('company/qualification','CompanyController@qualification')->name('company.qualification');
    Route::get('company/news','CompanyController@news')->name('company.news');
    Route::get('company/news/{news}','CompanyController@newsShow')->name('company.news.show');
    Route::get('company/news','CompanyController@news')->name('company.news');
    Route::get('company/contact','CompanyController@contact')->name('company.contact');
    Route::post('company/questionStore','CompanyController@questionStore')->name('company.question.store');
    /*
    Route::get('/product/products', 'ProductController@products');
    */
});
