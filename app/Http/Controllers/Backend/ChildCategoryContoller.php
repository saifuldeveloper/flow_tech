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
        $category = DB::table('sub_categories')
  				->leftJoin('categories','sub_categories.category_id','categories.id')
  				->select('sub_categories.*','categories.category_name')
  				->get();
        return view('backend.admin.childcategory.add', compact('category'));
    } // End method

    public function storechildCategory(Request $request)
    {
        $request->validate([
            'childcategory_name' => 'required',
        ]);
        if ($request->hasFile('childcategory_img')) {
            $imag = $request->file('childcategory_img');
            $name_gen = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('media/category/' . $name_gen));
            $img_url = 'media/category/' . $name_gen;
        } else {
            $img_url = Null;
        }
        ChlildCategory::create([
            'sub_category_id' =>$request->sub_category_id,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => $request->childcategory_slug,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'childcategory_img' => $img_url,
        ]);
        return Redirect()->route('list.childcategory')->with('success', 'Category Added Successfully!');
    }

    public function deletechildCategory($id)
    {

        DB::table('categories')->where('id', $id)->delete();

        return Redirect()->back()->with('error', 'Successfully Deleted');
    }
    public function editchildCategory($id)
    {
        $category = DB::table('sub_categories')
  				->leftJoin('categories','sub_categories.category_id','categories.id')
  				->select('sub_categories.*','categories.category_name')
  				->get();
        $categories = ChlildCategory::findOrFail($id);
        return view('backend.admin.childcategory.edit', compact('categories' ,'category'));
    }
    public function updatechildCategory(Request $request, $id)
    {
        $product = ChlildCategory::findOrFail($id);
        if ($request->hasFile('childcategory_img')) {
            $imag = $request->file('childcategory_img');
            $name_gen = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('media/category/' . $name_gen));
            $img_url = 'media/category/' . $name_gen;

        } else {
            $img_url = $request->old_logo;
        }
        $product->Update([
            'sub_category_id' =>$request->sub_category_id,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => $request->slug,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'childcategory_img' => $img_url,
        ]);
        return Redirect()->route('list.childcategory')->with('success', 'Category Successfully Updated');

    }

    public function detailschildCategory(Request $request, $id)
    {
        $category = DB::table('sub_categories')
        ->leftJoin('categories','sub_categories.category_id','categories.id')
        ->select('sub_categories.*','categories.category_name')
        ->get();
        $categories = ChlildCategory::findOrFail($id);
        return view('backend.admin.childcategory.details', compact('categories' , 'category' ));
    } // End method

}
