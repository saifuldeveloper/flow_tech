<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class UserReviewController extends Controller
{
    public function review(Request $request, $id)
    {

        return view('frontend.pages.review', compact('id'));
    } // End metho
    public function reviewSection(Request $request)
    {
        // dd($request->all());


        $data = array();
        $data['product_id'] = $request->product_id;
        $data['user_id'] = $request->user_id;
        $data['ratting'] = $request->ratting;
        $data['comments'] = $request->comments;
        $data['created_at'] = Carbon::now();

        Rating::create($data);

        return view('frontend.pages.review_success');

    } // End method
    public function question(Request $request, $id)
    {
        // dd($id);

        return view('frontend.pages.query', compact('id'));

    } // End method
    public function questionSection(Request $request)
    {
        // dd($request->all());



        $data = array();
        $data['product_id'] = $request->product_id;
        $data['user_id'] = $request->user_id;
        $data['question'] = $request->question;
        $data['created_at'] = Carbon::now();
        // dd($data);
        UserQuestion::create($data);

        return view('frontend.pages.query_success');
    } // End method


    public function reviewList(){
        $reviews =Rating::with('user','product')->orderBy('id','desc')->get();

        return view('backend.admin.review.review_list',compact('reviews'));
    }



    public function reviewStatuschages(Request $request, $id){

        $status = $request->status;

        DB::table('ratings')->where('id', $id)->update(['active_status' => $status]);



        return response()->json([
            "msg" => 'success',
        ]);
        
    



    }
}

