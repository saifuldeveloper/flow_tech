<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
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

    	// $color = $product->product_color;
    	// $product_color = explode(',', $color);
    	
    	// $size = $product->product_size;
    	// $product_size = explode(',', $size);	

        return view('frontend.pages.product_details',compact('product'));

    } // End Method

    public function LatestOfferPage(){

        $product =  Product::where('main_slider',1)->get();
        return view('frontend.pages.latest_offer_page',compact('product'));

    } // End Method

    // public function AllproductView(){

    //     $product =  Product::where('status',1)->paginate(12);
    //     return view('frontend.pages.all_product',compact('product'));

    // } // End Method
    public function AllproductView(){
        $products = DB::table('products')
    			->join('categories','products.category_id','categories.id')
    			->join('sub_categories','products.subcategory_id','sub_categories.id')
    			->join('brands','products.brand_id','brands.id')
    			->select('products.*','categories.category_name','sub_categories.subcategory_name','brands.brand_name')
    			->query();



        if (!empty($_GET['availability'])) {
            $slugs = explode(',',$_GET['availability']);
            $catIds = Product::select('id')->whereIn('availability',$slugs)->pluck('id')->toArray();
           $products = Product::whereIn('availability',$catIds)->get();
        } 
        if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_name',$slugs)->pluck('id')->toArray();
           $products = Product::whereIn('brand_id',$brandIds)->get();
        } else{
             $products = Product::where('status',1)->orderBy('id','DESC')->get();
         } 
 
        

     
      $availability = Product::orderBy('availability','ASC')->get(); 
      $brands = Brand::orderBy('brand_name','ASC')->get();

      return view('frontend.pages.all_product',compact('products','availability','brands'));

    } // End Method 


	public function categoryView($id){

		$category_all = DB::table('products')->where('category_id',$id)->paginate(20);

		return view('frontend.pages.all_category',compact('category_all'));

	} // End Method

public function addCart(Request $request, $id)
{
    $product = DB::table('products')->where('id', $id)->first();
    $data = array();

    if ($request->input('action') === 'add_to_cart') {
        if ($product->discount_price == 0) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            return redirect()->back()->with('success', 'Product Added Successfully!');
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            return redirect()->back()->with('success', 'Product Added Successfully!');
        }
    } elseif ($request->input('action') === 'buy_now') {

        if ($product->discount_price == 0) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            return redirect('/user/checkout')->with('success', 'Product Added Successfully!');
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            return redirect('/user/checkout')->with('success', 'Product Added Successfully!');
        }
    }
}
// *********************************************************************************************
public function addCartCombo(Request $request, $id)
{
    $product = DB::table('combos')->where('id', $id)->first();
    $data = array();

    if ($request->input('action') === 'add_to_cart') {
        if ($product->first_discount_price == 0) {
            $data['id'] = $product->id;
            $data['name'] = $product->first_product_name;
            $data['qty'] = 1;
            $data['price'] = $product->first_selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            return redirect()->back()->with('success', 'Product Added Successfully!');
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->first_product_name;
            $data['qty'] = 1;
            $data['price'] = $product->first_discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            return redirect()->back()->with('success', 'Product Added Successfully!');
        }
    // } elseif ($request->input('action') === 'buy_now') {

    //     if ($product->discount_price == 0) {
    //         $data['id'] = $product->id;
    //         $data['name'] = $product->product_name;
    //         $data['qty'] = $request->qty;
    //         $data['price'] = $product->selling_price;
    //         $data['weight'] = 1;
    //         $data['options']['image'] = $product->image_one;
    //         $data['options']['color'] = $request->color;
    //         $data['options']['size'] = $request->size;
    //         Cart::add($data);

    //         return redirect('/user/checkout')->with('success', 'Product Added Successfully!');
    //     } else {
    //         $data['id'] = $product->id;
    //         $data['name'] = $product->product_name;
    //         $data['qty'] = $request->qty;
    //         $data['price'] = $product->discount_price;
    //         $data['weight'] = 1;
    //         $data['options']['image'] = $product->image_one;
    //         $data['options']['color'] = $request->color;
    //         $data['options']['size'] = $request->size;
    //         Cart::add($data);

    //         return redirect('/user/checkout')->with('success', 'Product Added Successfully!');
    //     }
    }
}
//********************************************************************************************************** */
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


    //************************************************************************************************************** */
    public function SubCategoryView($id){
        
        // $category_all = DB::table('products')->where('category_id',$id)->get();
        $category_all = Product::where('category_id',$id)->paginate(12);
        return view('frontend.pages.category_product_show',compact('category_all'));

    } // End Method



    public function Search(Request $request)
    {
        $item = $request->input('search'); // Retrieve the search input from the request.

        $product = DB::table('products')
            ->where('product_name', 'LIKE', '%'.$item.'%')
            ->first();// Use first() to get a single product


        if ($product) {
            return redirect(
                '/product/details/' . $product->id . '/' . $product->product_name,
            );
        } else {
            // Handle the case when no product is found
            // You can return an error message or redirect to a search page
            return redirect()->back('error', 'Product not found');
        }

    }


