<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('updated_at', 'DESC')->get();
        $panel_title = 'سفارش ها';
        return view('admin.order.list' , compact('orders' , 'panel_title'));
    }

    public function details($id)
    {
        $order = Order::find($id);
        $products = $order->products()->get();
        $panel_title = 'جزییات سفارش';
        return view('admin.order.details' , compact('order' , 'products' , 'panel_title'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $status = $request->input('status');
        $order->status = $status;
        $order->save();

        return redirect()->route('admin.orders.list')->with('success' , 'سفارش مورد نظر با موفقیت به روز رسانی شد.');
    }
}
