<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    
    public function listCoupon()
    {
        $coupon = DB::table('coupons')->get();
  	    return view('backend.admin.coupon.list',compact('coupon'));
    } // End method

    public function addCoupon()
    {
        return view('backend.admin.coupon.add');
    } // End method

    public function storeCoupon(Request $request)
    {

        $request->validate([
            'coupon' => 'required',
            'discount' => 'required',
          
        ]);
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);

        return Redirect()->route('list.coupon')->with('success', 'Coupon Added Successfully!');
    } // End method

    public function deleteCoupon($id)
    {

        DB::table('coupons')->where('id',$id)->delete();
        return Redirect()->back()->with('error', 'Successfully Deleted');
    } // End method

    public function detailsCoupon(Request $request, $id){

       $coupon = DB::table('coupons')->where('id',$id)->first();
        return view('backend.admin.coupon.details',compact('coupon'));
        } // End method

        public function editCoupon($id){

            $coupon = DB::table('coupons')->where('id',$id)->first();
            return view('backend.admin.coupon.edit',compact('coupon'));
        } // End method

        public function updateCoupon(Request $request, $id){

            $request->validate([
                'coupon' => 'required',
                'discount' => 'required',
              
            ]);
    
            $data = array();
            $data['coupon'] = $request->coupon;
            $data['discount'] = $request->discount;
            DB::table('coupons')->where('id',$id)->update($data);
        
                return Redirect()->route('list.coupon')->with('success', 'Category Successfully Updated');
            } // End method
}
