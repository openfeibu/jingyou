<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class PCaseListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\PCase $case)
    {
        return [
            'id'      => $case->id,
            'title'   => $case->title,
            'image'   => $case->image ? url("/image/sm".$case->image) : '',
            'description' => $case->description,
            'views'   => $case->views,
            'order'   => $case->order,
            'created_at' => $case->created_at,
            'updated_at' => $case->updated_at,
        ];
    }
}
