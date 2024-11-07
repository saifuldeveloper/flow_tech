<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChlildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
    public function productView($product_slug)
    {

        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->where('products.product_slug', $product_slug)
            ->first();


        return view('frontend.pages.product_details', compact('product'));
    } // End Method

    public function LatestOfferPage()
    {

        $product = Product::where('main_slider', 1)->get();
        return view('frontend.pages.latest_offer_page', compact('product'));
    } // End Method

    public function AllproductView()
    {

        $products = Product::where('status', 1)->paginate(12);
        return view('frontend.pages.all_product', compact('products'));
    } // End Method

    public function addCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();

        if ($request->input('action') === 'add_to_cart') {
            if ($product->discount_price == 0) {
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $request->qty;
                $data['price'] = $product->selling_price;
                $data['weight'] = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['color'] = $request->color;
                $data['options']['size'] = $request->size;
                Cart::add($data);

                return redirect()->back()->with('success', 'Product Added Successfully!');
            } else {
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $request->qty;
                $data['price'] = $product->discount_price;
                $data['weight'] = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['color'] = $request->color;
                $data['options']['size'] = $request->size;
                Cart::add($data);

                return redirect()->back()->with('success', 'Product Added Successfully!');
            }
        } elseif ($request->input('action') === 'buy_now') {

            if ($product->discount_price == 0) {
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $request->qty;
                $data['price'] = $product->selling_price;
                $data['weight'] = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['color'] = $request->color;
                $data['options']['size'] = $request->size;
                Cart::add($data);

                return redirect('/user/checkout')->with('success', 'Product Added Successfully!');
            } else {
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['qty'] = $request->qty;
                $data['price'] = $product->discount_price;
                $data['weight'] = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['color'] = $request->color;
                $data['options']['size'] = $request->size;
                Cart::add($data);

                return redirect('/user/checkout')->with('success', 'Product Added Successfully!');
            }
        }
    }
    // *********************************************************************************************
    public function addCartCombo(Request $request, $id)
    {
        $product = DB::table('combos')->where('id', $id)->first();
        $data = array();

        if ($request->input('action') === 'add_to_cart') {
            if ($product->first_discount_price == 0) {
                $data['id'] = $product->id;
                $data['name'] = $product->first_product_name;
                $data['qty'] = 1;
                $data['price'] = $product->first_selling_price;
                $data['weight'] = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['color'] = $request->color;
                $data['options']['size'] = $request->size;
                Cart::add($data);

                return redirect()->back()->with('success', 'Product Added Successfully!');
            } else {
                $data['id'] = $product->id;
                $data['name'] = $product->first_product_name;
                $data['qty'] = 1;
                $data['price'] = $product->first_discount_price;
                $data['weight'] = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['color'] = $request->color;
                $data['options']['size'] = $request->size;
                Cart::add($data);

                return redirect()->back()->with('success', 'Product Added Successfully!');
            }
            // } elseif ($request->input('action') === 'buy_now') {

            //     if ($product->discount_price == 0) {
            //         $data['id'] = $product->id;
            //         $data['name'] = $product->product_name;
            //         $data['qty'] = $request->qty;
            //         $data['price'] = $product->selling_price;
            //         $data['weight'] = 1;
            //         $data['options']['image'] = $product->image_one;
            //         $data['options']['color'] = $request->color;
            //         $data['options']['size'] = $request->size;
            //         Cart::add($data);

            //         return redirect('/user/checkout')->with('success', 'Product Added Successfully!');
            //     } else {
            //         $data['id'] = $product->id;
            //         $data['name'] = $product->product_name;
            //         $data['qty'] = $request->qty;
            //         $data['price'] = $product->discount_price;
            //         $data['weight'] = 1;
            //         $data['options']['image'] = $product->image_one;
            //         $data['options']['color'] = $request->color;
            //         $data['options']['size'] = $request->size;
            //         Cart::add($data);

            //         return redirect('/user/checkout')->with('success', 'Product Added Successfully!');
            //     }
        }
    }
    //********************************************************************************************************** */
    public function addCartBuy(Request $request, $id)
    {

        $product = DB::table('products')->where('id', $id)->first();
        // dd($product);

        $data = array();

        if ($product->discount_price == 0) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            // return \Response::json(['success' => 'Successfully Added on your Cart!']);

            return Redirect('/user/checkout')->with('success', 'Product Added Successfully!');
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            // return \Response::json(['success' => 'Successfully Added on your Cart!']);
            return Redirect('/user/checkout')->with('success', 'Product Added Successfully!');
        }
    } // End Method

    //************************************************************************************************************** */

    public function categoryWiseProduct(Request $request, $category_slug)
    {
        $category = Category::where('category_slug', $category_slug)->first();

        $products = Product::query()

            ->when($request->has('min') && $request->has('max'), function ($query) use ($request) {
                return $query->whereBetween('selling_price', [$request->min, $request->max]);
            })

            ->when($request->has('sortPrice'), function ($query) use ($request) {
                if ($request->sortPrice == 'price_asc') {
                    return $query->orderBy('selling_price', 'ASC');
                } else {
                    return $query->orderBy('selling_price', 'DESC');
                }
            })

            ->when($request->has('availabilities'), function ($query) use ($request) {
                return $query->whereIn('availability', $request->availabilities);
            })
            ->when($request->has('brands'), function ($query) use ($request) {
                return $query->whereIn('brand_id', $request->brands);
            })
            ->where('category_id', $category->id)
            ->where('status', 1)
            ->limit($request->limit_item)
            ->get();

        return response()->json($products);
    }


    public function categoryView(Request $request, $category_slug)
    {
        $HeadSlug = $category_slug;
        $category = Category::where('category_slug', $category_slug)->first();
        $categoryloop = DB::table('categories')
            ->leftJoin('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
            ->where('categories.category_slug', $category->category_slug)
            ->get();

        return view('frontend.pages.category_product_show', compact('HeadSlug', 'category', 'categoryloop'));
    }


    public function backUPcategoryView(Request $request, $category_slug)
    {

        $HeadSlug = $category_slug;

        $category = Category::where('category_slug', $category_slug)->first();


        $categoryloop = DB::table('categories')
            ->leftJoin('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
            ->where('categories.category_slug', $category->category_slug)
            ->get();

        $maxvalue = intval($request->max);
        $minvalue = intval($request->min);

        $products = Product::query()

            ->when($request->has('min') && $request->has('max'), function ($query) use ($request) {
                return $query->whereBetween('selling_price', [$request->min, $request->max]);
            })
            ->when($request->has('availability'), function ($query) use ($request) {
                return $query->whereIn('availability', $request->availability);
            })
            ->when($request->has('brand'), function ($query) use ($request) {
                return $query->whereIn('brand_id', $request->brand);
            })
            ->where('category_id', $category->id)
            ->where('status', 1)
            ->get();

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return view('frontend.pages.filter_products', compact('products'))->render();
        }

        return view('frontend.pages.category_product_show', compact('products', 'HeadSlug', 'category', 'categoryloop'));
    }


    public function S($subcategory_slug)
    {

        $HeadSlug = $subcategory_slug;

        $subcategory = SubCategory::where('subcategory_slug', $subcategory_slug)->first();
        $category_all = DB::table('products')
            ->where('subcategory_id', $subcategory->id)
            ->paginate(20);
        $category = DB::table('sub_categories')
            ->leftJoin('chlild_categories', 'sub_categories.id', '=', 'chlild_categories.sub_category_id')
            ->where('chlild_categories.sub_category_id', $subcategory->id)
            ->select('sub_categories.*', 'chlild_categories.*')
            ->get();

        return view('frontend.pages.subcategory_product_show', compact('category_all', 'HeadSlug', 'category'));
    } // End Method

    public function SubCategoryView($category_slug, $subcategory_slug)
    {
        $HeadSlug = $subcategory_slug;

        $subcategory = SubCategory::where('subcategory_slug', $subcategory_slug)->first();

        // Get products related to the subcategory
        $category_all = DB::table('products')->where('subcategory_id', $subcategory->id)->where('status', 1)->paginate(20);

        $child_categories = ChlildCategory::where('sub_category_id', $subcategory->id)->get();

        return view('frontend.pages.subcategory_product_show', compact('category_all', 'HeadSlug', 'child_categories', 'subcategory', 'category_slug'));
    } // End Method

    public function ChildCategoryView($category_slug, $subcategory_slug, $childcategory_slug, Request $request)
    {
        $HeadSlug = $childcategory_slug;

        $childcategory = DB::table('chlild_categories')
            ->where('childcategory_slug', $childcategory_slug)
            ->join('sub_categories', 'chlild_categories.sub_category_id', 'sub_categories.id')
            ->select('chlild_categories.*', 'sub_categories.subcategory_slug', 'sub_categories.subcategory_name')
            ->first();


        // $category_all = DB::table('products')
        //     ->where('childcategory_id', $childcategory->id)
        //     ->where('status', 1)
        //     ->paginate(20);

        $maxvalue = intval($request->max);
        $minvalue = intval($request->min);

        $category_all = Product::query()

            ->when($request->has('min') && $request->has('max'), function ($query) use ($request) {
                return $query->whereBetween('selling_price', [$request->min, $request->max]);
            })
            ->when($request->has('availability'), function ($query) use ($request) {
                return $query->whereIn('availability', $request->availability);
            })
            ->when($request->has('brand'), function ($query) use ($request) {
                return $query->whereIn('brand_id', $request->brand);
            })
            ->where('childcategory_id', $childcategory->id)
            ->where('status', 1)
            ->paginate(5);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return view('frontend.pages.filtertCategoryProduct', compact('category_all', 'HeadSlug', 'childcategory'))->render();
        }

        return view('frontend.pages.childcategory_product_show', compact('category_all', 'HeadSlug', 'childcategory'));
    }


    public function Search(Request $request)
    {
        $search = $request->search;

        $products = Product::query()
            ->where('status', 1)
            ->when($search, function ($query, $search) {
                return $query->where('product_name', 'like', '%' . $search . '%')->orderby('id', 'desc')->select('id', 'product_name', 'image_one', 'image_two', 'product_slug')->take(10);
            })->get();

        if ($request->not_ajax == 'not_ajax') {

            $products = Product::query()
                ->where('status', 1)
                ->when($search, function ($query, $search) {
                    return $query->where('product_name', 'like', '%' . $search . '%')->orderby('id', 'desc')->select('id', 'product_name', 'image_one', 'image_two', 'product_slug');
                })->paginate(16);

            return view('frontend.pages.product_search', compact('products', 'search'));
        } else {
            return response()->json($products);
        }
    }

    public function ProductListAjax()
    {
        $products = Product::where('status', 1)->select('product_name')->get();
        $data = [];
        $categories = Category::select('category_name')->get();
        // dd($categories);
        $subcategories = SubCategory::select('subcategory_name')->get();
        $childcategories = ChlildCategory::select('childcategory_name')->get();
        foreach ($products as $item) {
            $data[] = [
                'value' => $item->product_name,
            ];
        }
        foreach ($categories as $item) {
            // dd($item);
            $data[] = [
                'value' => $item->category_name,
            ];
        }
        foreach ($subcategories as $item) {
            $data[] = [
                'value' => $item->subcategory_name,
            ];
        }
        foreach ($childcategories as $item) {
            $data[] = [
                'value' => $item->childcategory_name,
            ];
        }
        // dd($data);

        // return response()->json($data);
        // dd($data);
        return $data;
    }

    public function BrandFilter(Request $request)
    {
        $selectedBrands = $request->input('brandfilter');
        // If no brands are selected, you may want to handle this case or show all data
        if (empty($selectedBrands)) {
            $product = Product::paginate(12);
        } else {
            $product = Product::whereIn('brand_id', $selectedBrands)->paginate(8);
        }
        return view('frontend.pages.all_product', compact('product'));
    }

    public function AvailabilityFilter(Request $request)
    {

        $selectedavailability = $request->input('availability');

        if (empty($selectedavailability)) {
            $product = Product::paginate(12);
        } else {
            $product = Product::whereIn('availability', $selectedavailability)->paginate(8);
        }
        return view('frontend.pages.all_product', compact('product'));
    }

    public function PriceFilter(Request $request)
    {
        $minvalue = $request->min;
        $maxvalue = $request->max;

        $products = Product::whereBetween('selling_price', [$minvalue, $maxvalue])
            ->get();

        if ($products->count() > 0) {
            return view('frontend.pages.filtertProduct', compact('products'));
        } else {
            return "No Product Found";
        }
    }

    //************************************************************************************************ */
    //this section is all category product search
    //************************************************************************************************ */
    public function BrandFilterCategory(Request $request)
    {

        $selectedBrands = $request->input('brandfilter');
        $id = $request->id;
        // If no brands are selected, you may want to handle this case or show all data
        if (empty($selectedBrands)) {
            $category_all = Product::where('category_id', $id)->paginate(12);
        } else {
            $category_all = Product::where('category_id', $id)->whereIn('brand_id', $selectedBrands)->paginate(8);
        }
        return view('frontend.pages.category_product_show', compact('category_all'));
    }

    public function AvailabilityFiltercategory(Request $request)
    {

        $selectedavailability = $request->input('availability');
        $id = $request->id;

        if (empty($selectedavailability)) {
            $category_all = Product::where('category_id', $id)->paginate(12);
        } else {
            $category_all = Product::where('category_id', $id)->whereIn('availability', $selectedavailability)->paginate(8);
        }
        return view('frontend.pages.category_product_show', compact('category_all'));
    }

    public function PriceFiltercategory(Request $request, $id)
    {

        $maxvalue = intval($request->max);
        $minvalue = intval($request->min);

        $selectedSortOption = $request->selectedSortOption;
        $query = Product::query()
            ->where('status', 1)
            ->when($id, function ($query, $id) use ($request) {
                if ($request->type == 'category') {
                    return $query->where('category_id', $id);
                }

                if ($request->type == 'subcategory') {
                    return $query->where('subcategory_id', $id);
                }

                if ($request->type == 'childcategory') {
                    return $query->where('childcategory_id', $id);
                }
            })
            ->when($maxvalue || $minvalue, function ($query) use ($maxvalue, $minvalue) {
                return $query->whereBetween('selling_price', [$minvalue, $maxvalue]);
            })
            ->when($request->availability && $request->availability !== "undefined", function ($query) use ($request) {
                return $query->whereIn('availability', is_array($request->availability) ? $request->availability : [$request->availability]);
            })
            ->when($request->brand && $request->brand !== "undefined", function ($query) use ($request) {
                return $query->whereIn('brand_id', is_array($request->brand) ? $request->brand : [$request->brand]);
            })
            ->when($request->limitPrduct && $request->limitPrduct != "undefined", function ($query) use ($request) {
                return $query->take($request->limitPrduct);
            })
            ->when($selectedSortOption == 'price_asc', function ($query) {
                return $query->orderBy('selling_price', 'ASC');
            })
            ->when($selectedSortOption == 'price_desc', function ($query) {
                return $query->orderBy('selling_price', 'DESC');
            });

        $category_all = $query->get();
        if (isset($category_all)) {
            return view('frontend.pages.filtertCategoryProduct', compact('category_all'));
        } else {
            return "No Product Found";
        }
    }

    public function PriceFilter1(Request $request)
    {

        $maxvalue = intval($request->max);
        $minvalue = intval($request->min);
        $selectedSortOption = $request->selectedSortOption;
        $query = Product::query();
        if ($maxvalue && $minvalue) {
            $query->whereBetween('selling_price', [$minvalue, $maxvalue]);
        }
        if ($request->availability && $request->availability !== "undefined") {
            $query->whereIn('availability', is_array($request->availability) ? $request->availability : [$request->availability]);
        }
        if ($request->brand && $request->brand !== "undefined") {
            $query->whereIn('brand_id', is_array($request->brand) ? $request->brand : [$request->brand]);
        }
        if ($request->limitPrduct && $request->limitPrduct != "undefined") {
            $query->take($request->limitPrduct);
        }
        if ($selectedSortOption == 'price_asc') {
            $query->orderBy('selling_price', 'ASC');
        } elseif ($selectedSortOption == 'price_desc') {
            $query->orderBy('selling_price', 'DESC');
        }
        $products = $query->get();
        if (isset($products)) {
            return view('frontend.pages.filtertProduct', compact('products'));
        } else {
            return "No Product Found";
        }
    }

    // public function DownloadFile(Request $request, $file)
    // {

    //     return response()->download(public_path('media/pdfs/'.$file));
    // }
    //
    public function DownloadFile($id)
    {
        $pdf = DB::table('products')->where('id', $id)->first();
        $path = public_path("{$pdf->catalouge}");

        return \response()->download($path);
    }

    public function DownloadDriveFile($id)
    {
        $pdf = DB::table('products')->where('id', $id)->first();
        $path = public_path("{$pdf->drivers}");
        return \response()->download($path);
    }
}
