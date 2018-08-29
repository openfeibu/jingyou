<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;

class Knowledge extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    protected $config = 'model.knowledge.knowledge';

    public function category()
    {
        return $this->belongsTo('App\Models\KnowledgeCategory', 'category_id');
    }

}
