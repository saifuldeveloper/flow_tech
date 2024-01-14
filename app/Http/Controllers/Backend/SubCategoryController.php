<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{

    public function listSubCategory()
    {
        $category = DB::table('categories')->get();
        $subcat = DB::table('sub_categories')
  				->leftJoin('categories','sub_categories.category_id','categories.id')
  				->select('sub_categories.*','categories.category_name')
                  ->where('sub_categories.deleted_at', null)
                  ->orderBy('sub_categories.subcategory_name', 'desc')
  				->get();
        return view('backend.admin.subcategory.list',compact('category','subcat'));
    } // End method

    public function addSubCategory()
    {
        $category = DB::table('categories')->get();
  	    $subcat = DB::table('sub_categories')
  				->leftJoin('categories','sub_categories.category_id','categories.id')
  				->select('sub_categories.*','categories.category_name')
  				->get();
        return view('backend.admin.subcategory.add',compact('category','subcat'));
    } // End method

    public function storeSubCategory(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
            'meta_tag' => 'required',
            'meta_description' => 'required',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $data['subcategory_slug'] = $request->subcategory_slug;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['created_at'] =  Carbon::now();

        $subcategory_img = $request->subcategory_img;

        if ($subcategory_img) {
            $subcategory_img_name = hexdec(uniqid()).'.'.$subcategory_img->getClientOriginalExtension();

          Image::make($subcategory_img)->resize(270,270)->save(public_path('media/subcategory/'.$subcategory_img_name));
            $data['subcategory_img'] = 'media/subcategory/'.$subcategory_img_name;

        }
        // dd($data);

        SubCategory::create($data);



        // $request->validate([
        //      'category_id' => 'required',
        //      'subcategory_name' => 'required',
        //      'meta_tag' => 'required',
        //      'meta_description' => 'required',
        // ]);
        // if($request->hasFile('subcategory_img')){

        //     $imag = $request->file('subcategory_img');
        //     dd($imag);

        //     $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        //     Image::make($imag)->resize(270,270)->save(public_path('media/subcategory/'.$name_gen));
        //     $img_url = 'media/subcategory/'.$name_gen;
        // }
        // SubCategory::insert([
        //     'category_id' => $request->category_id,
        //     'subcategory_name' => $request->subcategory_name,
        //     'meta_tag' => $request->meta_tag,
        //     'meta_description' => $request->meta_description,
        //     'subcategory_img' => $img_url,
        //     'created_at' => Carbon::now(),
        // ]);
        return Redirect()->route('list.subcategory')->with('success', 'Sub Category Added Successfully!');
    } // End method

    public function deleteSubCategory($id)
    {
      $serve_cate =  SubCategory::findOrFail($id);
      $serve_cate->delete();
      return Redirect()->back()->with('error', 'Successfully Deleted');
    } // End method

    public function editSubCategory($id){

        $subcat = DB::table('sub_categories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('backend.admin.subcategory.edit',compact('subcat','category'));
    } // End method

    public function updateSubCategory(Request $request, $id){


    $product = SubCategory::findOrFail($id);

      if($request->hasFile('subcategory_img')){
         $imag = $request->file('subcategory_img');


        $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        Image::make($imag)->resize(270,270)->save(public_path('media/subcategory/'.$name_gen));
        $img_url = 'media/subcategory/'.$name_gen;

      }else{
        $img_url = $product->image;
      }

    $product->Update([
        'subcategory_name' => $request->subcategory_name,
        'subcategory_slug' => $request->subcategory_slug,
        'meta_tag' => $request->meta_tag,
        'meta_description' => $request->meta_description,
        'subcategory_img' => $img_url,
        'update_at' => Carbon::now(),
    ]);

        // $id = $request->id;

        // SubCategory::findOrFail($id)->Update([
        //         'category_id' => $request->category_id,
        //         'subcategory_name' => $request->subcategory_name,
        //         'meta_tag' => $request->meta_tag,
        //         'meta_description' => $request->meta_description,
        //         'subcategory_img' => $img_url,
        //         'update_at' => Carbon::now(),
        //     ]);

            return Redirect()->route('list.subcategory')->with('success', 'Sub Category Successfully Updated');
        } // End method

        public function detailsSubCategory(Request $request, $id){

            $subcat = DB::table('sub_categories')->where('id',$id)->first();
            $category = DB::table('categories')->get();
            return view('backend.admin.subcategory.details',compact('subcat','category'));
            } // End method


            //****************************************************************************** */
            // this is Shipments  section
            //****************************************************************************** */
    public function listShipments()
    {
        $shipments = DB::table('shipments')->get();
        return view('backend.admin.shipments.list',compact('shipments'));
    } // End method

    public function addShipments()
    {
        return view('backend.admin.shipments.add');
    } // End method

    public function storeShipments(Request $request)
    {

        $data = array();
        $data['home_delivery'] = $request->home_delivery;
        $data['store_pickup'] = $request->store_pickup;
        $data['request_express'] = $request->request_express;
        $data['created_at'] = \Carbon\Carbon::now();

        DB::table('shipments')->insert($data);
        return Redirect()->route('list.shipments')->with('success', 'Sub Category Added Successfully!');
    } // End method

    public function deleteShipments($id)
    {
      $serve_cate =  SubCategory::findOrFail($id);
      $serve_cate->delete();
      return Redirect()->back()->with('error', 'Successfully Deleted');
    } // End method

    public function editShipments($id){

        $shipments = DB::table('shipments')->where('id',$id)->first();
        return view('backend.admin.shipments.edit',compact('shipments'));
    } // End method

    public function updateShipments(Request $request, $id){

        $data = array();
        $data['home_delivery'] = $request->home_delivery;
        $data['store_pickup'] = $request->store_pickup;
        $data['request_express'] = $request->request_express;

        DB::table('shipments')->where('id',$id)->update($data);
        return Redirect()->route('list.shipments')->with('success', 'Sub Category Successfully Updated');

        } // End method

        public function detailsShipments(Request $request, $id){

            $shipments = DB::table('shipments')->where('id',$id)->first();
            return view('backend.admin.shipments.details',compact('shipments'));
            } // End method

}
