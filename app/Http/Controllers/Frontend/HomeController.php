<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
//        dd($_SESSION['basket']);
//        session_destroy();
//unset($_SESSION);
        $products = Product::all();
        return view('frontend.home.index' , compact('products'));
    }
}
