<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\SubCategory;
use Image;

class ProductController extends Controller
{
    public function listProduct()
    {
        $product = DB::table('products')
    				->join('categories','products.category_id','categories.id')
                    ->join('brands','products.brand_id','brands.id')
    				->select('products.*','categories.category_name')
                    ->orderBy('products.id', 'DESC')
    				->get();
        return view('backend.admin.product.list', compact('product'));
    } // End method

    public function addProduct()
    {
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        return view('backend.admin.product.add',compact('category','brand'));
    } // End method

    public function GetSubcat($category_id){
        $cat = DB::table('sub_categories')->where('category_id',$category_id)->get();
        return json_encode($cat);
 
    }

    public function storeProduct(Request $request){

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['availability'] = $request->availability;
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['meta_description'] = $request->meta_description;
        $data['meta_tag'] = $request->meta_tag;
        $data['what_is_the'] = $request->what_is_the;
        $data['specification'] = $request->specification;
        $data['long_description'] = $request->long_description;
        $data['status'] = 1;


      
        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
        $image_four = $request->image_four;
        $image_five = $request->image_five;
        $image_six = $request->image_six;

       // return response()->json($data); 

    //    if ($image_one && $image_two && $image_three) {
        if ($image_one && $image_two && $image_three && $image_four && $image_five && $image_six) {

        $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
       // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
        Image::make($image_one)->resize(270,270)->save(public_path('media/product/'.$image_one_name));  
        $data['image_one'] = 'media/product/'.$image_one_name;


        $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
         Image::make($image_two)->resize(270,270)->save(public_path('media/product/'.$image_two_name));  
         $data['image_two'] = 'media/product/'.$image_two_name;

         $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
         // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
          Image::make($image_three)->resize(270,270)->save(public_path('media/product/'.$image_three_name));  
          $data['image_three'] = 'media/product/'.$image_three_name;

         $image_four_name = hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
         // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
          Image::make($image_four)->resize(270,270)->save(public_path('media/product/'.$image_four_name));  
          $data['image_four'] = 'media/product/'.$image_four_name;

         $image_five_name = hexdec(uniqid()).'.'.$image_five->getClientOriginalExtension();
         // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
          Image::make($image_five)->resize(270,270)->save(public_path('media/product/'.$image_five_name));  
          $data['image_five'] = 'media/product/'.$image_five_name;

         $image_six_name = hexdec(uniqid()).'.'.$image_six->getClientOriginalExtension();
         // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
          Image::make($image_six)->resize(270,270)->save(public_path('media/product/'.$image_six_name));  
          $data['image_six'] = 'media/product/'.$image_six_name;


        // $image_one = $request->file('image_one');
        // $filename = time() . '.' . $image_one->getClientOriginalExtension();
        // $path = public_path('public/media/product/' . $filename);
   
        // $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        // Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
        // $data['image_two'] = 'public/media/product/'.$image_two_name;
   
   
        // $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        // Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
        // $data['image_three'] = 'public/media/product/'.$image_three_name;
   
    //     $product = DB::table('products')->insert($data);
    //      $notification=array(
    //            'messege'=>'Product Inserted Successfully',
    //            'alert-type'=>'success'
    //             );
    //           return Redirect()->back()->with($notification);
    
    Product::create($data);
       return Redirect()->route('list.product')->with('success', 'Product Added Successfully!');


       }
    
    } // End Method

    public function deleteProduct($id){

        // $product = DB::table('products')->where('id',$id)->first();

        // $image1 = $product->image_one;
        // $image2 = $product->image_two;
        // $image3 = $product->image_three;
        // unlink($image1);
        // unlink($image2);
        // unlink($image3);

        DB::table('products')->where('id',$id)->delete();

        return Redirect()->route('list.product')->with('success', 'Product Deleted Successfully!');

    } // End Method

    public function editProduct($id){
        $product = DB::table('products')->where('id',$id)->first();
        return view('backend.admin.product.edit',compact('product'));
  
    } // End Method

    public function updateWithoutImgProduct(Request $request,$id){

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['availability'] = $request->availability;
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['meta_description'] = $request->meta_description;
        $data['meta_tag'] = $request->meta_tag;
        $data['what_is_the'] = $request->what_is_the;
        $data['specification'] = $request->specification;
        $data['long_description'] = $request->long_description;

        DB::table('products')->where('id',$id)->update($data);

        return Redirect()->route('list.product')->with('success', 'Product updated Without Image Successfully!');

    } // End Method

