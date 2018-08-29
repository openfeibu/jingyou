<?php

return [

    /*
     * Modules .
     */
    'modules'  => ['knowledge'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

    // More variables for product module.
    'knowledge'     => [
        'model'        => 'App\Models\Knowledge',
        'table'        => 'knowledge',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['category_id','title','image','views','description','content', 'order','source','author'],
        'translate'    => ['category_id','title','image','views','description','content', 'order','source','author'],
        'upload_folder' => '/knowledge',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'title' => 'like',
            'category_id' => '=',
        ],
    ],
    'category' => [
        'model'        => 'App\Models\KnowledgeCategory',
        'table'        => 'knowledge_categories',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['name', 'order'],
        'encrypt'      => ['id'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
        ],
    ],
];
