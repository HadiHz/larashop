<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
            return redirect('/');
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
        
    }
}
