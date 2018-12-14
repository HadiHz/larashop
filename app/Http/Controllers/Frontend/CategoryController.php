<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        $products = $category->products()->get();

        $pageTitle = 'محصولات در دسته بندی ' . $category->name;

        return view('frontend.home.index' , compact('products' , 'pageTitle'));
    }
}
