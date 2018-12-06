<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingMethodController extends Controller
{
    public function index()
    {
        $shippingMethods = ShippingMethod::all();
        return view('admin.shippingMethod.list' , compact('shippingMethods'))->with('panel_title','لیست روش های پست محصول');
    }

    public function create()
    {
        return view('admin.shippingMethod.create');
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
            return redirect()->route('admin.shippingMethods.list')->with('success' , 'روش پست جدید با موفقیت ثبت شد.-');
        }
    }

    public function edit(Request $request, $id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function remove(Request $request, $id)
    {

    }

}
