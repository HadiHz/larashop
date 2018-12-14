<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {

        $pageTitle = 'ورود به سایت';
        return view('frontend.login.login' , compact('pageTitle'));
    }

    public function doRegister(Request $request)
    {
//        $this->validate($request,[],[]);
        $newUserDate = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $newUser = User::create($newUserDate);
        if ($newUser && $newUser instanceof User) {
            return redirect('/');
        }
        return redirect()->back()->with('registerError', 'در فرآیند ثبت نام خطایی رخ داده است. لطفا بعدا امتحان کنید');
    }


    public function doLogin(Request $request)
    {
        $remember = $request->has('remember');
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
            $user = Auth::user();
            return redirect()->intended('/');
        }
        return redirect()->back()->with('loginError', 'ایمیل یا کلمه عبور اشتباه می باشد');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function dashboard()
    {

        $currentUser = \auth()->user();


        $panel_title = 'مشخصات کاربر';

        return view('frontend.user.dashboard.dashboard' , compact('currentUser' , 'panel_title'));

    }

    public function updateUser(Request $request)
    {

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        if ($request->has('phoneNumber')) {
            $data['phoneNumber'] = $request->input('phoneNumber');
        }
        if ($request->has('address')) {
            $data['address'] = $request->input('address');
        }
        if ($request->has('postal_code')) {
            $data['postal_code'] = $request->input('postal_code');
        }

        $currentUser = \auth()->user();

        $currentUser->update($data);

        $currentUser->touch();

        return redirect()->route('user.dashboard')->with('success' , 'ویرایش با موفقیت انجام شد.');



    }

    public function changePassword()
    {
        $panel_title = 'تغییر رمز عبور';
        return view('frontend.user.dashboard.changePassword' , compact('panel_title'));
        
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        $current_password = Auth::User()->password;
        if(Hash::check($request['old_password'], $current_password)) {
            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = $request['new_password'];
            $obj_user->save();

            return redirect()->route('user.dashboard')->with('success' , 'رمز عبور با موفقیت تغییر کرد.');
        }

        return back()->with('notification' , 'رمز عبور قبلی اشتباه است.');

    }

    public function showOrders()
    {
        $currentUser = \auth()->user();
        $orders = $currentUser->orders()->get();
        $panel_title = 'سفارش ها';
        return view('frontend.user.order.index' , compact('orders' , 'panel_title'));
    }

    public function showOrderDetails($id)
    {
        $order = Order::find($id);

        $products = $order->products()->get();

        $panel_title = 'جزییات سفارش';
        return view('frontend.user.order.details' , compact('order' , 'products' , 'panel_title'));
    }


    public function showPayments()
    {
        $currentUser = \auth()->user();

        $payments = $currentUser->payments()->get();
        $panel_title = 'پرداخت ها';

        return view('frontend.user.payment.index' , compact('payments' , 'panel_title'));

    }
}
