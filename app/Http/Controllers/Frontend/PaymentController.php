<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Session;
use Illuminate\Support\Str;

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

        // Function to generate an invoice number
        function generateInvoiceNumber($prefix = 'Inv-') {
            $date = date('Ymd'); // Get the current date in YYYYMMDD format
            $randomString = substr(str_shuffle(str_repeat('0123456789', 4)), 0, 4); // Generate a random string of length 4

            $invoiceNumber = $prefix . $date . '-' . $randomString; // Combine prefix, date, and random string
            return $invoiceNumber;
        }

        // Generate an invoice number
        $invoice_id = generateInvoiceNumber();
        // $url = Str::random(4);
        // $invoice_id = 'Inv-'.$url;
        // $invoice_id = IdGenerator::generate(['table' => 'trackings',
        // 'field'=>'invoice_num', 'length' => 7, 'prefix' => 'Inv-']);
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
        $shipping['invoice_num'] = $invoice_id;
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

    public function OrderTrack(Request $request){
        $check= DB::table('shippings')->where('invoice_num', $request->invoice_num)->first();
        if($check){

                    $track_details = array();
                    $track_details['invoice_num'] = $request->invoice_num;


                    DB::table('trackings')->insert($track_details);

            return view('frontend.pages.congratulations_track');

        }
        else{
            $notify = array('message'=> 'Invalid invoice num', 'alert-type' =>'error');
            return redirect()->back()->with($notify);
        }

    }


}
