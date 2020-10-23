<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = [];

    public $timestamps = false;
    public function bannerImage(){
        return $this->hasMany(bannerImage::class, 'banner_id');
    }
}
