<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Compound;

class ProductController extends Controller
{
    public function index()
    {
        $products =  Product::orderBy('updated_at', 'DESC')->paginate(20);
        return view('admin.product.list' , compact('products'))->with('panel_title', 'لیست محصول ها');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create' , compact('categories'))->with('panel_title', 'ایجاد محصول جدید');
    }

    public function store(Request $request)
    {
        dd($request->all());

        $productData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity_in_warehouse' => 'required',
            'description' => 'required',
            'image_path' => 'required',
        ]);




        $imageName = $request->File('image_path')->getClientOriginalName();
        $request->file('image_path')->move(public_path('productPhotos'), $imageName);
        $imagePath = DIRECTORY_SEPARATOR.'productPhotos'.DIRECTORY_SEPARATOR.$imageName;

        $productData['image_path'] = $imagePath;

        $new_product = Product::create($productData);

        if($request->has('categories')) {
            $new_product->categories()->sync($request->input('categories'));
        }

        if ($new_product){
            return redirect()->route('admin.product.list')->with('success' , 'محصول جدید با موفقیت ثبت شد.');
        }
    }

    public function edit(Request $request , $id)
    {
        $productItem = Product::find($id);
        $categories = Category::all();
        $product_categories = $productItem->categories()->get()->pluck('id')->toArray();
        return view('admin.product.edit' , compact('productItem' ,'categories' , 'product_categories'))->with('panel_title', 'ویرایش محصول');
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
