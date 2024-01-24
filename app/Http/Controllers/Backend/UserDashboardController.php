<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    //
    public function statusUpdate(Request $request, $id)
    {
        $id = $request->id;
        $pass = $request->old_password;
        $status = $request->confirm_password;
        $dbpass = DB::table('users')->where('id', $id)->value('password');

        if($pass === $dbpass){

            DB::table('users')->where('id', $id)->update(['password' => $status]);
        }


        return response()->json([
            "msg" => 'success',
        ]);

    }
}
