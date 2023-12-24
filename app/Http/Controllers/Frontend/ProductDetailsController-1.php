<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class ProductDetailsController extends Controller
{
    public function productView($id, $product_name){

        $product = DB::table('products')
    			->join('categories','products.category_id','categories.id')
    			->join('sub_categories','products.subcategory_id','sub_categories.id')
    			->join('brands','products.brand_id','brands.id')
    			->select('products.*','categories.category_name','sub_categories.subcategory_name','brands.brand_name')
    			->where('products.id',$id)
    			->first();

    	$color = $product->product_color;
    	$product_color = explode(',', $color);
    	
    	$size = $product->product_size;
    	$product_size = explode(',', $size);	

        return view('frontend.pages.product_details',compact('product','product_color','product_size'));

    } // End Method

	public function categoryView($id){

		$category_all = DB::table('products')->where('category_id',$id)->paginate(20);

		return view('frontend.pages.all_category',compact('category_all'));

	} // End Method

	public function addCart(Request $request,$id){

		$product = DB::table('products')->where('id',$id)->first();

        $data = array();

        if($product->discount_price == 0){
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

           // return \Response::json(['success' => 'Successfully Added on your Cart!']);

		   return Redirect()->back()->with('success', 'Product Added Successfully!');
        }else{
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
			$data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            // return \Response::json(['success' => 'Successfully Added on your Cart!']);
			return Redirect()->back()->with('success', 'Product Added Successfully!');
        }

	} // End Method

    public function addCartBuy(Request $request,$id){

		$product = DB::table('products')->where('id',$id)->first();
        // dd($product);

        $data = array();

        if($product->discount_price == 0){
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

           // return \Response::json(['success' => 'Successfully Added on your Cart!']);

           return Redirect('/user/checkout')->with('success', 'Product Added Successfully!');
        }else{
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
			$data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            // return \Response::json(['success' => 'Successfully Added on your Cart!']);
			return Redirect('/user/checkout')->with('success', 'Product Added Successfully!');
        }

	} // End Method
}
