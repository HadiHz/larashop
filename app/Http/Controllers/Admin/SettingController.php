<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index($id = null)
    {
        if ($id){
            $setting = Setting::find($id);
        }else{
            $setting = Setting::get()->first();
        }


        $panel_title = 'تنظیمات سایت';
        return view('admin.setting.index', compact('setting' , 'panel_title'));

    }


    public function store(Request $request, $id = null)
    {

//        dd($request->all());

        $setting = Setting::find($id);

        if ($setting) {
            $data = $request->validate([
                'name' => 'required',
                'slogan' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'aboutUs' => 'required',
                'contactUs' => 'required',
            ]);

            if ($request->hasFile('image_path')) {

                $result = File::delete(public_path() . $setting->image_path);

                $imageName = $request->File('logoImagePath')->getClientOriginalName();
                $request->file('logoImagePath')->move(public_path('logo'), $imageName);
                $imagePath = DIRECTORY_SEPARATOR . 'logo' . DIRECTORY_SEPARATOR . $imageName;

                $data['logoImagePath'] = $imagePath;


            }

            $setting->update($data);

            return redirect()->route('admin.setting')->with('success' , 'تنظیمات سایت با موفقیت به روز رسانی شد.');


        }else{
            $data = $request->validate([
                'name' => 'required',
                'slogan' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'aboutUs' => 'required',
                'contactUs' => 'required',
                'logoImagePath' => 'required',
            ]);


            $imageName = $request->File('logoImagePath')->getClientOriginalName();
            $request->file('logoImagePath')->move(public_path('logo'), $imageName);
            $imagePath = DIRECTORY_SEPARATOR . 'logo' . DIRECTORY_SEPARATOR . $imageName;

            $data['logoImagePath'] = $imagePath;

            Setting::create($data);

            return redirect()->route('admin.setting')->with('success' , 'تنظیمات با موفقیت ثبت شد.');


        }
    }


    public function gatewaySetting(){
        $setting = Setting::find(1);
        if ($setting){
            $panel_title = 'تنظیمات درگاه';
            return view('admin.setting.gateway', compact('setting' , 'panel_title'));

        }else{
            $setting = Setting::get()->first();
            $panel_title = 'تنظیمات درگاه';
            return view('admin.setting.gateway', compact('setting' , 'panel_title'));

        }



    }


    public function updateGatewaySettings(Request $request)
    {

//        dd($request->all());
        $data = $request->validate([
            'mellatTerminalID' => 'required',
            'mellatUsername' => 'required',
            'mellatPassword' => 'required',
        ]);

        $setting = Setting::find(1);

        $setting->update($data);

        return redirect()->route('admin.setting.gateway')->with('success' , 'تنظیمات با موفقیت ثبت شد.');
    }

}
