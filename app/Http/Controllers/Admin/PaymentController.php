<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('updated_at', 'DESC')->get();
        $panel_title = 'پرداخت ها';
        return view('admin.payment.list' , compact('payments' , 'panel_title'));
    }
}
