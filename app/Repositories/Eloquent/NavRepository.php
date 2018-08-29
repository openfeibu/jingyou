<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\NavRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class NavRepository extends BaseRepository implements NavRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.nav.nav.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.nav.nav.model');
    }

    public function top()
    {
        return $this->where(['parent_id' => 0])->orderBy('order','asc')->orderBy('id','asc')->all();
    }
    public function children($parent_id)
    {
        return $this->where(['parent_id' => $parent_id])->orderBy('order','asc')->orderBy('id','asc')->all();
    }
    public function allNavs()
    {
        return $this->orderBy('order','asc')->orderBy('id','asc')->all();
    }
    public function navs()
    {
        $navs = [];
        $top_navs = $this->top();

        if($top_navs) {
            foreach ($top_navs as $item) {

                $active = if_uri(ltrim($item->url,'/')) || if_uri($item->url) || if_uri_pattern($item->url.'/*') || if_uri_pattern(ltrim($item->url,'/').'/*');
                $sub = $this->children($item->id);

                if(!$sub->isEmpty())
                {
                    /*
                    foreach ($sub as $key => $sub_item)
                    {
                        $sub_item->active = if_uri(ltrim($sub_item->url,'/')) || if_uri($sub_item->url) ;
                        $active ? true : $active  = $sub_item->active;
                    }
                    */
                    $item->sub = $sub;
                }

                $item->active = $active ?? false;
                $menus[] = $item;
            }
        }

        return $menus;
    }

}
