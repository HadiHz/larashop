<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock;

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

    public function search(Request $request)
    {

        $search = $request->input('search');

        if (is_null($search)){
            $search = '';
        }

        $products = Product::where('name', 'like', '%' . $search . '%')->get();

//        dd($products);



        $prices = $products->pluck('price')->toArray();

        $maxPrice = max($prices);

        $categories = Category::all();



        $pageTitle = 'جستجو ی محصولات';
        return view('frontend.home.search' , compact('products','categories','maxPrice','search' , 'pageTitle'));
    }
}
