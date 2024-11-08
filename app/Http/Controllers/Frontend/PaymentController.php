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


    public function PaymentProcess(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'shipping' => $request->shipping,
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'subtotal' => $request->subtotal,
            'payment_number' => $request->payment_number,
            'payment_type' => $request->online,
            'transactionID' => $request->transaction_id,
            'total' => $request->total,
            'status' => 'pending',
            'date' => date('d-m-y'),
            'month' => date('F'),
            'year' => date('Y'),
            'created_at' => now(),
        ];

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

        $test = DB::table('shippings')->insert($shipping);
        $test1 =  DB::table('shippings')->where('id', $shipping['order_id'])->first();
        // dd($test1);

        $content = Cart::content();

        foreach ($content as $row) {
            $details = [
                'order_id' => $order_id,
                'product_id' => $row->id,
                'brand_id' => $row->options->brand_id,
                'category_id' => $row->options->category_id,
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


        $email = $shipping['email'] ?? '';

        $order = DB::table('orders')->where('id', $order_id)->first();

        $order_details = DB::table('orders_details')->where('order_id', $order_id)->get();


        $shippingData = [
            'order_id'       => $shipping['order_id'],
            'invoice_num'    => $shipping['invoice_num'],
            'name'           => $shipping['name'],
            'phone'          => $shipping['phone'],
            'email'          => $shipping['email'],
            'address'        => $shipping['address'],
            'city'           => $shipping['city'],
            'zone'           => $shipping['zone'],
            'notes'          => $shipping['notes'],
            'payment'        => $shipping['payment'],
            'created_at'     => $shipping['created_at'],
            'subtotal'       => $order->subtotal,
            'shipping'       => $order->shipping,
            'total'          => $order->total,
            'order_details'  => $order_details,
        ];
        try {
            Mail::to('info@flowtechbd.com')->cc($email)->send(new OrderConfirmation($shippingData));
            return view('frontend.pages.congratulations_page');
        } catch (\Exception $e) {
            // return 'Error sending order confirmation email: ' . $e->getMessage();

            return view('frontend.pages.congratulations_page');
        }
    }

    public function congratulations()
    {

        return view('frontend.pages.congratulations_page');
    }
}
