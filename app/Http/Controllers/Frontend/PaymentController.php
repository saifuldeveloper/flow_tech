<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Session;

class PaymentController extends Controller
{
    public function PaymentProcess(Request $request){

        // $payment = $request->payment;
        // echo "$payment";

        // $data = array();
        // $data['name'] = $request->name;
        // $data['phone'] = $request->phone;
        // $data['address'] = $request->address;
        // $data['city'] = $request->city;
        // $data['notes'] = $request->notes;
        // $data['payment'] = $request->payment;
       
        // dd($data);

        // if($request->payment == 'cash_on_delivery'){

        //     return view('frontend.pages.payment.cash_on_delivery');
        // }

        $data = array();
        $data['user_id'] = $request->user_id;
        $data['shipping'] = $request->shipping;
        $data['coupon_name'] = $request->coupon_name;
        $data['coupon_discount'] = $request->coupon_discount;
        $data['subtotal'] = $request->subtotal;
        $data['total'] = $request->total;
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $data['created_at'] = now();
        $order_id = DB::table('orders')->insertGetId($data);
        
        // Insert Shipping Table
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['name'] = $request->name;
        $shipping['phone'] = $request->phone;
        $shipping['email'] = $request->email;
        $shipping['address'] = $request->address;
        $shipping['city'] = $request->city;
        $shipping['zone'] = $request->zone;
        $shipping['notes'] = $request->notes;
        $shipping['payment'] = $request->payment_method;
        // $shipping['shipping_method'] = $request->shipping_method;
        $shipping['created_at'] = now();


        DB::table('shippings')->insert($shipping);

        // Insert Order Details Table
        $content = Cart::Content();
        $details = array();

        foreach($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['quantity'] = $row->qty;
            $details['singleprice'] = $row->price;
            $details['totalprice'] = $row->qty*$row->price;
            $details['created_at'] = now();
            DB::table('orders_details')->insert($details);
        }

        Cart::destroy();
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
      
         return Redirect()->route('user.congratulations')->with('success', 'Order Process Successfully!');

    } // End Method

    public function congratulations(){

        return view('frontend.pages.congratulations_page');
    }


}
