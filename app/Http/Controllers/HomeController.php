<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {


        $homepageActive = DB::table('settings')->value('homepage_active');
        if ($homepageActive == 1) {
            // Redirect to index page
            return view('frontend.pages.index');
        } else {
            // Redirect to home page
            return redirect()->route('homePage');
        }


        // return view('frontend.pages.index');
    }
    public function Home()
    {
        // return view('frontend.pages.home');
        $homepageActive = DB::table('settings')->value('homepage_active');

        // Check the value of homepage_active
        if ($homepageActive == 1) {
            // Redirect to index page
            return redirect()->route('home');
        } else {
            // Redirect to home page
            return view('frontend.pages.home');
        }
    }
    public function Account()
    {
        return view('frontend.pages.account');
        // return view('frontend.pages.userOrderList');
    }
    public function AccountEdit()
    {
        // return view('frontend.pages.account');
        return view('frontend.pages.userAccountEdit');
    }
    public function AccountOrderList()
    {
        // return view('frontend.pages.account');
        return view('frontend.pages.userOrderList');
    }
    public function aboutUs()
    {
        return view('frontend.pages.aboutus');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function contactMessageStore(Request $request){
        $data = DB::table('contacts_us')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        if ($data) {
            // If data insertion is successful, set a success message
            Session::flash('success', 'Message sent successfully!');
        } else {
            // If data insertion fails, set an error message
            Session::flash('error', 'Failed to send message. Please try again.');
        }
        return redirect()->back();
        
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

    public function category()
    {
        $category_all = DB::table('products')->get();
        $meta_info = DB::table('categories')->get();
        return view('frontend.pages.all_category', compact('category_all', 'meta_info'));
    }

    public function BrandAll(){
        $brands =DB::table('brands')->paginate(20);
        return view('frontend.pages.brand_all', compact('brands'));
    }

    public function brand($name){
        $brand =DB::table('brands')->where('brand_name',$name)->first();

        $products=DB::table('products')->where('brand_id' ,$brand->id)->paginate(20);
       return view('frontend.pages.brand_product_show',compact('brand','products'));
    }





    public function Blog()
    {
        $blog_all = DB::table('blogs')->get();
        return view('frontend.pages.all_blog', compact('blog_all'));
    }

    public function SingleBlog($id)
    {
        $blog_catch = DB::table('blogs')->where('id', $id)->first();
        return view('frontend.pages.single_blog', compact('blog_catch'));
    }
}
