<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    use HasFactory;
    public $guarded = [];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
