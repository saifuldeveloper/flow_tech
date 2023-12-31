<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.pages.index');
    }
    public function Home()
    {
        return view('frontend.pages.home');
    }
    public function UserDashboard()
    {
        return view('frontend.user.home');
    }
    public function aboutUs()
    {
        return view('frontend.pages.aboutus');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function refundAndReturn()
    {
        return view('frontend.pages.return_policy');
    }
    public function emi()
    {
        return view('frontend.pages.emi_terms');
    }
    public function policy()
    {
        return view('frontend.pages.privacy_policy');
    }
    public function delivery()
    {
        return view('frontend.pages.onine_delivery');
    }
    public function condition()
    {
        return view('frontend.pages.terms_and_condition');
    }
   public function category(){
    $category_all=DB::table('products')->get();
    return view('frontend.pages.all_category',compact('category_all'));
   }
   public function Blog(){
    $blog_all=DB::table('blogs')->get();
     return view('frontend.pages.all_blog',compact('blog_all'));
   }
   public function SingleBlog($id){
    $blog_catch=DB::table('blogs')->where('id',$id)->first();
     return view('frontend.pages.single_blog',compact('blog_catch'));
   }
}
