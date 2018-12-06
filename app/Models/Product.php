<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];


    public function orders()
    {
        return $this->belongsToMany(Order::class , 'order_product' , 'product_id' , 'order_id')->withPivot(['count']);
    }


    public function categories()
    {
        return $this->morphToMany(Category::class , 'categorizable','categorizables','categorizable_id' , 'category_id');
    }


}
