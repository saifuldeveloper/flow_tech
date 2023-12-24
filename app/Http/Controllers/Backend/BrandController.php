<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    
    public function listBrand()
    {
        $brands= Brand::latest()->get();
        return view('backend.admin.brand.list', compact('brands'));
    } // End method

    public function addBrand()
    {
        return view('backend.admin.brand.add');
    } // End method

    public function storeBrand(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
            'brand_logo' => 'required',
        
             ]);

             if($request->hasFile('brand_logo')){
                $imag = $request->file('brand_logo'); 
        
                $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
                Image::make($imag)->resize(270,270)->save(public_path('media/brand/'.$name_gen));       
                $img_url = 'media/brand/'.$name_gen;
            }else{
              $img_url = Null;
            }
                
                  
                  Brand::create([
                  'brand_name' => $request->brand_name, 
                  'meta_description' => $request->meta_description, 
                  'meta_tag' => $request->meta_tag, 
                  'brand_logo' => $img_url,
                  
              ]);
                

                    return Redirect()->route('list.brand')->with('success', 'Brand Added Successfully!');
                

            } // End method

            public function deleteBrand($id)
            {
                // $data = DB::table('brands')->where('id',$id)->first();
                // $image = $data->brand_logo;
                // unlink($image);

                 DB::table('brands')->where('id',$id)->delete();
        
              return Redirect()->back()->with('error', 'Successfully Deleted');
            } // End method

            public function editBrand($id){

                $brands = Brand::findOrFail($id);
        
                return view('backend.admin.brand.edit',compact('brands'));
            } // End method



            public function UpdateBrand(Request $request, $id){

                // $oldlogo = $request->old_logo;
        
                // $data = array();
                // $data['brand_name'] = $request->brand_name;
                // $image = $request->file('brand_logo');
        
                // if ($image) {
                // unlink($oldlogo);
                // $image_name = date('dmy_H_s_i');
                // $ext = strtolower($image->getClientOriginalExtension());
                // $image_full_name = $image_name.'.'.$ext;
                // $upload_path = 'media/brand/';
                // $image_url = $upload_path.$image_full_name;
                // $image->move($upload_path,$image_full_name);
        
                // $data['brand_logo'] = $image_url;
        
                // DB::table('brands')->where('id',$id)->update($data);
        
                // return Redirect()->route('list.brand')->with('success', 'Brand Updated Successfully!');
        
                // }else{
                //     DB::table('brands')->where('id',$id)->update($data);
        
                //     return Redirect()->route('list.brand')->with('success', 'Brand Updated Without Image Successfully!');
                // }

                $id = $request->id;

        $product = Brand::findOrFail($id);

      if($request->hasFile('brand_logo')){
         $imag = $request->file('brand_logo');

        // $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        // $path = public_path('upload/product/'.$name_gen);
        //  Image::make($imag->getRealPath())->resize(468,249)->save($path);
        //  $data['image'] = 'upload/product/'.$name_gen;

        $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        Image::make($imag)->resize(270,270)->save(public_path('media/brand/'.$name_gen));       
        $img_url = 'media/brand/'.$name_gen;

      }else{
        $img_url = $product->image;
      }

    $product->Update([
        'brand_name' => $request->brand_name, 
        'meta_description' => $request->meta_description, 
        'meta_tag' => $request->meta_tag, 
        'brand_logo' => $img_url,
    ]);

    return Redirect()->route('list.brand')->with('success', 'Brand Updated Successfully!');
        
    } // End method



            public function detailsBrand(Request $request, $id){

                $brands = Brand::findOrFail($id);
                return view('backend.admin.brand.details',compact('brands'));
                } // End method

}
