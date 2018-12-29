<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];


    const PAYED = 1;
    const NOT_PAYED = 2;
    const QUEUE = 3;
    const VERIFIED = 4;
    const PREPARING = 5;
    const PREPARED = 6;
    const POSTING = 7;
    const DONE = 8;

    public function products()
    {
        return $this->belongsToMany(Product::class , 'order_product' , 'order_id' , 'product_id')->withPivot(['count']);
    }


    public function shipping_method()
    {
        return $this->belongsTo(ShippingMethod::class , 'shipping_method_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }


    public function order_status_format()
    {
        switch ($this->attributes['status']){
            case self::PAYED:
                return 'پرداخت شده';
                break;
            case self::NOT_PAYED:
                return 'پرداخت نشده';
                break;
            case self::QUEUE:
                return 'در صف بررسی';
                break;
            case self::VERIFIED:
                return 'تایید سفارش';
                break;
            case self::PREPARING:
                return 'آماده سازی سفارش';
                break;
            case self::PREPARED:
                return 'خروج از مرکز پردازش';
                break;
            case self::POSTING:
                return 'تحویل به پست';
                break;
            case self::DONE:
                return 'تحویل مرسوله به مشتری';
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
