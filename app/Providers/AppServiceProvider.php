<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Common\Tree;
use Intervention\Image\ImageManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadViewsFrom(public_path().'/themes/vender/filer', 'filer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'App\Repositories\Eloquent\PageRepositoryInterface',
            \App\Repositories\Eloquent\PageRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\PageCategoryRepositoryInterface',
            \App\Repositories\Eloquent\PageCategoryRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\SettingRepositoryInterface',
            \App\Repositories\Eloquent\SettingRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\BannerRepositoryInterface',
            \App\Repositories\Eloquent\BannerRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\LinkRepositoryInterface',
            \App\Repositories\Eloquent\LinkRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\NavRepositoryInterface',
            \App\Repositories\Eloquent\NavRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\ProductRepositoryInterface',
            \App\Repositories\Eloquent\ProductRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\ProductCategoryRepositoryInterface',
            \App\Repositories\Eloquent\ProductCategoryRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\PCaseRepositoryInterface',
            \App\Repositories\Eloquent\PCaseRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\KnowledgeRepositoryInterface',
            \App\Repositories\Eloquent\KnowledgeRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\KnowledgeCategoryRepositoryInterface',
            \App\Repositories\Eloquent\KnowledgeCategoryRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\CourseRepositoryInterface',
            \App\Repositories\Eloquent\CourseRepository::class
        );
        $this->app->bind(
            'App\Repositories\Eloquent\QuestionRepositoryInterface',
            \App\Repositories\Eloquent\QuestionRepository::class
        );
        $this->app->bind('nav_repository',function($app){
            return new \App\Repositories\Eloquent\NavRepository($app);
        });
        $this->app->bind('link_repository',function($app){
            return new \App\Repositories\Eloquent\LinkRepository($app);
        });
        $this->app->bind('page_repository',function($app){
            return new \App\Repositories\Eloquent\PageRepository($app);
        });

        $this->app->bind('filer', function ($app) {
            return new \App\Helpers\Filer\Filer();
        });
        $this->app->singleton('tree',function(){
            return new Tree;
        });
        $this->app->singleton('image', function ($app) {
            return new ImageManager($app['config']->get('image'));
        });
    }

    public function provides()
    {

    }
}
