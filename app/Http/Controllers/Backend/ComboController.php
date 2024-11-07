<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\Combo;
use App\Models\Product;

class ComboController extends Controller
{

    public function listcombo()
    {
        $combo = DB::table('combos')
            ->join('products', 'products.id', 'combos.sub_product_id')
            ->select('combos.*', 'products.product_name', 'products.image_one', 'products.discount_price', 'products.selling_price')
            ->get();
        return view('backend.admin.combo.list', compact('combo'));
    } // End method

    public function Combopageshow()
    {
        $products = Product::all();
        return view('backend.admin.combo.add', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $p_count = count($request->sub_product_id);

        $main_product_id = $request->main_product_id;

        $check = Combo::where('main_product_id', $main_product_id)->first();

        if ($check) {
            return Redirect()->back()->with('error', 'Combo Product Already Exists!');
        }

        if ($p_count > 3) {
            return Redirect()->back()->with('error', 'You can select maximum 3 products!');
        }

        for ($i = 0; $i < $p_count; $i++) {
            $data = array();
            $data['main_product_id'] = $main_product_id;
            $data['status'] = 1;
            $data['sub_product_id'] = $request->sub_product_id[$i];
            Combo::create($data);
        }

        return Redirect()->route('list.combo')->with('success', 'combo Added Successfully!');
    }

    public function deleteCombo($id)
    {


        //  $product = DB::table('combos')->where('id',$id)->first();
        // $image1 = $product->image_one;
        // $image2 = $product->image_two;
        // $image3 = $product->image_three;

        // if (file_exists($image1)) {
        //   unlink($image1);
        //   }
        //   if (file_exists($image2)) {
        //       unlink($image2);
        //   }
        //   if (file_exists($image3)) {
        //       unlink($image3);
        //   }


        DB::table('combos')->where('id', $id)->delete();

        return Redirect()->route('list.combo')->with('success', 'combo Deleted Successfully!');
    } // End Method

    public function editCombo($id)
    {
        $product = DB::table('products')->get();
        $combo = DB::table('combos')->where('id', $id)->first();
        return view('backend.admin.combo.edit', compact('combo', 'product'));
    } // End Method

    public function updateWithoutImgCombo(Request $request, $id)
    {

        $data = array();
        $data['product_id'] = $request->product_id;
        $data['first_product_name'] = $request->first_product_name;
        $data['first_discount_price'] = $request->first_discount_price;
        $data['first_selling_price'] = $request->first_selling_price;
        $data['second_product_name'] = $request->second_product_name;
        $data['second_discount_price'] = $request->second_discount_price;
        $data['second_selling_price'] = $request->second_selling_price;
        $data['third_product_name'] = $request->third_product_name;
        $data['thrid_discount_price'] = $request->thrid_discount_price;
        $data['thrid_selling_price'] = $request->thrid_selling_price;

        DB::table('combos')->where('id', $id)->update($data);

        return Redirect()->route('list.combo')->with('success', 'combo updated Without Image Successfully!');
    } // End Method

    public function updateWithImgCombo(Request $request, $id)
    {

        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;

        $data = array();

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');

        if ($image_one && $image_two && $image_three) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            Image::make($image_one)->resize(270, 270)->save(public_path('media/combo/' . $image_one_name));
            $data['image_one'] = 'media/combo/' . $image_one_name;

            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            Image::make($image_two)->resize(270, 270)->save(public_path('media/combo/' . $image_two_name));
            $data['image_two'] = 'media/combo/' . $image_two_name;

            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            Image::make($image_three)->resize(270, 270)->save(public_path('media/combo/' . $image_three_name));
            $data['image_three'] = 'media/combo/' . $image_three_name;



            DB::table('combos')->where('id', $id)->update($data);

            return Redirect()->route('list.combo')->with('success', 'Product Image Updated Successfully!');
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

    public function detailsCombo(Request $request, $id)
    {

        $combo = DB::table('combos')->where('id', $id)->first();
        return view('backend.admin.combo.details', compact('combo'));
    } // End method


    public function inactive($id)
    {
        DB::table('combos')->where('id', $id)->update(['status' => 0]);

        return Redirect()->back()->with('success', 'Inactive Successfully!');
    }


    public function active($id)
    {
        DB::table('combos')->where('id', $id)->update(['status' => 1]);

        return Redirect()->back()->with('success', 'Active Successfully!');
    }
}
