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

    public static function total_price() {
        if (isset($_SESSION['basket']['items'])){
            $total_price = 0;
            foreach ($_SESSION['basket']['items'] as $item){
                $total_price += $item['price']* $item['count'];
            }
            return $total_price;
        }

//		array_reduce($_SESSION['basket']['items'] , function ($total , $item){
//			$total += $item['price'] * $item['count'];
//			return $total;
//		} , 0);
    }


    public static function productIds()
    {
        $pIds = [];
        if (isset($_SESSION['basket']['items'])){
            foreach ($_SESSION['basket']['items'] as $item){
                $pIds[$item['id']] = [ 'count' => $item['count']] ;
            }
        }

        return $pIds;
    }

}