<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function get_category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function get_subcategory(){
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    public function get_childcategory(){
        return $this->belongsTo(Category::class, 'childcategory_id');
    }
    public function get_brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function get_features(){
        return $this->hasMany(ProductFeature::class, 'product_id', 'id');
    }
    public function get_galleryImages(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function discount(){
        return $this->belongsTo(OfferProduct::class, 'product_id');
    }

    public  function user(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
