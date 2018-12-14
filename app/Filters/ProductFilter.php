<?php
/**
 * Created by PhpStorm.
 * User: Hadi
 * Date: 12/12/2018
 * Time: 10:44 PM
 */

namespace App\Filters;


use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    protected $filters = [
        'price' => PriceFilter::class
    ];
}