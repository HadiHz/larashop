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
        $pageTitle = 'پرداخت ها';
        return view('admin.payment.list' , compact('payments' , 'pageTitle'));
    }
}
