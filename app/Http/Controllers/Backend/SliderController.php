<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function listSlider()
    {
        $slider = DB::table('sliders')->get();
  	    return view('backend.admin.slider.list',compact('slider'));
    } // End method

    public function addSlider()
    {
        return view('backend.admin.slider.add');
    } // End method

    public function storeSlider(Request $request)
    {
        // this is big brother code
        $data = array();

        $data['title'] = $request->title;
        $data['meta_description'] = $request->meta_description;
        $data['meta_tag'] = $request->meta_tag;
        $slider_img = $request->slider_img;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img)->save(public_path('media/slider/'.$slider_img_name));
             $data['slider_img'] = 'media/slider/'.$slider_img_name;
        }

        DB::table('sliders')->insert($data);
         return Redirect()->route('list.slider')->with('success', 'Slider Image Added Successfully!');
    } // End method

    public function deleteSlider($id){


        DB::table('sliders')->where('id',$id)->delete();

        return Redirect()->route('list.slider')->with('success', 'Slider Image Deleted Successfully!');

    } // End Method

    public function detailsSlider(Request $request, $id){

        $slider = DB::table('sliders')->where('id',$id)->first();
         return view('backend.admin.slider.details',compact('slider'));
    } // End method


    public function editSlider($id){
        $slider = DB::table('sliders')->where('id',$id)->first();
        return view('backend.admin.slider.edit',compact('slider'));

    } // End Method

    public function updateSlider(Request $request,$id){

        $data = array();

        $data['title'] = $request->title;
        $data['meta_description'] = $request->meta_description;
        $data['meta_tag'] = $request->meta_tag;
        $slider_img = $request->slider_img;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img)->save(public_path('media/slider/'.$slider_img_name));
             $data['slider_img'] = 'media/slider/'.$slider_img_name;
        }



        DB::table('sliders')->where('id',$id)->update($data);

        return Redirect()->route('list.slider')->with('success', 'Slider Image Updated Successfully!');

    } // End Method



    //************************************************************************** */

     // this is sectin is home page sider controller

    //************************************************************************ */


    public function listIndexSlider()
    {
        $indexslider = DB::table('indexsliders')->get();
  	    return view('backend.admin.indexslider.list',compact('indexslider'));
    } // End method

    public function addIndexSlider()
    {
        return view('backend.admin.indexslider.add');
    } // End method

    public function storeIndexSlider(Request $request)
    {
        // this is big brother code
        $data = array();

        $data['title'] = $request->title;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $slider_img = $request->slider_img;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img)->save(public_path('media/slider/'.$slider_img_name));
             $data['slider_img'] = 'media/slider/'.$slider_img_name;
        }

        DB::table('indexsliders')->insert($data);
         return Redirect()->route('list.indexslider')->with('success', 'Slider Image Added Successfully!');
    } // End method

    public function deleteIndexSlider($id){


        DB::table('indexsliders')->where('id',$id)->delete();

        return Redirect()->route('list.indexslider')->with('success', 'Slider Image Deleted Successfully!');

    } // End Method

    public function detailsIndexSlider(Request $request, $id){

        $indexslider = DB::table('indexsliders')->where('id',$id)->first();
         return view('backend.admin.indexslider.details',compact('indexslider'));
     } // End method


    public function editIndexSlider($id){
        $indexslider = DB::table('indexsliders')->where('id',$id)->first();
        return view('backend.admin.indexslider.edit',compact('indexslider'));

    } // End Method

    public function updateIndexSlider(Request $request,$id){

        $data = array();

        $data['title'] = $request->title;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $slider_img = $request->slider_img;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img)->save(public_path('media/slider/'.$slider_img_name));
             $data['slider_img'] = 'media/slider/'.$slider_img_name;
        }



        DB::table('indexsliders')->where('id',$id)->update($data);

        return Redirect()->route('list.indexslider')->with('success', 'Slider Image Updated Successfully!');

    } // End Method



    //************************************************************************** */

     // this is sectin is site slide one  controller  <home Page>  </home>

    //************************************************************************ */


    public function listSiteSlider()
    {
        $homesitesliders = DB::table('homesitesliders')->get();
  	    return view('backend.admin.home_site_slider.list',compact('homesitesliders'));
    } // End method

    public function addSiteSlider()
    {
        return view('backend.admin.home_site_slider.add');
    } // End method

    public function storeSiteSlider(Request $request)
    {
        // this is big brother code
        $data = array();

        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $slider_img = $request->slider_img;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img)->save(public_path('media/slider/'.$slider_img_name));
             $data['slider_img'] = 'media/slider/'.$slider_img_name;
        }

        DB::table('homesitesliders')->insert($data);
         return Redirect()->route('list.slider.site')->with('success', 'Slider Image Added Successfully!');
    } // End method

    public function deleteSiteSlider($id){


        DB::table('homesitesliders')->where('id',$id)->delete();

        return Redirect()->route('list.slider.site')->with('success', 'Slider Image Deleted Successfully!');

    } // End Method

    public function detailsSiteSlider(Request $request, $id){

        $homesitesliders = DB::table('homesitesliders')->where('id',$id)->first();
         return view('backend.admin.home_site_slider.details',compact('homesitesliders'));

    } // End method


    public function editSiteSlider($id){
        $homesitesliders = DB::table('homesitesliders')->where('id',$id)->first();
        return view('backend.admin.home_site_slider.edit',compact('homesitesliders'));

    } // End Method

    public function updateSiteSlider(Request $request,$id){

        $data = array();
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['marquee'] = $request->marquee;
        $slider_img = $request->slider_img;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
           Image::make($slider_img)->save(public_path('media/slider/'.$slider_img_name));
             $data['slider_img'] = 'media/slider/'.$slider_img_name;


    }

    DB::table('homesitesliders')->where('id',$id)->update($data);

    return Redirect()->route('list.slider.site')->with('success', 'Slider Image Updated Successfully!');


}

    //************************************************************************** */

     // two image for index page controller  <Index page >  </Index>

    //************************************************************************ */


    public function listTwoSiteSlider()
    {
        $indexsitesliders = DB::table('indexsitesliders')->get();
  	    return view('backend.admin.index_site_slider.list',compact('indexsitesliders'));
    } // End method

    public function addTwoSiteSlider()
    {
        return view('backend.admin.index_site_slider.add');
    } // End method

    public function storeTwoSiteSlider(Request $request)
    {
        // this is big brother code
        $data = array();

        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $slider_img = $request->slider_img;
        $slider_img_one = $request->slider_img_one;

        if ($slider_img && $slider_img_one) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img)->save(public_path('media/slider/'.$slider_img_name));
             $data['slider_img'] = 'media/slider/'.$slider_img_name;

            $slider_img_name_one = hexdec(uniqid()).'.'.$slider_img_one->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img_one)->save(public_path('media/slider/'.$slider_img_name_one));
             $data['slider_img_one'] = 'media/slider/'.$slider_img_name_one;
        }

        DB::table('indexsitesliders')->insert($data);
         return Redirect()->route('list.slider.twosite')->with('success', 'Slider Image Added Successfully!');
    } // End method

    public function deleteTwoSiteSlider($id){


        DB::table('indexsitesliders')->where('id',$id)->delete();

        return Redirect()->route('list.slider.twosite')->with('success', 'Slider Image Deleted Successfully!');

    } // End Method

    public function detailsTwoSiteSlider(Request $request, $id){

        $indexsitesliders = DB::table('indexsitesliders')->where('id',$id)->first();
         return view('backend.admin.home_site_slider.details',compact('indexsitesliders'));

    } // End method


    public function editSiteTwoSlider($id){
        $indexsitesliders = DB::table('indexsitesliders')->where('id',$id)->first();
        return view('backend.admin.index_site_slider.edit',compact('indexsitesliders'));

    } // End Method

    public function updateTwoSiteSlider(Request $request,$id){

        $data = array();
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['marquee'] = $request->marquee;
        $slider_img = $request->slider_img;
        $slider_img_one = $request->slider_img_one;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
           Image::make($slider_img)->save(public_path('media/slider/'.$slider_img_name));
             $data['slider_img'] = 'media/slider/'.$slider_img_name;



    }


    if ($slider_img_one) {


        $slider_img_name_one = hexdec(uniqid()).'.'.$slider_img_one->getClientOriginalExtension();
       Image::make($slider_img_one)->save(public_path('media/slider/'.$slider_img_name_one));
         $data['slider_img_one'] = 'media/slider/'.$slider_img_name_one;


}

    DB::table('indexsitesliders')->where('id',$id)->update($data);

    return Redirect()->route('list.slider.twosite')->with('success', 'Slider Image Updated Successfully!');


}


