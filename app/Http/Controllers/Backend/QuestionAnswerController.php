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
                // ->select('shippings.*','orders.*')
                ->get();
        return view('backend.admin.question.list',compact('questions'));

    }
}
