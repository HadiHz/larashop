<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
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
        $sliderProductsIds = Slider::all()->pluck('product_id')->toArray();
        $sliderProducts = [];
        foreach ($sliderProductsIds as $id){
            $sliderProducts[] = Product::find($id);
        }
        return view('frontend.home.index' , compact('products' , 'sliderProducts'));
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


    public function aboutUs()
    {
        $pageTitle = "درباره ما";
        return view('frontend.home.aboutUs' , compact('pageTitle'));
    }

    public function contactUs()
    {
        $pageTitle = "ارتباط با ما";
        return view('frontend.home.contactUs',compact('pageTitle'));
    }


}
