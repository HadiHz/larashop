<?php

namespace App\Models;


use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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


    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->filter($builder);
    }


}
