<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        $panel_tilte = 'لیست کاربران';
        return view('admin.user.index' , compact('users' , 'panel_tilte'));
    }


    public function create()
    {
        $panel_tilte = 'اضافه کردن کاربر جدید';
        return view('admin.user.create' , compact('panel_tilte'));
    }

    public function store(Request $request)
    {
        $userData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->has('phoneNumber')){
            $userData['phoneNumber'] = $request->input('phoneNumber');
        }
        if ($request->has('address')){
            $userData['address'] = $request->input('address');
        }
        if ($request->has('postal_code')){
            $userData['postal_code'] = $request->input('postal_code');
        }
        $userData['role'] = $request->input('role');

        $newUser = User::create($userData);

        if ($newUser){
            return redirect()->route('admin.user.list')->with('success' , 'کاربر جدید با موفقیت اضافه شد.');
        }

    }

    public function edit($id)
    {
        $userItem = User::find($id);
        $panel_title = 'ویرایش کاربر';
        return view('admin.user.edit' , compact('userItem' ,'panel_title') );

    }

    public function update(Request $request , $id)
    {

        $user = User::find($id);

        $userData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->has('password')){
            $userData['password'] = $request->input('password');
        }

        if (empty(request()->input('password'))) {
            unset($userData['password']);
        }

        if ($request->has('phoneNumber')){
            $userData['phoneNumber'] = $request->input('phoneNumber');
        }
        if ($request->has('address')){
            $userData['address'] = $request->input('address');
        }
        if ($request->has('postal_code')){
            $userData['postal_code'] = $request->input('postal_code');
        }
        $userData['role'] = $request->input('role');

        $result = $user->update($userData);
        $user->touch();

        if ($result){
            return redirect()->route('admin.user.list')->with('success' , 'کاربر مورد نظر با موفقیت ویرایش شد.');
        }


    }

    public function delete($id)
    {
        if (auth()->id() == $id){
            return back()->with('success' , 'شما نمیتوانید خود را حذف کنید.');
        }
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.list')->with('success' , 'کاربر مورد نظر با موفقیت حذف شد.');

    }

}
