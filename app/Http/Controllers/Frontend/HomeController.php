<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Utility\Basket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {

//        dd(Basket::productIds());
//        dd($_SESSION['basket']);
//        session_destroy();
//unset($_SESSION);
        $products = Product::filter($request)->get();
        return view('frontend.home.index' , compact('products'));
    }
}
