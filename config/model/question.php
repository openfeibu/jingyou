<?php

return [

    /*
     * Modules .
     */
    'modules'  => ['question'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

    // More variables for product module.
    'question'     => [
        'model'        => 'App\Models\Question',
        'table'        => 'questions',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'fillable'     => ['name','email','tel','content','location','ip'],
        'translate'    => ['name','email','tel','content','location','ip'],
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'name' => 'like',
            'email' => 'like',
            'phone' => 'like',
        ],
    ],
];

