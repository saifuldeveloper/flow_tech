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
        return view('backend.admin.setting.list', compact('setting'));
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
        // $data['computer_laptop_gameingPc'] = $request->computer_laptop_gameingPc;
        // $data['Best_laptop'] = $request->Best_laptop;
        // $data['Best_desktop'] = $request->Best_desktop;
        $data['shipping_charge'] = $request->shipping_charge;
        // $data['emipage'] = $request->emipage;
        // $data['policypage'] = $request->policypage;
        // $data['contactpage'] = $request->contactpage;
        // $data['aboutpage'] = $request->aboutpage;
        // $data['conditionpage'] = $request->conditionpage;
        // $data['refundpage'] = $request->refundpage;
        $data['message'] = $request->message;
        // $data['delivery'] = $request->delivery;

        $logo = $request->logo;

        if ($logo) {
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            Image::make($logo)->resize(300, 300)->save(public_path('media/logo/' . $logo_name));
            $data['logo'] = 'media/logo/' . $logo_name;
        }

        DB::table('settings')->insert($data);

        return Redirect()->route('list.setting')->with('success', 'Setting Added Successfully!');
    } // End method

    public function editSetting($id)
    {
        $setting = DB::table('settings')->where('id', $id)->first();
        return view('backend.admin.setting.edit', compact('setting'));
    } // End Method

    public function updateSetting(Request $request, $id)
    {

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
        // $data['computer_laptop_gameingPc'] = $request->computer_laptop_gameingPc;
        // $data['Best_laptop'] = $request->Best_laptop;
        // $data['Best_desktop'] = $request->Best_desktop;
        // $data['emipage'] = $request->emipage;
        // $data['policypage'] = $request->policypage;
        // $data['contactpage'] = $request->contactpage;
        // $data['aboutpage'] = $request->aboutpage;
        // $data['conditionpage'] = $request->conditionpage;
        // $data['refundpage'] = $request->refundpage;
        $data['message'] = $request->message;
        $data['delivery'] = $request->delivery;

        $logo = $request->logo;

        if ($logo) {
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            Image::make($logo)->resize(300, 300)->save(public_path('media/logo/' . $logo_name));
            $data['logo'] = 'media/logo/' . $logo_name;
        }



        DB::table('settings')->where('id', $id)->update($data);

        return Redirect()->route('list.setting')->with('success', 'Setting Updated Successfully!');
    } // End Method


    public function refundpage()
    {

        return view('backend.admin.setting.refund.refundpage');
    }

    public  function  refundpageUpdate(Request $request)
    {
        DB::table('settings')->where('id', 1)->update(['refundpage' => $request->refundpage]);
        return Redirect()->route('setting.refund.page')->with('success', 'Refund  Updated Successfully!');
    }

    public function onlineDeliveryPage()
    {
        return view('backend.admin.setting.onlineDelevery.online_delivery');
    }
    public  function  onlineDeliveryPageUpdate(Request $request)
    {
        DB::table('settings')->where('id', 1)->update(['delivery' => $request->delivery]);
        return Redirect()->route('oline.delivery.page')->with('success', 'Delivery  Page Updated Successfully!');
    }

    // tems && condion page
    public function termsConditionPage()
    {
        return view('backend.admin.setting.termscondition.termscondition');
    }

    public  function  termsConditionPageUpdate(Request $request)
    {
        DB::table('settings')->where('id', 1)->update(['conditionpage' => $request->conditionpage]);
        return Redirect()->route('terms.condition.page')->with('success', 'Updated Successfully!');
    }

    // abount us page
    public function abountUsPage()
    {
        return view('backend.admin.setting.aboutus.aboutus');
    }
    public  function  abountUsPageUpdate(Request $request)
    {
        DB::table('settings')->where('id', 1)->update(['aboutpage' => $request->aboutpage]);
        return Redirect()->route('aboutus.page')->with('success', 'Updated Successfully!');
    }
    // contact us
    public function contactUsPage()
    {
        return view('backend.admin.setting.contact.contact');
    }
    public  function  contactUsPageUpdate(Request $request)
    {
        DB::table('settings')->where('id', 1)->update(['contactpage' => $request->contactpage]);
        return Redirect()->route('contactus.page')->with('success', 'Updated Successfully!');
    }

    // privacy policy
    public function privacyPolicyPage()
    {
        return view('backend.admin.setting.privacypolycy.privacypolycy');
    }
    public  function  privacyPolicPageUpdate(Request $request)
    {
        DB::table('settings')->where('id', 1)->update(['policypage' => $request->policypage]);
        return Redirect()->route('privacy.policy.page')->with('success', 'Updated Successfully!');
    }


    // Emi page
    public function emiPage()
    {
        return view('backend.admin.setting.emipage.emi');
    }
    public  function  emiPageUpdate(Request $request)
    {
        DB::table('settings')->where('id', 1)->update(['emipage' => $request->emipage]);
        return Redirect()->route('emi.page')->with('success', 'Updated Successfully!');
    }

    // desktopPage page
    public function desktopPage()
    {
        return view('backend.admin.setting.desktop.desktop');
    }
    public  function  desktopPageUpdate(Request $request)
    {
        DB::table('settings')->where('id', 1)->update(['Best_desktop' => $request->Best_desktop]);
        return Redirect()->route('desktop.page')->with('success', 'Updated Successfully!');
    }
    // laptop page
    public function laptopPage()
    {
        return view('backend.admin.setting.laptop.laptop');
    }
    public  function  laptopPageUpdate(Request $request)
    {

        DB::table('settings')->where('id', 1)->update(['Best_laptop' => $request->Best_laptop]);
        return Redirect()->route('laptop.page')->with('success', 'Updated Successfully!');
    }

       // Gamming  page
       public function gammingComputerPage()
       {
           return view('backend.admin.setting.desktop_gammin_pc.gammingpc');
       }
       public  function  gammingComputerPageUpdate(Request $request)
       {
   
           DB::table('settings')->where('id', 1)->update(['computer_laptop_gameingPc' => $request->computer_laptop_gameingPc]);
           return Redirect()->route('gamming.computer.page')->with('success', 'Updated Successfully!');
       }
}
