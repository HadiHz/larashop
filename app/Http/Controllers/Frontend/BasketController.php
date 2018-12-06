<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasketController extends Controller
{
    public function __construct()
    {
        if ( ! isset( $_SESSION['basket'] ) ) {
            $_SESSION['basket'] = [];
        }
    }

    public function add( Request $request) {

        $product_id = $request->input('product_id');

        $count = 1;
        if ($request->has('count')){
            $count = $request->input('count');
        }

        if ( $this->exist($product_id) ) {
            $_SESSION['basket']['items'][ $product_id ]['count'] ++;
            return [
                'success' => true,
                'message' => 'درخواست شما با موفقیت ثبت گردید'
            ];
        } else {
            $product = Product::find( $product_id );
            $_SESSION['basket']['items'][ $product_id ] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image_path' => $product->image_path,
                'count' => $count
            ];
            return [
                'success' => true,
                'message' => 'درخواست شما با موفقیت ثبت گردید'
            ];
        }




    }


    public function review(Request $request)
    {
        return view('frontend.basket.review');
    }

    public function remove( $product_id ) {
        if ( $this->exist($product_id) ) {
            unset($_SESSION['basket']['items'][ $product_id ]);
            return true;
        }
        return false;
    }

    public function update( $product_id, $count ) {
        if($this->exist($product_id)){
            if(intval($count) == 0){
                return $this->remove($product_id);
            }
            $_SESSION['basket']['items'][$product_id]['count'] = $count;
        }


    }

    private function exist($product_id)
    {
        return  isset($_SESSION['basket']['items'][ $product_id ]);
    }

    public function total_count() {
        if (isset($_SESSION['basket']['items']) && count($_SESSION['basket']['items']) > 0 ){
            return count($_SESSION['basket']['items']);
        }

        return 0;
    }

    public function items() {
        if (isset($_SESSION['basket']['items']) && count($_SESSION['basket']['items']) > 0){
            return $_SESSION['basket']['items'];
        }
        return [];
    }


    public function total_price() {
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




}
