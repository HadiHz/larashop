<?php
/**
 * Created by PhpStorm.
 * User: Hadi
 * Date: 12/22/2018
 * Time: 6:38 PM
 */

namespace App\Filters;


class LowerThanPriceFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('price', '<=' , $value);
    }
}