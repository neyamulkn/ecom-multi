<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }

    public function get_country(){
        return $this->hasOne(Country::class, 'id', 'billing_country');
    }

    public function get_state(){
        return $this->hasOne(State::class, 'id', 'billing_region');
    }
    public function get_city(){
        return $this->hasOne(City::class, 'id',  'billing_city');
    }
    public function get_area(){
        return $this->hasOne(Area::class, 'id','billing_area');
    }
}
