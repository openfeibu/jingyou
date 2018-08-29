<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class QuestionListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Question $question)
    {
        return [
            'id' => $question->id,
            'name' => $question->name,
            'email' => $question->email,
            'tel' => $question->tel,
            'location' => $question->location,
            'content' => $question->content,
            'ip' => $question->ip,
        ];
    }
}
