<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactusController extends Controller
{
    //

    public function list(){
        $datalist =DB::table('contacts_us')->get();
       
        return view('backend.admin.contacts_us.list',compact('datalist'));

    }

    public function delete($id){
      
        $data= DB::table('contacts_us')->where('id',$id)->delete();

        return Redirect()->route('contact-us.list')->with('success', 'Data Deleted Successfully!');

    }
}
