<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class Question extends BaseModel
{
    use Hashids, Slugger, Translatable;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'model.question.question';

}