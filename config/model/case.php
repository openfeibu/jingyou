<?php

return [

    /*
     * Modules .
     */
    'modules'  => ['case'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

    // More variables for product module.
    'case'     => [
        'model'        => 'App\Models\PCase',
        'table'        => 'cases',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['title','description','content','image','views', 'order','source','author'],
        'translate'    => ['title','description','content','image','views', 'order','source','author'],
        'upload_folder' => '/case',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'title' => 'like',
        ],
    ],

];
