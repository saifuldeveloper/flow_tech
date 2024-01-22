<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use Cart;
use Session;

class PaymentController extends Controller
{


        public function PaymentProcess(Request $request){

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
        $invoice_id = IdGenerator::generate(['table' => 'shippings',
        'field'=>'invoice_num', 'length' => 7, 'prefix' => 'Inv-']);

        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['invoice_num'] = $invoice_id;
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


        $productName = 'ss';
        $quantity = 1;
        $email = 'mdsaiful77336@gmail.com';


        try {
            $quantity = 1; // You can set the quantity as needed
        
            Mail::to($email)->send(new  OrderConfirmation($productName, $quantity));
        
            return 'Order confirmation email sent successfully!';
        } catch (\Exception $e) {
            return 'Error sending order confirmation email: ' . $e->getMessage();
        };



        return view('frontend.pages.congratulations_page');

    } 
    // public function PaymentProcess(Request $request){

    //     $data = array();
    //     $data['user_id'] = $request->user_id;
    //     $data['shipping'] = $request->shipping;
    //     $data['coupon_name'] = $request->coupon_name;
    //     $data['coupon_discount'] = $request->coupon_discount;
    //     $data['subtotal'] = $request->subtotal;
    //     $data['total'] = $request->total;
    //     $data['status'] = 0;
    //     $data['date'] = date('d-m-y');
    //     $data['month'] = date('F');
    //     $data['year'] = date('Y');
    //     $data['created_at'] = now();
    //     $order_id = DB::table('orders')->insertGetId($data);

    //     // Insert Shipping Table
    //     $invoice_id = IdGenerator::generate(['table' => 'shippings',
    //     'field'=>'invoice_num', 'length' => 7, 'prefix' => 'Inv-']);
    //     $shipping = array();
    //     $shipping['order_id'] = $order_id;
    //     $shipping['invoice_num'] = $invoice_id;
    //     $shipping['name'] = $request->name;
    //     $shipping['phone'] = $request->phone;
    //     $shipping['email'] = $request->email;
    //     $shipping['address'] = $request->address;
    //     $shipping['shipping_address'] = $request->shipping_address;
    //     $shipping['city'] = $request->city;
    //     $shipping['zone'] = $request->zone;
    //     $shipping['notes'] = $request->notes;
    //     $shipping['payment'] = $request->payment_method;
    //     // $shipping['shipping_method'] = $request->shipping_method;
    //     $shipping['created_at'] = now();


    //     DB::table('shippings')->insert($shipping);

    //     // Insert Order Details Table
    //     $content = Cart::Content();
    //     $details = array();

    //     foreach($content as $row) {
    //         $details['order_id'] = $order_id;
    //         $details['product_id'] = $row->id;
    //         $details['product_name'] = $row->name;
    //         $details['quantity'] = $row->qty;
    //         $details['singleprice'] = $row->price;
    //         $details['totalprice'] = $row->qty*$row->price;
    //         $details['created_at'] = now();
    //         DB::table('orders_details')->insert($details);
    //     }

    //     Cart::destroy();
    //     if(Session::has('coupon')){
    //         Session::forget('coupon');
    //     }

    //      return Redirect()->route('user.congratulations')->with('success', 'Order Process Successfully!');

    // } // End Method

    public function congratulations(){

        return view('frontend.pages.congratulations_page');
    }


}
