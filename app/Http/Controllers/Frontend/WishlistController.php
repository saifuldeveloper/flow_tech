<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 //use Symfony\Component\HttpFoundation\Response;


class WishlistController extends Controller
{
    public function addWishlist($id){

        $userid = Auth::id();
        $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

        $data = array(
            'user_id' => $userid,
            'product_id' => $id,
        );

        if(Auth::Check()){

            if($check){
               // return Redirect()->back()->with('error', 'Already Has In Your Wishlist!');
               return \Response::json(['error' => 'Already Has In Your Wishlist!']);
            }else{
                DB::table('wishlists')->insert($data);
               // return Redirect()->back()->with('success', 'Add Wishlist Successfully!');
               return \Response::json(['success' => 'Add Wishlist Successfully!']);
            }

        }else{
           // return Redirect()->back()->with('warning', 'Login Your Account First!');
           return \Response::json(['error' => 'Login Your Account First!']);

        
        }

    } // End Method


}
