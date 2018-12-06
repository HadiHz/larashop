<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function single($id)
    {
        $product = Product::find($id);
        return view('frontend.product.single' , compact('product'));
    }
}
