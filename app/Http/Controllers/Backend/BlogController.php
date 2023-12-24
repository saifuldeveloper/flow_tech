<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
   
    
    public function listBlog()
    {
        $blog = DB::table('blogs')->get();
        return view('backend.admin.blog.list',compact('blog'));
    } // End method

    public function addBlog()
    {
        return view('backend.admin.blog.add');
    } // End method

    public function storeBlog(Request $request){
      
        // this is big brother code
        $data = array();
       
        $data['autor_name'] = $request->autor_name;
        $data['meta_description'] = $request->meta_description;
        $data['meta_tag'] = $request->meta_tag;
        $data['short_description'] = $request->short_description;
        $data['long_description'] = $request->long_description;
        $data['created_at'] = \Carbon\Carbon::now();
        $slider_img = $request->image;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img)->resize(870,431)->save(public_path('media/blog/'.$slider_img_name));  
             $data['image'] = 'media/blog/'.$slider_img_name;
        }

        DB::table('blogs')->insert($data);
         return Redirect()->route('list.blog')->with('success', 'Blog Added Successfully!');
                

            } // End method


            public function deleteBlog($id)
            {
                // $data = DB::table('brands')->where('id',$id)->first();
                // $image = $data->brand_logo;
                // unlink($image);

                 DB::table('blogs')->where('id',$id)->delete();
        
              return Redirect()->back()->with('error', 'Successfully Deleted');
            } // End method

            public function editBlog($id){

                $blog = DB::table('blogs')->where('id',$id)->first();
        
                return view('backend.admin.blog.edit',compact('blog'));
            } // End method



            public function UpdateBlog(Request $request, $id){

                $data = array();
       
                $data['autor_name'] = $request->autor_name;
                $data['meta_description'] = $request->meta_description;
                $data['meta_tag'] = $request->meta_tag;
                $data['short_description'] = $request->short_description;
                $data['long_description'] = $request->long_description;
                $slider_img = $request->image;
        
                if ($slider_img) {
                    $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
                    // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
                   Image::make($slider_img)->resize(870,431)->save(public_path('media/blog/'.$slider_img_name));  
                     $data['image'] = 'media/blog/'.$slider_img_name;
                }
        
               
                
                DB::table('blogs')->where('id',$id)->update($data);
        
                return Redirect()->route('list.blog')->with('success', 'Slider Image Updated Successfully!');
        
    } // End method



            public function detailsBlog(Request $request, $id){

                $blog = DB::table('blogs')->where('id',$id)->first();
                return view('backend.admin.blog.details',compact('blog'));
                } // End method
                
//********************************************************************* */
// this is store blog for comment 
//********************************************************************* */
    public function storeBlogComments(Request $request){
      
        // this is big brother code
        $data = array();
       
        $data['blog_id'] = $request->blog_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['message'] = $request->message;
        $data['created_at'] = \Carbon\Carbon::now();
        DB::table('blogreviews')->insert($data);
        return back()->with('success', 'Blog Added Successfully!');
                

            } // End method
 //********************************************************************* */
// this is store End for comment 
//********************************************************************* */

}
