<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductCategory extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    protected $config = 'model.product.category';

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }
}
