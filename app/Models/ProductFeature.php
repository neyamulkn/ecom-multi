<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function get_attribute(){
        return $this->belongsTo(ProductAttribute::class, 'attribute_id', 'id');
    }

    // get attribute details by feature_id in product front details page
    public function get_featureDetails(){
        return $this->hasMany(ProductFeatureDetail::class, 'feature_id', 'id');
    }
}
