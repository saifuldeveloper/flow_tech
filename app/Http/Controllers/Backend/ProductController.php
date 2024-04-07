<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\SubCategory;
use Image;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Visibility;
use Stringable;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function listProduct()
    {
        $product = DB::table('products')

            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.id')
            ->leftJoin('chlild_categories', 'products.childcategory_id', '=', 'chlild_categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->select(
                'products.id',
                'products.*', /* other product columns */
                'categories.category_name as category_name',
                'sub_categories.subcategory_name as subcategory_name',
                'chlild_categories.childcategory_name as childcategory_name',/* other related table columns */
            )
            // ->select('products.id', 'products.category_id', 'products.subcategory_id','products.childcategory_id', /* other product columns */
            // 'categories.category_name as category_name', 'sub_categories.subcategory_name as subcategory_name', 'chlild_categories.childcategory_name as childcategory_name',/* other related table columns */)
            ->orderBy('products.id', 'DESC')
            ->get();

        // $product = DB::table('products')
        // ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        // ->leftJoin('sub_categories', 'products.subcategory_id', '=', 'sub_categories.id')
        // ->leftJoin('chlild_categories', 'products.childcategory_id', '=', 'chlild_categories.id')
        // ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
        // // ->select('products.*', 'categories.category_name')
        // ->orderBy('products.id', 'DESC')
        // ->get();
        // $product = Product::all();

        // dd($product);


        return view('backend.admin.product.list', compact('product'));
    } // End method

    public function addProduct()
    {

        $category = DB::table('categories')->get();
        $subCategory = DB::table('sub_categories')->get();
        $childCategory = DB::table('chlild_categories')->get();
        $brand = DB::table('brands')->get();
        return view('backend.admin.product.add', compact('category', 'brand', 'subCategory', 'childCategory'));
    } // End method

    public function GetSubcat($category_id)
    {
        $cat = DB::table('sub_categories')->where('category_id', $category_id)->get();
        return json_encode($cat);
    }
    public function GetChildcat($subcategory_id)
    {
        // dd($subcategory_id);
        $cat = DB::table('chlild_categories')->where('sub_category_id', $subcategory_id)->get();
        return json_encode($cat);
    }
    // public function generateSlug($string, $separator = '-') {
    //     // Convert the string to lowercase
    //     $string = strtolower($string);

    //     // Replace non-alphanumeric characters with the separator
    //     $string = preg_replace('/[^a-z0-9]+/', $separator, $string);

    //     // Trim the string if necessary
    //     $string = trim($string, $separator);

    //     return $string;
    // }

    public function storeProduct(Request $request)
    {
        // dd($request->all());

        // $title = $request->product_name;
        // $slug = Str::slug($title, '-');
        // dd($slug);

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_id'] = $request->childcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['availability'] = $request->availability;
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_details;
        $data['product_slug'] =  $request->product_slug;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['download_on_off'] = $request->download_on_off;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['meta_description'] = $request->meta_description;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_title'] = $request->meta_title;
        $data['keyword'] = $request->keyword;
        $data['schema_markup'] = $request->schema_markup;
        $data['what_is_the'] = $request->what_is_the;
        $data['specification'] = $request->specification;
        $data['long_description'] = $request->long_description;
        $data['status'] = 1;
        $data['firmware'] = $request->firmware;
        $data['manual'] = $request->manual;
        $data['product_banner_tag'] = $request->product_banner_tag;
        $data['image_one_tag'] = $request->image_one_tag;
        $data['image_one_tag'] = $request->image_one_tag;
        $data['image_two_tag'] = $request->image_two_tag;
        $data['image_three_tag'] = $request->image_three_tag;
        $data['image_four_tag'] = $request->image_four_tag;
        $data['image_five_tag'] = $request->image_five_tag;
        $data['image_six_tag'] = $request->image_six_tag;




        if ($request->file('catalouge')) {
            $pdfFile = $request->file('catalouge');
            $filename = time() . '.' . $pdfFile->getClientOriginalExtension();
            $request->file('catalouge')->move('media/pdfs', $filename);

            $data['catalouge'] = 'media/pdfs/' . $filename;
        }


        if ($request->file('drivers')) {
            $pdfFile2 = $request->file('drivers');
            $filename2 = 'uploaded_pdf_' . time() . '.' . $pdfFile->getClientOriginalExtension();
            $request->file('drivers')->move('media/pdfs', $filename2);
            $data['drivers'] = 'media/pdfs/' . $filename2;
        }


        // dd($data);



        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
        $image_four = $request->image_four;
        $image_five = $request->image_five;
        $image_six = $request->image_six;
        $product_banner = $request->product_banner;

        // return response()->json($data);


        //  ive to edit file and new field here#################################################################################################
        //  ive to edit file and new field here#################################################################################################
        //  ive to edit file and new field here#################################################################################################
        //  ive to edit file and new field here#################################################################################################

        if ($image_one) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();

            Image::make($image_one)->resize(270, 270)->save(public_path('media/product/' . $image_one_name));
            $data['image_one'] = 'media/product/' . $image_one_name;
        }

        if ($image_two) {
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270, 270)->save(public_path('media/product/' . $image_two_name));
            $data['image_two'] = 'media/product/' . $image_two_name;
        }

        if ($image_three) {
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270, 270)->save(public_path('media/product/' . $image_three_name));
            $data['image_three'] = 'media/product/' . $image_three_name;
        }

        if ($image_four) {
            $image_four_name = hexdec(uniqid()) . '.' . $image_four->getClientOriginalExtension();
            Image::make($image_four)->resize(270, 270)->save(public_path('media/product/' . $image_four_name));
            $data['image_four'] = 'media/product/' . $image_four_name;
        }

        if ($image_five) {
            $image_five_name = hexdec(uniqid()) . '.' . $image_five->getClientOriginalExtension();
            Image::make($image_five)->resize(270, 270)->save(public_path('media/product/' . $image_five_name));
            $data['image_five'] = 'media/product/' . $image_five_name;
        }

        if ($image_six) {
            $image_six_name = hexdec(uniqid()) . '.' . $image_six->getClientOriginalExtension();
            Image::make($image_six)->resize(270, 270)->save(public_path('media/product/' . $image_six_name));
            $data['image_six'] = 'media/product/' . $image_six_name;
        }
        if ($product_banner) {
            $product_banner_name = hexdec(uniqid()) . '.' . $product_banner->getClientOriginalExtension();

            Image::make($product_banner)->resize(1041, 200)->save(public_path('media/product/' . $product_banner_name));
            $data['product_banner'] = 'media/product/' . $product_banner_name;
        }

        Product::create($data);
        return Redirect()->route('list.product')->with('success', 'Product Added Successfully!');
    } // End Method

    public function deleteProduct($id)
    {

        DB::table('products')->where('id', $id)->delete();

        return Redirect()->route('list.product')->with('success', 'Product Deleted Successfully!');
    } // End Method

    public function editProduct($id)
    {
        // dd($id);
        $product = DB::table('products')->where('id', $id)->first();

        return view('backend.admin.product.edit', compact('product'));
    } // End Method

    public function updateWithoutImgProduct(Request $request, $id)
    {
        // dd($request->all());

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_id'] = $request->childcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['availability'] = $request->availability;
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['product_slug'] =  $request->product_slug;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['download_on_off'] = $request->download_on_off;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['meta_description'] = $request->meta_description;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_title'] = $request->meta_title;
        $data['keyword'] = $request->keyword;
        $data['schema_markup'] = $request->schema_markup;
        $data['what_is_the'] = $request->what_is_the;
        $data['specification'] = $request->specification;
        $data['long_description'] = $request->long_description;

        if ($request->file('catalouge')) {
            $pdfFile = $request->file('catalouge');
            $filename = time() . '.' . $pdfFile->getClientOriginalExtension();
            $request->file('catalouge')->move('media/pdfs', $filename);

            $data['catalouge'] = 'media/pdfs/' . $filename;
        }


        if ($request->file('drivers')) {
            $pdfFile2 = $request->file('drivers');
            $filename2 = 'uploaded_pdf_' . time() . '.' . $pdfFile->getClientOriginalExtension();
            $request->file('drivers')->move('media/pdfs', $filename2);
            $data['drivers'] = 'media/pdfs/' . $filename2;
        }


        $data['firmware'] = $request->firmware;
        $data['manual'] = $request->manual;

        $data['product_banner_tag'] = $request->product_banner_tag;
        $data['image_one_tag'] = $request->image_one_tag;
        $data['image_one_tag'] = $request->image_one_tag;
        $data['image_two_tag'] = $request->image_two_tag;
        $data['image_three_tag'] = $request->image_three_tag;
        $data['image_four_tag'] = $request->image_four_tag;
        $data['image_five_tag'] = $request->image_five_tag;
        $data['image_six_tag'] = $request->image_six_tag;

        DB::table('products')->where('id', $id)->update($data);

        return Redirect()->route('list.product')->with('success', 'Product updated Without Image Successfully!');
    } // End Method

    public function updateWithImgProduct(Request $request, $id)
    {

        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;
        $old_four = $request->old_four;
        $old_five = $request->old_five;
        $old_six = $request->old_six;
        $old_product_banner = $request->old_product_banner;

        $data = array();

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');
        $image_four = $request->file('image_four');
        $image_five = $request->file('image_five');
        $image_six = $request->file('image_six');
        $product_banner = $request->file('product_banner');



        if ($image_one) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();

            Image::make($image_one)->resize(270, 270)->save(public_path('media/product/' . $image_one_name));
            $data['image_one'] = 'media/product/' . $image_one_name;
        }

        if ($image_two) {
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270, 270)->save(public_path('media/product/' . $image_two_name));
            $data['image_two'] = 'media/product/' . $image_two_name;
        }

        if ($image_three) {
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270, 270)->save(public_path('media/product/' . $image_three_name));
            $data['image_three'] = 'media/product/' . $image_three_name;
        }

        if ($image_four) {
            $image_four_name = hexdec(uniqid()) . '.' . $image_four->getClientOriginalExtension();
            Image::make($image_four)->resize(270, 270)->save(public_path('media/product/' . $image_four_name));
            $data['image_four'] = 'media/product/' . $image_four_name;
        }

        if ($image_five) {
            $image_five_name = hexdec(uniqid()) . '.' . $image_five->getClientOriginalExtension();
            Image::make($image_five)->resize(270, 270)->save(public_path('media/product/' . $image_five_name));
            $data['image_five'] = 'media/product/' . $image_five_name;
        }

        if ($image_six) {
            $image_six_name = hexdec(uniqid()) . '.' . $image_six->getClientOriginalExtension();
            Image::make($image_six)->resize(270, 270)->save(public_path('media/product/' . $image_six_name));
            $data['image_six'] = 'media/product/' . $image_six_name;
        }

        if ($product_banner) {
            $product_banner_name = hexdec(uniqid()) . '.' . $product_banner->getClientOriginalExtension();

            Image::make($product_banner)->resize(1041, 200)->save(public_path('media/product/' . $product_banner_name));
            $data['product_banner'] = 'media/product/' . $product_banner_name;
        }

        DB::table('products')->where('id', $id)->update($data);

        return Redirect()->route('list.product')->with('success', 'Product Image Updated Successfully!');

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


    public function detailsProduct(Request $request, $id)
    {

        $product = DB::table('products')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->leftJoin('sub_categories', 'products.subcategory_id', 'sub_categories.id')
            ->leftJoin('chlild_categories', 'products.childcategory_id', 'chlild_categories.id')
            ->leftJoin('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name', 'sub_categories.subcategory_name')
            ->where('products.id', $id)
            ->first();

        return view('backend.admin.product.details', compact('product'));
    } // End method



    public function inactive($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 0]);

        return Redirect()->back()->with('success', 'Inactive Successfully!');
    }


    public function active($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 1]);

        return Redirect()->back()->with('success', 'Active Successfully!');
    }
}
