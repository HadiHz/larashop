<?php
/**
 * Created by PhpStorm.
 * User: Hadi
 * Date: 12/12/2018
 * Time: 10:48 PM
 */

namespace App\Filters;


class PriceFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('price', $value);
    }
}