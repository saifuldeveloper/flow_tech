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
        $categories= Category::latest()->get();
        return view('backend.admin.category.list', compact('categories'));
    } // End method

    public function addCategory()
    {
        return view('backend.admin.category.add');
    } // End method

    public function storeCategory(Request $request)
    {

    //   $category_id = Category::insertGetId([
    //     'category_name'=>$request->category_name,
    //     'created_at'=>Carbon::now(),
    // ]);
    // $category_image=$request->category_img;
    // $extention=$category_image->getClientOriginalExtension();
    // $file_name=$category_id.'.'.$extention;
    // Image::make($category_image)->resize(680,680)->save(public_path('media/category/'.$file_name));

    // Category::find($category_id)->update([
    //     'category_img'=>$file_name,
    // ]);


    // return back()->with('success','Category Added Successfully');



      // this is main code 
        $request->validate([
            'category_name' => 'required|unique:categories',
          
        ]);
        
         if($request->hasFile('category_img')){
        $imag = $request->file('category_img'); 

        $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        Image::make($imag)->resize(270,270)->save(public_path('media/category/'.$name_gen));       
        $img_url = 'media/category/'.$name_gen;
    }else{
      $img_url = Null;
    }
    
      Category::create([
          'category_name' => $request->category_name,
          'meta_tag' => $request->meta_tag,
          'meta_description' => $request->meta_description,
          
          'category_img' => $img_url,
          
      ]);
        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'category_img' => $request->category_img,
        //     'created_at' => Carbon::now(),
        // ]);


       // $data = array();
     //   $data['category_name'] = $request->category_name;
       // $image = $request->file('category_img');
        
        

       // $image_name = date('dmy_H_s_i');
      //  $ext = strtolower($image->getClientOriginalExtension());
       // $image_full_name = $image_name.'.'.$ext;
        // $upload_path =  public_path('/media/brand/');
       // $upload_path = 'media/category/';
      //  $image_url = $upload_path.$image_full_name;
      //  $image->move($upload_path,$image_full_name);

       // $data['category_img'] = $image_url;

     //   Category::create($data);

        return Redirect()->route('list.category')->with('success', 'Category Added Successfully!');
    } // End method

    public function deleteCategory($id)
    {

    //   $serve_cate =  Category::findOrFail($id);
    //   $serve_cate->delete();

    //   $data = DB::table('categories')->where('id',$id)->first();
    //   $image = $data->category_img;
    //   unlink($image);

        DB::table('categories')->where('id',$id)->delete();

      return Redirect()->back()->with('error', 'Successfully Deleted');
    } // End method

    public function editCategory($id){

        $categories = Category::findOrFail($id);
        return view('backend.admin.category.edit',compact('categories'));
    } // End method



    public function updateCategory(Request $request, $id){

                $id = $request->id;

        $product = Category::findOrFail($id);

      if($request->hasFile('category_img')){
         $imag = $request->file('category_img');

      
        $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        Image::make($imag)->resize(270,270)->save(public_path('media/category/'.$name_gen));       
        $img_url = 'media/category/'.$name_gen;

      }else{
        $img_url = $product->image;
      }

    $product->Update([
        'category_name' => $request->category_name, 
        'meta_tag' => $request->meta_tag,
        'meta_description' => $request->meta_description,
        'category_img' => $img_url,
    ]);

    return Redirect()->route('list.category')->with('success', 'Category Successfully Updated');
            
        } // End method


        

        public function detailsCategory(Request $request, $id){

            $categories = Category::findOrFail($id);
            return view('backend.admin.category.details',compact('categories'));
            } // End method

}
