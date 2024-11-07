<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChlildCategory;
use App\Models\SubCategory;
use Intervention\Image\Facades\Image;


use Illuminate\Support\Facades\DB;

class ChildCategoryContoller extends Controller
{
    public function listchildCategory()
    {
        $categories = ChlildCategory::latest()->get();
        return view('backend.admin.childcategory.list', compact('categories'));
    } // End method

    public function addchildCategory()
    {
        $categories = DB::table('categories')->get();
        return view('backend.admin.childcategory.add', compact('categories'));
    }

    public function storechildCategory(Request $request)
    {

        $request->validate([
            'childcategory_name' => 'required',
            'category_id' => 'required',
            'childcategory_slug' => 'required|unique:chlild_categories',
            'sub_category_id' => 'required'
        ]);

        if ($request->hasFile('childcategory_img')) {
            $imag = $request->file('childcategory_img');
            $name_gen = 'child_image-' . hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('media/category/' . $name_gen));
            $img_url = 'media/category/' . $name_gen;
        } else {
            $img_url = Null;
        }


        if ($request->hasFile('banner_img')) {
            $imag = $request->file('banner_img');
            $name_gen = 'child_banner-' . hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(1290, 250)->save(public_path('media/category/' . $name_gen));
            $banner_img_url = 'media/category/' . $name_gen;
        } else {
            $banner_img_url = Null;
        }

        ChlildCategory::create([
            'category_id' => $request->category_id, // 'category_id' => 'required',
            'sub_category_id' => $request->sub_category_id,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => $request->childcategory_slug,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'childcategory_img' => $img_url,
            'child_footer_text' => $request->child_footer_text,
            'childcategory_banner' => $banner_img_url,
        ]);
        return Redirect()->route('list.childcategory')->with('success', 'Category Added Successfully!');
    }

    public function deletechildCategory($id)
    {
        DB::table('chlild_categories')->where('id', $id)->delete();
        return Redirect()->back()->with('error', 'Successfully Deleted');
    }

    public function editchildCategory($id)
    {

        $categories = DB::table('categories')->select('id', 'category_name')->get();
        $subcategories = DB::table('sub_categories')->select('id', 'category_id', 'subcategory_name')->get();

        $childCategories = ChlildCategory::findOrFail($id);

        return view('backend.admin.childcategory.edit', compact('categories', 'subcategories', 'childCategories'));
    }

    public function updatechildCategory(Request $request, $id)
    {
        $request->validate([
            'childcategory_name' => 'required',
            'sub_category_id' => 'required',
            'childcategory_slug' => 'required|unique:chlild_categories,childcategory_slug,' . $id,
        ]);
        $product = ChlildCategory::findOrFail($id);
        if ($request->hasFile('childcategory_img')) {

            // old imag delete
            if (file_exists($request->old_logo)) {
                @unlink($request->old_logo);
            }

            $imag = $request->file('childcategory_img');
            $name_gen = 'child_img-' . hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('media/category/' . $name_gen));
            $img_url = 'media/category/' . $name_gen;
        } else {
            $img_url = $request->old_logo;
        }

        if ($request->hasFile('banner_img')) {

            // old imag delete
            if (file_exists($request->old_banner_img)) {
                @unlink($request->old_banner_img);
            }
            $imag = $request->file('banner_img');
            $name_gen = 'child_banner-' . hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(1290, 250)->save(public_path('media/category/' . $name_gen));
            $banner_img_url = 'media/category/' . $name_gen;
        } else {
            $banner_img_url = $request->old_banner_img;
        }

        $product->Update([
            'sub_category_id' => $request->sub_category_id,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => $request->childcategory_slug,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'childcategory_img' => $img_url,
            'child_footer_text' => $request->child_footer_text,
            'childcategory_banner' => $banner_img_url,
        ]);
        return Redirect()->route('list.childcategory')->with('success', 'Category Successfully Updated');
    }

    public function detailschildCategory(Request $request, $id)
    {
        $category = DB::table('sub_categories')
            ->leftJoin('categories', 'sub_categories.category_id', 'categories.id')
            ->select('sub_categories.*', 'categories.category_name')
            ->get();
        $categories = ChlildCategory::findOrFail($id);
        return view('backend.admin.childcategory.details', compact('categories', 'category'));
    } // End method

}
