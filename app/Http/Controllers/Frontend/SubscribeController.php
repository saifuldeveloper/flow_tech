<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    public function listSubscribe()
    {
        $subscribe = DB::table('subscribes')->get();
        return view('backend.admin.subscribe.list', compact('subscribe'));
    }
    // End method

    public function storeSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
        $data = array();
        $data['email'] = $request->email;
        DB::table('subscribes')->insert($data);

        return Redirect()->back()->with('success', 'Subscriber Successfully Done!');
    } // End method
}
