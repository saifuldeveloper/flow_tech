<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\LeadManagement;

class LeadManagementController extends Controller
{
    // Order List
    public function listOrder()
    {

        // $order = DB::table('orders')
        //         ->join('shippings','orders.id','shippings.order_id')
        //         ->select('shippings.*','orders.*')
        //         ->get();
        $order = DB::table('orders')
            ->join('shippings', 'orders.id', 'shippings.order_id')
            ->select('shippings.*', 'orders.*')
            ->orderBy('orders.id', 'desc')
            ->get();

        return view('backend.admin.order.list', compact('order'));

    } // End method

    // Order Active Inactive
    public function inactiveOrder($id)
    {

        DB::table('orders')->where('id', $id)->update(['status' => 0]);

        return Redirect()->back()->with('success', 'Order Stop Successfully!');
    }

    public function statusUpdate(Request $request, $id)
    {
        $id = $request->id;
        $status = $request->status;

        DB::table('orders')->where('id', $id)->update(['status' => $status]);

        return response()->json([
            "msg" => 'success',
        ]);

    }

    // end***
    public function detailsOrder(Request $request, $id)
    {

        $order = DB::table('orders')
                    ->join('shippings','orders.id','shippings.order_id')
                    ->join('orders_details','orders.id','orders_details.order_id')
                    ->select('shippings.*','orders.*','orders_details.*')
                    ->where('orders.id',$id)
                    ->first();
        return view('backend.admin.order.details',compact('order'));
    } // End method

    //     public function invoiceOrder(Request $request,$id){
    //         $order_shippings = DB::table('shippings')
    //         ->where('order_id',$id)
    //         ->join('shippings', 'orders.id', 'shippings.order_id')
    //         ->join('orders_details', 'orders.id', 'orders_details.order_id')
    //         ->select('shippings.*', 'orders.*', 'orders_details.*')
    //         ->where('orders.id', $id)
    //         ->first();
    //     return view('backend.admin.order.details', compact('order'));
    // } // End method

    public function invoiceOrder(Request $request, $id)
    {
        $order_shippings = DB::table('shippings')
            ->where('order_id', $id)
            ->first();
        // dd($order_shippings);
        $order_details = DB::table('orders_details')
            ->where('order_id', $id)->get();
        $order_charge = DB::table('orders')
            ->where('id', $id)->first();

        return view('backend.admin.order.invoice', compact('id', 'order_details', 'order_shippings', 'order_charge'));

    }


}
