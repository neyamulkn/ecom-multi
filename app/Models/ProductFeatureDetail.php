<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeatureDetail extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    //get attribute value name
    public function get_attributeValue(){
        return $this->belongsTo(ProductAttributeValue::class, 'attributeValue_id', 'id');
    }
}
