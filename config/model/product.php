<?php

return [

    /*
     * Modules .
     */
    'modules'  => ['product'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

    // More variables for product module.
    'product'     => [
        'model'        => 'App\Models\Product',
        'table'        => 'products',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['category_id','title','image','images','price','views','description','content', 'order'],
        'translate'    => ['category_id','title','image','images','price','views','description','content', 'order'],
        'upload_folder' => '/product',
        'casts'        => [
            'images' => 'array',
        ],
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'title' => 'like',
            'category_id' => '=',
        ],
    ],
    'category' => [
        'model'        => 'App\Models\ProductCategory',
        'table'        => 'product_categories',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['name', 'en_name','description','en_description','image','order'],
        'upload_folder' => '/product',
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
        ],
    ],
];
