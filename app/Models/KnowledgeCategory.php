<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;

class KnowledgeCategory extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    protected $config = 'model.knowledge.category';

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Models\Knowledge', 'category_id');
    }
}