public function ProductListAjax()
    {
        $products = Product::select('product_name')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = [
                'value' => $item->product_name,
            ];
        }

        // return response()->json($data);
        return $data;
    }

    public function BrandFilter(Request $request){
        $selectedBrands = $request->input('brandfilter');
             // If no brands are selected, you may want to handle this case or show all data
            if (empty($selectedBrands)) {
                $product = Product::paginate(12);
            } else {
                $product = Product::whereIn('brand_id', $selectedBrands)->paginate(8);
            }
         return view('frontend.pages.all_product',compact('product'));
    

    }
    

    public function AvailabilityFilter(Request $request){

        $selectedavailability = $request->input('availability');
    
        if (empty($selectedavailability)) {
            $product = Product::paginate(12);
        } else {
            $product = Product::whereIn('availability', $selectedavailability)->paginate(8);
        }
         return view('frontend.pages.all_product',compact('product'));
    }

    public function PriceFilter(Request $request){

   

        $minvalue = $request->min;
        $maxvalue = $request->max;


       
        $products = Product::whereBetween('selling_price', [$minvalue, $maxvalue])
        ->get();


        if ($products->count() > 0) {
            return view('frontend.pages.filtertProduct', compact('products'));
        } else {
            return  "No Product Found";
        }

        //  $product = Product::whereRaw("CAST(selling_price AS UNSIGNED) >= ?", [$minvalue])->whereRaw("CAST(selling_price AS UNSIGNED) <= ?", [$maxvalue])->paginate(8);
    
        // return view('frontend.pages.all_product', compact('product'));
        
    }
    // Super Filter by limon


    public function SuperFilterbrand(Request $request)
    {
            $brandname = $request->input('brand');

            $$products = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.brand_id')
            ->whereIn('brand', $brandname)
            ->get();
        

        if ($products->count() > 0) {
            return view('frontend.pages.filtertProduct', compact('products'));
        } else {
            return  "No Product Found";
        }

            
    }
    public function SuperFilteravailable(Request $request)
    {
            $available = $request->input('availability');

            $products = DB::table('products')
            ->whereInwhereIn('availability', $available)
            ->get();
 
        if ($products->count() > 0) {
            return view('frontend.pages.filtertProduct', compact('products'));
        } else {
            return  "No Product Found";
        }

    }
    //end suepr filter

    //************************************************************************************************ */
     //this section is all category product search 
    //************************************************************************************************ */
    public function BrandFilterCategory(Request $request){

        $selectedBrands = $request->input('brandfilter');
        $id=$request->id;
             // If no brands are selected, you may want to handle this case or show all data
            if (empty($selectedBrands)) {
                $category_all = Product::where('category_id',$id)->paginate(12);
            } else {
                $category_all = Product::where('category_id',$id)->whereIn('brand_id', $selectedBrands)->paginate(8);
            }
         return view('frontend.pages.category_product_show',compact('category_all'));
    

    }
    public function AvailabilityFiltercategory(Request $request){
          
        $selectedavailability = $request->input('availability');
        $id=$request->id;
    
        if (empty($selectedavailability)) {
            $category_all = Product::where('category_id',$id)->paginate(12);
        } else {
            $category_all = Product::where('category_id',$id)->whereIn('availability', $selectedavailability)->paginate(8);
        }
         return view('frontend.pages.category_product_show',compact('category_all'));
    }
    // public function PriceFiltercategory(Request $request){
    //     $minvalue = $request->min;
    //     $maxvalue = $request->max;
    //     $id=$request->id;

        

    //     if (empty($minvalue) && empty($maxvalue)) {
    //         $category_all = Product::where('category_id',$id)->paginate(12);
    //     } else {
    //         $category_all = Product::where('category_id', $id)
    //         ->whereRaw("CAST(selling_price AS UNSIGNED) >= ?", [$minvalue])
    //         ->whereRaw("CAST(selling_price AS UNSIGNED) <= ?", [$maxvalue])
    //         ->paginate(8);
    //     }
    //      return view('frontend.pages.category_product_show',compact('category_all'));
    // }

    // public function PriceFiltercategory(Request $request){
    //     $minvalue = $request->min;
    //     $maxvalue = $request->max;
    //     $id = $request->id;
    
    //     $products = Product::where('category_id', $id)
    //         ->whereBetween('selling_price', [$minvalue, $maxvalue])
    //         ->paginate(8); // Adjust the pagination count as needed
    
    //     if ($products->count() > 0) {
    //         return view('frontend.pages.category_product_show', compact('products'));
    //     } else {
    //         return "No Product Found";
    //     }
    // }
    public function PriceFiltercategory(Request $request,$id){
        $minvalue = $request->min;
        $maxvalue = $request->max;
        $id = $request->id;
    
        $category_all = Product::where('category_id', $id)
            ->whereBetween('selling_price', [$minvalue, $maxvalue])
            ->get(); 
    
        if ($category_all->count() > 0) {
            return view('frontend.pages.filtertCategoryProduct', compact('category_all'));
        } else {
            return "No Product Found";
        }
    }
    

    // public function PriceFilter1(Request $request){

   

    //     $minvalue = $request->min;
    //     $maxvalue = $request->max;


       
    //     $products = Product::whereBetween('selling_price', [$minvalue, $maxvalue])
    //     ->get();


    //     if ($products->count() > 0) {
    //         return view('frontend.pages.filtertProduct', compact('products'));
    //     } else {
    //         return  "No Product Found";
    //     }
        
    // }

}
