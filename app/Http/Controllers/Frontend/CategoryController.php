<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        $products = $category->products()->get();

        $pageTitle = 'محصولات در دسته بندی ' . $category->name;

        $sliderProductsIds = Slider::all()->pluck('product_id')->toArray();
        $sliderProducts = [];
        foreach ($sliderProductsIds as $id){
            $sliderProducts[] = Product::find($id);
        };

        return view('frontend.home.index' , compact('products' , 'pageTitle' , 'sliderProducts'));
    }
}
