<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];


    public function products()
    {
        return $this->belongsToMany(Product::class , 'order_product' , 'order_id' , 'product_id')->withPivot(['count']);
    }


    public function shipping_method()
    {
        return $this->belongsTo(ShippingMethod::class , 'shipping_method_id');
    }




}
