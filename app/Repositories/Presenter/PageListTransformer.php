<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class PageListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Page $page)
    {
        return [
            'id'      => $page->id,
            'slug'    => $page->slug,
            'name'    => $page->name,
            'image'   => $page->image ? url("/image/sm".$page->image) : '',
            'other_image'   => $page->other_image ? url("/image/sm".$page->other_image) : '',
            'title'   => $page->title,
            'en_title'   => $page->en_title,
            'description' => $page->description,
            'video'   => $page->video,
            'status'  => $page->status,
            'order'   => $page->order,
            'home_recommend' => $page->recommend_type == 'home' ? true : false,
            'category_id' => $page->category_id,
            'created_at' => $page->created_at,
            'updated_at' => $page->updated_at,
            'category_name' => $page->category->name,
        ];
    }
}
