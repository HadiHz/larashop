<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];


    const COMPLETE = 1;
    const INCOMPLETE = 2;

    public function products()
    {
        return $this->belongsToMany(Product::class , 'order_product' , 'order_id' , 'product_id')->withPivot(['count']);
    }


    public function shipping_method()
    {
        return $this->belongsTo(ShippingMethod::class , 'shipping_method_id');
    }


    public function order_status_format()
    {
        switch ($this->attributes['status']){
            case self::COMPLETE:
                return 'تکمیل شده';
                break;
            case self::INCOMPLETE:
                return 'ناقص';
                break;
        }
    }


    public function shippingMethodName()
    {
        $shipId = $this->attributes['shipping_method_id'];
        $shipName = ShippingMethod::find($shipId)->name;

        return $shipName;
    }


    public function shippingMethodCost()
    {
        $shipId = $this->attributes['shipping_method_id'];
        $shipCost = ShippingMethod::find($shipId)->cost;

        return $shipCost;
    }




}