    public function updateWithImgProduct(Request $request,$id){

        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;
        $old_four = $request->old_four;
        $old_five = $request->old_five;
        $old_six = $request->old_six;

        $data = array();
 	
        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');
        $image_four = $request->file('image_four');
        $image_five = $request->file('image_five');
        $image_six = $request->file('image_six');

        if ($image_one && $image_two && $image_three && $image_four && $image_five && $image_six) {
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
          Image::make($image_one)->resize(270,270)->save(public_path('media/product/'.$image_one_name));  
            $data['image_one'] = 'media/product/'.$image_one_name;
    
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($image_two)->resize(270,270)->save(public_path('media/product/'.$image_two_name));  
             $data['image_two'] = 'media/product/'.$image_two_name;
    
             $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
             // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            Image::make($image_three)->resize(270,270)->save(public_path('media/product/'.$image_three_name));  
              $data['image_three'] = 'media/product/'.$image_three_name;

              $image_four_name = hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
              // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
               Image::make($image_four)->resize(270,270)->save(public_path('media/product/'.$image_four_name));  
               $data['image_four'] = 'media/product/'.$image_four_name;
     
              $image_five_name = hexdec(uniqid()).'.'.$image_five->getClientOriginalExtension();
              // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
               Image::make($image_five)->resize(270,270)->save(public_path('media/product/'.$image_five_name));  
               $data['image_five'] = 'media/product/'.$image_five_name;
     
              $image_six_name = hexdec(uniqid()).'.'.$image_six->getClientOriginalExtension();
              // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
               Image::make($image_six)->resize(270,270)->save(public_path('media/product/'.$image_six_name));  
               $data['image_six'] = 'media/product/'.$image_six_name;
    
          
        
              DB::table('products')->where('id',$id)->update($data);
            
        return Redirect()->route('list.product')->with('success', 'Product Image Updated Successfully!');

        }

        // if ($image_one) {

        //     unlink($old_one);
        // $image_name = date('dmy_H_s_i');
        // $ext = strtolower($image_one->getClientOriginalExtension());
        // $image_full_name = $image_name.'.'.$ext;
        // $upload_path = 'media/product/';
        // $image_url = $upload_path.$image_full_name;
        // $image_one->move($upload_path,$image_full_name);

        // $data['image_one'] = $image_url;

        // DB::table('products')->where('id',$id)->update($data);

        // return Redirect()->route('list.product')->with('success', 'Product Thumbnail Image Updated Successfully!');

        // }

        // if ($image_two) {

        //     unlink($old_two);
        //     $image_name = date('dmy_H_s_i');
        //     $ext = strtolower($image_two->getClientOriginalExtension());
        //     $image_full_name = $image_name.'.'.$ext;
        //     $upload_path = 'media/product/';
        //     $image_url = $upload_path.$image_full_name;
        //     $image_two->move($upload_path,$image_full_name);
            
        //     $data['image_two'] = $image_url;
            
        //     DB::table('products')->where('id',$id)->update($data);
            
        //     return Redirect()->route('list.product')->with('success', 'Product Image Two Updated Successfully!');
            
        //     }
            
        //     if ($image_three) {
            
        //     unlink($old_three);
        //     $image_name = date('dmy_H_s_i');
        //     $ext = strtolower($image_three->getClientOriginalExtension());
        //     $image_full_name = $image_name.'.'.$ext;
        //     $upload_path = 'media/product/';
        //     $image_url = $upload_path.$image_full_name;
        //     $image_three->move($upload_path,$image_full_name);
            
        //     $data['image_three'] = $image_url;
            
        //     DB::table('products')->where('id',$id)->update($data);
            
        //     return Redirect()->route('list.product')->with('success', 'Product Image Three Updated Successfully!');
            
        //     }


    } // End Method

    public function detailsProduct(Request $request, $id){

        $product = DB::table('products')
    				->join('categories','products.category_id','categories.id')
    				->join('sub_categories','products.subcategory_id','sub_categories.id')
    				->join('brands','products.brand_id','brands.id')
    				->select('products.*','categories.category_name','brands.brand_name','sub_categories.subcategory_name')
    				->where('products.id',$id)
    				->first();
        return view('backend.admin.product.details',compact('product'));
        } // End method


    public function inactive($id){
        DB::table('products')->where('id',$id)->update(['status'=>0]);
      
            return Redirect()->back()->with('success', 'Inactive Successfully!');
    }
 
 
      public function active($id){
        DB::table('products')->where('id',$id)->update(['status'=>1]);
      
            return Redirect()->back()->with('success', 'Active Successfully!');
    }

}
