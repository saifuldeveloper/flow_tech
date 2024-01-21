<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChlildCategory;
use Cart;
use Illuminate\Support\Facades\Storage;

class ProductDetailsController extends Controller
{
    public function productView($product_slug)
    {

        // dd($slug);
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('sub_categories', 'products.subcategory_id', 'sub_categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'sub_categories.subcategory_name', 'brands.brand_name')
            ->where('products.product_slug', $product_slug)
            ->first();


            // dd($product);

        // $color = $product->product_color;
        // $product_color = explode(',', $color);

        // $size = $product->product_size;
        // $product_size = explode(',', $size);

        return view('frontend.pages.product_details', compact('product'));

    } // End Method

    public function LatestOfferPage()
    {

        $product = Product::where('main_slider', 1)->get();
        return view('frontend.pages.latest_offer_page', compact('product'));

    } // End Method

    public function AllproductView()
    {

        $product = Product::where('status', 1)->paginate(12);
        return view('frontend.pages.all_product', compact('product'));

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
    public function addCartBuy(Request $request, $id)
    {

        $product = DB::table('products')->where('id', $id)->first();
        // dd($product);

        $data = array();

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

            // return \Response::json(['success' => 'Successfully Added on your Cart!']);

            return Redirect('/user/checkout')->with('success', 'Product Added Successfully!');
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

            // return \Response::json(['success' => 'Successfully Added on your Cart!']);
            return Redirect('/user/checkout')->with('success', 'Product Added Successfully!');
        }

    } // End Method


    //************************************************************************************************************** */

    public function categoryView(Request $request ,$category_slug)
    {
        $HeadSlug = $category_slug;

        $category = Category::where('category_slug',$category_slug)->first();
        $category_all = DB::table('products')
        ->where('category_id',$category->id)
        ->paginate(20);

        // $category = DB::table('categories')
        // // ->leftJoin('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
        // ->where('categories.category_slug',$category_slug)
        // ->first();
        $categoryloop = DB::table('categories')
        ->leftJoin('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
        ->where('categories.category_slug',$category->category_slug)
        ->get();

        return view('frontend.pages.category_product_show', compact('category_all','HeadSlug', 'category', 'categoryloop'));
    } // End Method
    public function SubCategoryView($subcategory_slug)
    {

        $HeadSlug = $subcategory_slug;


        $subcategory = SubCategory::where('subcategory_slug',$subcategory_slug)->first();
        $category_all = DB::table('products')
        ->where('subcategory_id',$subcategory->id)
        ->paginate(20);
        $category = DB::table('sub_categories')
        ->leftJoin('chlild_categories', 'sub_categories.id', '=', 'chlild_categories.sub_category_id')
        ->where('sub_categories.subcategory_slug',$subcategory_slug)
        ->get();
        // $category_all = DB::table('products')->where('category_id',$id)->get();
        // $category_all = Product::where('category_id', $id)->
        // where('subcategory_id', $id)->paginate(20);
        return view('frontend.pages.subcategory_product_show', compact('category_all','HeadSlug','category'));

    } // End Method

    public function ChildCategoryView($childcategory_slug)
    {
        $HeadSlug = $childcategory_slug;

        $childcategory = DB::table('chlild_categories')->where('childcategory_slug',$childcategory_slug)->first();
        $category_all = DB::table('products')
        ->where('childcategory_id',$childcategory->id)
        ->paginate(20);
        return view('frontend.pages.childcategory_product_show', compact('category_all','HeadSlug'));

    } // End Method



    public function Search(Request $request)
    {
        $item = $request->input('search'); // Retrieve the search input from the request.

        $product = Product::where('product_name', 'LIKE', '%' . $item . '%')->first();
        $category = Category::where('category_name', 'LIKE', '%' . $item . '%')->first();
        $subcategory = SubCategory::where('subcategory_name', 'LIKE', '%' . $item . '%')->first();
        $childcategory = ChlildCategory::where('childcategory_name', 'LIKE', '%' . $item . '%')->first();
        if ($product) {
            return redirect(
                '/product'. '/'. $product->product_name,
                // '/product/details/' . $product->id . '/' . $product->product_name,
            );
        }
         elseif ($category) {
            return redirect(route('category.view', ['category_slug' => $category->category_name]));

        } elseif ($subcategory) {
            return redirect(route('subcategory.view', ['subcategory_slug' => $category->subcategory_name]));
        } elseif ($childcategory) {
            return redirect(route('childcategory.view', ['childcategory_slug' => $category->childcategory_name]));

        }
        else {
            return redirect()->back('error', 'Product not found');
        }

    }




    public function ProductListAjax()
    {
        $products = Product::select('product_name')->get();
        $data = [];
        $categories = Category::select('category_name')->get();
        // dd($categories);
        $subcategories = SubCategory::select('subcategory_name')->get();
        $childcategories = ChlildCategory::select('childcategory_name')->get();
        foreach ($products as $item) {
            $data[] = [
                'value' => $item->product_name,
            ];
        }
        foreach ($categories as $item) {
            // dd($item);
            $data[] = [
                'value' => $item->category_name,
            ];
        }
        foreach ($subcategories as $item) {
            $data[] = [
                'value' => $item->subcategory_name,
            ];
        }
        foreach ($childcategories as $item) {
            $data[] = [
                'value' => $item->childcategory_name,
            ];
        }
        // dd($data);

        // return response()->json($data);
        // dd($data);
        return $data;
    }

    public function BrandFilter(Request $request)
    {
        $selectedBrands = $request->input('brandfilter');
        // If no brands are selected, you may want to handle this case or show all data
        if (empty($selectedBrands)) {
            $product = Product::paginate(12);
        } else {
            $product = Product::whereIn('brand_id', $selectedBrands)->paginate(8);
        }
        return view('frontend.pages.all_product', compact('product'));


    }

    public function AvailabilityFilter(Request $request)
    {

        $selectedavailability = $request->input('availability');

        if (empty($selectedavailability)) {
            $product = Product::paginate(12);
        } else {
            $product = Product::whereIn('availability', $selectedavailability)->paginate(8);
        }
        return view('frontend.pages.all_product', compact('product'));
    }

    public function PriceFilter(Request $request)
    {



        $minvalue = $request->min;
        $maxvalue = $request->max;



        $products = Product::whereBetween('selling_price', [$minvalue, $maxvalue])
            ->get();


        if ($products->count() > 0) {
            return view('frontend.pages.filtertProduct', compact('products'));
        } else {
            return "No Product Found";
        }

        //  $product = Product::whereRaw("CAST(selling_price AS UNSIGNED) >= ?", [$minvalue])->whereRaw("CAST(selling_price AS UNSIGNED) <= ?", [$maxvalue])->paginate(8);

        // return view('frontend.pages.all_product', compact('product'));

    }

    //************************************************************************************************ */
    //this section is all category product search
    //************************************************************************************************ */
    public function BrandFilterCategory(Request $request)
    {

        $selectedBrands = $request->input('brandfilter');
        $id = $request->id;
        // If no brands are selected, you may want to handle this case or show all data
        if (empty($selectedBrands)) {
            $category_all = Product::where('category_id', $id)->paginate(12);
        } else {
            $category_all = Product::where('category_id', $id)->whereIn('brand_id', $selectedBrands)->paginate(8);
        }
        return view('frontend.pages.category_product_show', compact('category_all'));


    }
    public function AvailabilityFiltercategory(Request $request)
    {

        $selectedavailability = $request->input('availability');
        $id = $request->id;

        if (empty($selectedavailability)) {
            $category_all = Product::where('category_id', $id)->paginate(12);
        } else {
            $category_all = Product::where('category_id', $id)->whereIn('availability', $selectedavailability)->paginate(8);
        }
        return view('frontend.pages.category_product_show', compact('category_all'));
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
    // public function PriceFiltercategory(Request $request,$id){
    //     $minvalue = $request->min;
    //     $maxvalue = $request->max;
    //     $id = $request->id;

    //     $category_all = Product::where('category_id', $id)
    //         ->whereBetween('selling_price', [$minvalue, $maxvalue])
    //         ->get();

    //     if ($category_all->count() > 0) {
    //         return view('frontend.pages.filtertCategoryProduct', compact('category_all'));
    //     } else {
    //         return "No Product Found";
    //     }
    // }
    public function PriceFiltercategory(Request $request, $id)
    {

        $maxvalue = intval($request->max);
        $minvalue = intval($request->min);
        $selectedSortOption = $request->selectedSortOption;
        $query = Product::where('category_id', $id)
            ->whereBetween('selling_price', [$minvalue, $maxvalue]);
        if ($request->availability && $request->availability !== "undefined") {
            $query->whereIn('availability', is_array($request->availability) ? $request->availability : [$request->availability]);
        }
        if ($request->brand && $request->brand !== "undefined") {
            $query->whereIn('brand_id', is_array($request->brand) ? $request->brand : [$request->brand]);
        }
        if ($request->limitPrduct && $request->limitPrduct != "undefined") {
            $query->take($request->limitPrduct);
        }
        if ($selectedSortOption === 'price_asc') {
            $query->orderBy('selling_price', 'ASC');
        } elseif ($selectedSortOption === 'price_desc') {
            $query->orderBy('selling_price', 'DESC');
        }
        $category_all = $query->get();
        if (isset($category_all)) {
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

    // public function DownloadFile(Request $request, $file)
    // {

    //     return response()->download(public_path('media/pdfs/'.$file));
    // }
    // use Illuminate\Support\Facades\Storage;

    public function DownloadFile(Request $request, $file)
    {
        dd($file);
        $decodedFileName = urldecode($file);
        $filePath = '/media/pdfs/' . $decodedFileName;

        if (Storage::exists($filePath)) {
            // return response()->download(storage_path($filePath));
            return response()->file($filePath);

        } else {
            return "File not found: " . $decodedFileName;
        }
    }


}
