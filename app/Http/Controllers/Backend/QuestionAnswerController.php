<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionAnswerController extends Controller
{
    //
    // Order List
    public function listQuestion(){

        $questions =
         DB::table('user_questions')
                ->leftJoin('products','user_questions.product_id','products.id')
                // ->join('categories', 'products.category_id', 'categorie.id')
                ->get();
                // dd($questions);
        return view('backend.admin.question.list',compact('questions'));

    }

    public function answerManage(Request $request){



        $shipping = DB::table('user_questions')
        // ->join('orders', 'orders.id', '=', 'shippings.order_id') // Corrected join statement
        // ->select('shippings.*', 'orders.*')
        ->where('id', $request->pk)
        ->first();

        $fieldName = $request->input('name');
        $fieldValue = $request->input('value');

        if ($shipping) {
            if ($fieldName === 'answer') {
                DB::table('user_questions')->where('id', $request->pk)->update(['answer' => $fieldValue]);
            }
            // elseif ($fieldName === 'shipping') {
            //     DB::table('orders')->where('id', $request->pk)->update(['shipping' => $fieldValue]);
            // } elseif ($fieldName === 'address') {
            //     DB::table('shippings')->where('order_id', $request->pk)->update(['address' => $fieldValue]);
            // }
            else {
                return response()->json(['error' => false]);
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true, 'message' => 'Shipping record not found']);
        }

    }
}
