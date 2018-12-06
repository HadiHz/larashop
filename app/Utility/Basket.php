<?php
/**
 * Created by PhpStorm.
 * User: Hadi
 * Date: 12/2/2018
 * Time: 8:26 PM
 */

namespace App\Utility;


class Basket
{
    public static function items()
    {
        if (isset($_SESSION['basket']['items']) && count($_SESSION['basket']['items']) > 0){
            return $_SESSION['basket']['items'];
        }
        return [];
    }
}