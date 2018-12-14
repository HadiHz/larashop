<?php
/**
 * Created by PhpStorm.
 * User: Alimohammadi
 * Date: 4/5/2018
 * Time: 13:21
 */

namespace App\Utility;


class Order {

	public static function generateOrderId($addition = null) {
		if($addition)
		{
			return time().$addition;
		}
		return time();
	}

}