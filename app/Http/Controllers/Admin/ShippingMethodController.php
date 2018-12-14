<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use test\Mockery\MockingParameterAndReturnTypesTest;

class ShippingMethodController extends Controller
{
    public function index()
    {
        $shippingMethods = ShippingMethod::all();
        return view('admin.shippingMethod.list' , compact('shippingMethods'))->with('panel_title','لیست روش های پست محصول');
    }

    public function create()
    {
        $panel_title = 'اضافه کردن روش پستی جدید';
        return view('admin.shippingMethod.create' , compact('panel_title') );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'cost' => 'required',
            'description' => 'required',
        ]);

        $new_shipping_method = ShippingMethod::create($data);

        if ($new_shipping_method){
            return redirect()->route('admin.shippingMethods.list')->with('success' , 'روش پست جدید با موفقیت ثبت شد.');
        }
    }

    public function edit(Request $request, $id)
    {
        $shippingItem = ShippingMethod::find($id);
        $panel_title = 'ویرایش روش پست';
        return view('admin.shippingMethod.edit' , compact('shippingItem' , 'panel_title'));
        
    }

    public function update(Request $request, $id)
    {

        $shipMethod = ShippingMethod::find($id);

        $data = $request->validate([
            'name' => 'required',
            'cost' => 'required',
            'description' => 'required',
        ]);

        $result = $shipMethod->update($data);

        if ($result){
            return redirect()->route('admin.shippingMethods.list')->with('success' , 'روش پست مورد نظر با موفقیت ویرایش شد.');
        }
        
    }

    public function remove(Request $request, $id)
    {

        $shipMethod = ShippingMethod::find($id);

        $shipMethod->delete();

        return redirect()->route('admin.shippingMethods.list')->with('success' , 'روش پست مورد نظر با موفقیت حذف شد.');

    }

}
