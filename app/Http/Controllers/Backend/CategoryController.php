<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

  public function listCategory()
  {
    $categories = Category::latest()->get();
    return view('backend.admin.category.list', compact('categories'));
  } // End method

  public function addCategory()
  {
    return view('backend.admin.category.add');
  } // End method

  public function storeCategory(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'category_name' => 'required|unique:categories',
    ]);

    if ($request->hasFile('category_banner_img')) {
      $imag1 = $request->file('category_banner_img');

      $name_gen1 = hexdec(uniqid()) . '.' . $imag1->getClientOriginalExtension();
      Image::make($imag1)->resize(270, 270)->save(public_path('media/category/' . $name_gen1));
      $img_url1 = 'media/category/' . $name_gen1;
    }
    if ($request->hasFile('category_img')) {
      $imag = $request->file('category_img');

      $name_gen = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
      Image::make($imag)->resize(270, 270)->save(public_path('media/category/' . $name_gen));
      $img_url = 'media/category/' . $name_gen;
    }
    else {
      $img_url = Null;
      $img_url1 = Null;
    }

    Category::create([
      'category_name' => $request->category_name,
      'category_slug' => $request->category_slug,
      'meta_title' => $request->meta_title,
      'meta_tag' => $request->meta_tag,
      'meta_description' => $request->meta_description,
      'category_banner_text'  => $request->category_banner_text,
      'category_footer_text'  => $request->category_footer_text,
      'keyword'  => $request->keyword,
      'schema_markup'  => $request->schema_markup,
      'category_banner_img'  => $img_url1,

      'category_img' => $img_url,

    ]);
    return Redirect()->route('list.category')->with('success', 'Category Added Successfully!');
  } // End method

  public function deleteCategory($id)
  {
    DB::table('categories')->where('id', $id)->delete();
    return Redirect()->back()->with('error', 'Successfully Deleted');
  } // End method

  public function editCategory($id)
  {
    $categories = Category::findOrFail($id);
    return view('backend.admin.category.edit', compact('categories'));
  } // End method



public function updateCategory(Request $request, $id)
{
    // You can remove the line $id = $request->id; as $id is already passed as a parameter

    // Find the category by its ID or throw a 404 error if not found
    $category = Category::findOrFail($id);

    // Check if the request has a file named 'category_img'
    if ($request->hasFile('category_img')) {
        $image = $request->file('category_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(270, 270)->save(public_path('media/category/' . $name_gen));
        $img_url = 'media/category/' . $name_gen;
    } else {
        // If 'category_img' is not present in the request, use the existing image URL
        $img_url = $category->category_img; // Assuming 'category_img' is the field name in your database
    }

    // Similarly, handle the 'category_img' or 'category_img1' for banner image
    if ($request->hasFile('category_banner_img')) {
        $image1 = $request->file('category_banner_img');
        $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
        Image::make($image1)->resize(270, 270)->save(public_path('media/category/' . $name_gen1));
        $img_url1 = 'media/category/' . $name_gen1;
    } else {
        $img_url1 = $category->category_banner_img; // Assuming 'category_banner_img' is the field name in your database
    }

    // Update the category with the new information
    $category->update([
        'category_name' => $request->category_name,
        'category_slug' => $request->category_slug,
        'meta_tag' => $request->meta_tag,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'category_banner_text' => $request->category_banner_text,
        'category_footer_text' => $request->category_footer_text,
        'keyword' => $request->keyword,
        'schema_markup' => $request->schema_markup,
        'category_img' => $img_url,
        'category_banner_img' => $img_url1,
    ]);

    return redirect()->route('list.category')->with('success', 'Category Successfully Updated');
}


  public function detailsCategory(Request $request, $id)
  {

    $categories = Category::findOrFail($id);
    return view('backend.admin.category.details', compact('categories'));
  } // End method

}
