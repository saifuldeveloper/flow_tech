<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Mail\OrderConfirmation;
use Cart;
use Illuminate\Support\Facades\Mail;
use Session;

class PaymentController extends Controller
{
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


    //     $productName = 'ss';
    //     $quantity = 1;
    //     $email = 'mdsaiful77336@gmail.com';

       



     

    //     try {
    //         $quantity = 1; // You can set the quantity as needed
        
    //         Mail::to($email)->send(new  OrderConfirmation($productName, $quantity));
        
    //         return 'Order confirmation email sent successfully!';
    //     } catch (\Exception $e) {
    //         return 'Error sending order confirmation email: ' . $e->getMessage();
    //     };



    //     return view('frontend.pages.congratulations_page');

    // } 
    
    public function PaymentProcess(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'shipping' => $request->shipping,
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'subtotal' => $request->subtotal,
            'total' => $request->total,
            'status' => 0,
            'date' => date('d-m-y'),
            'month' => date('F'),
            'year' => date('Y'),
            'created_at' => now(),
        ];

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
        $shipping['shipping_address'] = $request->shipping_address;
        $shipping['city'] = $request->city;
        $shipping['zone'] = $request->zone;
        $shipping['notes'] = $request->notes;
        $shipping['payment'] = $request->payment_method;
        // $shipping['shipping_method'] = $request->shipping_method;
        $shipping['created_at'] = now();
        $order_id = DB::table('orders')->insertGetId($data);
        $invoice_id = IdGenerator::generate([
            'table' => 'shippings',
            'field' => 'invoice_num',
            'length' => 7,
            'prefix' => 'Inv-'
        ]);

        $shipping = [
            'order_id' => $order_id,
            'invoice_num' => $invoice_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'zone' => $request->zone,
            'notes' => $request->notes,
            'payment' => $request->payment_method,
            'created_at' => now(),
        ];

        DB::table('shippings')->insert($shipping);

        $content = Cart::content();

        foreach ($content as $row) {
            $details = [
                'order_id' => $order_id,
                'product_id' => $row->id,
                'product_name' => $row->name,
                'quantity' => $row->qty,
                'singleprice' => $row->price,
                'totalprice' => $row->qty * $row->price,
                'created_at' => now(),
            ];

            DB::table('orders_details')->insert($details);
        }

        Cart::destroy();

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }


        $email =$shipping['email'] ??'';

     

        $order = DB::table('orders')->where('id', $order_id)->first();

        $order_details = DB::table('orders_details')->where('order_id', $order_id)->get();
   

        $shippingData = [
            'order_id'       => $shipping['order_id'],
            'invoice_num'    => $shipping['invoice_num'],
            'name'           => $shipping['name'],
            'phone'          => $shipping['phone'],
            'email'          => $shipping['email'],
            'address'        => $shipping['address'],
            'city'           =>$shipping['city'],
            'zone'           =>$shipping['zone'],
            'notes'          =>$shipping['notes'],
            'payment'        => $shipping['payment'],
            'created_at'     =>$shipping['created_at'],
            'subtotal'       =>$order->subtotal,
            'shipping'       => $order->shipping,
            'total'          => $order->total,
            'order_details'  =>$order_details,
            ];
        try {
            Mail::to($email)->send(new OrderConfirmation($shippingData));
            return view('frontend.pages.congratulations_page');
        } catch (\Exception $e) {
            return 'Error sending order confirmation email: ' . $e->getMessage();
        }

      
    }

    public function congratulations(){

        return view('frontend.pages.congratulations_page');
    }


}
