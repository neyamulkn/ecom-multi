<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PredefinedFeature extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function get_category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
