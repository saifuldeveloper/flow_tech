<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionAnswerController extends Controller
{
    //
    // Order List
    public function listQuestion()
    {

        $questions =
            DB::table('user_questions')
            ->join('products', 'user_questions.product_id', 'products.id')
            ->select('user_questions.*', 'products.product_name')
            ->get();
        return view('backend.admin.question.list', compact('questions'));
    }

    public function answerManage(Request $request)
    {

        $shipping = DB::table('user_questions')

            ->where('id', $request->pk)
            ->first();

        $fieldName = $request->input('name');
        $fieldValue = $request->input('value');

        if ($shipping) {
            if ($fieldName === 'answer') {
                DB::table('user_questions')->where('id', $request->pk)->update(['answer' => $fieldValue]);
            } else {
                return response()->json(['error' => false]);
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true, 'message' => 'Shipping record not found']);
        }
    }

    // addAnswer
    public function addAnswer($id)
    {

        $answer = DB::table('user_questions')
            ->join('products', 'user_questions.product_id', 'products.id')
            ->select('user_questions.*', 'products.product_name')
            ->where('user_questions.id', $id)
            ->first();

        return view('backend.admin.question.edit', compact('answer'));
    }

    public function updateAnswer(Request $request, $id)
    {

        $data = array();
        $data['answer'] = $request->answer;
        $data['question'] = $request->question;
        DB::table('user_questions')->where('id', $id)->update($data);

        return Redirect()->route('list.question')->with('success', 'Question Answre has added Successfully!');
    }
}
