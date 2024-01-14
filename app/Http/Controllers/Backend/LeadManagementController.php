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
    public function listOrder(){

        //  $order = DB::table('orders')->get();

        $order = DB::table('orders')
                ->join('shippings','orders.id','shippings.order_id')
                ->select('shippings.*','orders.*')
                ->get();

        // $subcat = DB::table('sub_categories')
        //         ->join('categories','sub_categories.category_id','categories.id')
        //         ->select('sub_categories.*','categories.category_name')
        //         ->where('sub_categories.deleted_at', null)
        //         ->orderBy('sub_categories.subcategory_name', 'desc')
        //         ->get();
        return view('backend.admin.order.list',compact('order'));

    } // End method

    // Order Active Inactive
    public function inactiveOrder($id){

        DB::table('orders')->where('id',$id)->update(['status'=>0]);
      
            return Redirect()->back()->with('success', 'Order Stop Successfully!');
    }

    public function statusUpdate(Request $request,$id)
    {
        $id = $request->id;
        $status = $request->status;
        
        DB::table('orders')->where('id',$id)->update(['status'=>$status]);

        return response()->json([
          "msg"=>'success',
      ]);
      
    }
    
    // end***
    public function detailsOrder(Request $request, $id){

        $order = DB::table('orders')
                    ->join('shippings','orders.id','shippings.order_id')
                    ->join('orders_details','orders.id','orders_details.order_id')
                    ->select('shippings.*','orders.*','orders_details.*')
                    ->where('orders.id',$id)
                    ->first();

        // $product = DB::table('products')
        //             ->join('categories','products.category_id','categories.id')
        //             ->join('sub_categories','products.subcategory_id','sub_categories.id')
        //             ->join('brands','products.brand_id','brands.id')
        //             ->select('products.*','categories.category_name','brands.brand_name','sub_categories.subcategory_name')
        //             ->where('products.id',$id)
        //  
                //    ->first();
        // return view('backend.admin.order.details',compact('product'));
        return view('backend.admin.order.details',compact('order'));
        } // End method


}
