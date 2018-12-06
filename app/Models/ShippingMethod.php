<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{


    protected $guarded = ['id'];



    public function orders()
    {
        return $this->hasMany(Order::class, 'shipping_method_id');
    }



}
