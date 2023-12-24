<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    
    public function listSetting()
    {
        $setting = DB::table('settings')->get();
  	    return view('backend.admin.setting.list',compact('setting'));
    } // End method

    public function addSetting()
    {
        return view('backend.admin.setting.add');
    } // End method

    public function storeSetting(Request $request)
    {

        $request->validate([
            'shopname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
          
        ]);
        $data = array();
        $data['shopname'] = $request->shopname;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['hotlinephone'] = $request->hotlinephone;
        $data['address'] = $request->address;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedIn'] = $request->linkedIn;
        $data['google_maps'] = $request->google_maps;
        $data['instagram'] = $request->instagram;
        $data['computer_laptop_gameingPc'] = $request->computer_laptop_gameingPc;
        $data['Best_laptop'] = $request->Best_laptop;
        $data['Best_desktop'] = $request->Best_desktop;
        $data['shipping_charge'] = $request->shipping_charge;
        $data['emipage'] = $request->emipage;
        $data['policypage'] = $request->policypage;
        $data['contactpage'] = $request->contactpage;
        $data['aboutpage'] = $request->aboutpage;
        $data['conditionpage'] = $request->conditionpage;
        $data['refundpage'] = $request->refundpage;
        $data['message'] = $request->message;
        $data['delivery'] = $request->delivery;

        $logo = $request->logo;

        if ($logo) {
            $logo_name = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($logo)->resize(300,300)->save(public_path('media/logo/'.$logo_name));  
             $data['logo'] = 'media/logo/'.$logo_name;
        }

        DB::table('settings')->insert($data);

        return Redirect()->route('list.setting')->with('success', 'Setting Added Successfully!');
    } // End method

    public function editSetting($id){
        $setting = DB::table('settings')->where('id',$id)->first();
        return view('backend.admin.setting.edit',compact('setting'));
  
    } // End Method

    public function updateSetting(Request $request,$id){

        $data = array();
        $data['shopname'] = $request->shopname;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['hotlinephone'] = $request->hotlinephone;
        $data['address'] = $request->address;
        $data['shipping_charge'] = $request->shipping_charge;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedIn'] = $request->linkedIn;
        $data['google_maps'] = $request->google_maps;
        $data['instagram'] = $request->instagram;
        $data['computer_laptop_gameingPc'] = $request->computer_laptop_gameingPc;
        $data['Best_laptop'] = $request->Best_laptop;
        $data['Best_desktop'] = $request->Best_desktop;
        $data['emipage'] = $request->emipage;
        $data['policypage'] = $request->policypage;
        $data['contactpage'] = $request->contactpage;
        $data['aboutpage'] = $request->aboutpage;
        $data['conditionpage'] = $request->conditionpage;
        $data['refundpage'] = $request->refundpage;
        $data['message'] = $request->message;
        $data['delivery'] = $request->delivery;

        $logo = $request->logo;

        if ($logo) {
            $logo_name = hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($logo)->resize(300,300)->save(public_path('media/logo/'.$logo_name));  
             $data['logo'] = 'media/logo/'.$logo_name;
        }

       
        
        DB::table('settings')->where('id',$id)->update($data);

        return Redirect()->route('list.setting')->with('success', 'Setting Updated Successfully!');

    } // End Method
}