//************************************************************************** */

     // this is sectin is POPUP  controller  <home Page>  </home>

    //************************************************************************ */


    public function listPopup()
    {
        $homesitesliders = DB::table('popups')->get();
  	    return view('backend.admin.popup.list',compact('homesitesliders'));
    } // End method

    public function addPopup()
    {
        return view('backend.admin.popup.add');
    } // End method

    public function storePopup(Request $request)
    {
        // this is big brother code
        $data = array();

        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['popup_link'] = $request->popup_link;
        $slider_img = $request->popup_img;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
            // Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           Image::make($slider_img)->save(public_path('media/popup/'.$slider_img_name));
             $data['popup_img'] = 'media/popup/'.$slider_img_name;
        }

        DB::table('popups')->insert($data);
         return Redirect()->route('list.popup')->with('success', 'Popup Image Added Successfully!');
    } // End method

    public function deletePopup($id){


        DB::table('popups')->where('id',$id)->delete();

        return Redirect()->route('list.popup')->with('success', 'Popup Image Deleted Successfully!');

    } // End Method

    public function detailsPopup(Request $request, $id){

        $homesitesliders = DB::table('popups')->where('id',$id)->first();
         return view('backend.admin.popup.details',compact('homesitesliders'));

    } // End method


    public function editPopup($id){
        $homesitesliders = DB::table('popups')->where('id',$id)->first();
        return view('backend.admin.popup.edit',compact('homesitesliders'));

    } // End Method

    public function updatePopup(Request $request,$id){

        $data = array();
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['popup_link'] = $request->popup_link;
        // $data['marquee'] = $request->marquee;
        $slider_img = $request->popup_img;

        if ($slider_img) {
            $slider_img_name = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
           Image::make($slider_img)->save(public_path('media/popup/'.$slider_img_name));
             $data['popup_img'] = 'media/popup/'.$slider_img_name;


    }

    DB::table('popups')->where('id',$id)->update($data);

    return Redirect()->route('list.popup')->with('success', 'Popup Image Updated Successfully!');


}


public function inactive($id){
    DB::table('popups')->where('id',$id)->update(['status'=>0]);

        return Redirect()->back()->with('success', 'Inactive Successfully!');
}


  public function active($id){
    DB::table('popups')->where('id',$id)->update(['status'=>1]);

        return Redirect()->back()->with('success', 'Active Successfully!');
}




}
