<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $categories = Category::all()->groupBy('parent_id');
        return $categories;
        dd($categories);
        return view('admin.category.list' , compact('categories'))->with('panel_title','لیست دسته بندی ها');
    }

    public function create() {
        $categories = Category::all();
        return view('admin.category.create' , compact('categories'))->with('panel_title','ایجاد دسته بندی جدید');
    }

    public function store( Request $request ) {


        $request->validate([
            'name' => 'required',
        ]);

        $new_category= Category::create([
            'name' => $request->input('name')
        ]);

        if ($request->input('parent_category')){
            $new_category->parent_id = $request->input('parent_category');
            $new_category->save();
        }



        if($new_category){
            return redirect()->route('admin.categories.list')->with('success','دسته بندی جدید با موفقیت ایجاد شد.');
        }
    }

    public function edit( Request $request, $category_id ) {

        $catItem = Category::find($category_id);
        $categories = Category::all()->except($category_id);
        $parent_category = $catItem->parent()->first();
        if (isset($parent_category)){
            $parent_category = $parent_category->id;
        }

        return view('admin.category.edit',compact('catItem' , 'categories' , 'parent_category'));
    }


    public function update( Request $request,$category_id ) {


        $request->validate([
            'name' => 'required',
        ]);

        $catItem = Category::find($category_id);
        $updateResult = $catItem->update([
            'name' => $request->input('name')
        ]);

        if ($request->input('parent_category')){
            $catItem->parent_id = $request->input('parent_category');
            $catItem->save();
        }

        if($updateResult){
            $catItem->touch(); // this code updates updated_at
            return redirect()->route('admin.categories.list')->with('success','اطلاعات با موفقیت به روز رسانی شد');

        }
    }

    public function remove( Request $request, $category_id ) {
        $removeResult = Category::destroy([$category_id]);

        return redirect()->route('admin.categories.list')->with('success','عملیات با موفقیت انجام شد.');


    }
}
