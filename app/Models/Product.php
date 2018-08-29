<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    protected $config = 'model.product.product';

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

}
