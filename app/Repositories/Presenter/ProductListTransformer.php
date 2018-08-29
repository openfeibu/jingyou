<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class ProductListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Product $product)
    {
        return [
            'id'      => $product->id,
            'title'   => $product->title,
            'image'   => $product->image ? url("/image/sm".$product->image) : '',
            'images'   => $product->images ? handle_images($product->images) : [],
            'price'   => $product->price,
            'description' => $product->description,
            'order'   => $product->order,
            'category_id' => $product->category_id,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'category_name' => $product->category->name,
        ];
    }
}
