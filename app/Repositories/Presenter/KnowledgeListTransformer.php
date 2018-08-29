<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class KnowledgeListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Knowledge $knowledge)
    {
        return [
            'id'      => $knowledge->id,
            'title'   => $knowledge->title,
            'image'   => $knowledge->image ? url("/image/sm".$knowledge->image) : '',
            'description' => $knowledge->description,
            'order'   => $knowledge->order,
            'views'   => $knowledge->views,
            'created_at' => $knowledge->created_at,
            'updated_at' => $knowledge->updated_at,
            'category_name' => $knowledge->category->name,
        ];
    }
}
