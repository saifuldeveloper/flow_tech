<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;

use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\QuestionAnswerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\LeadManagementController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ComboController;
use App\Http\Controllers\Backend\ChildCategoryContoller;
use App\Http\Controllers\Frontend\SubscribeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserReviewController;
use App\Http\Controllers\Frontend\UserReviewController as FrontendUserReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// fontend routes


// Add To Cart Routes
Route::get('/add/to/cart/{id}', [CartController::class, 'addCart']);
Route::get('/product/cart', [CartController::class, 'showCart'])->name('show.cart');
Route::get('/check', [CartController::class, 'check']);
Route::get('/remove/cart/{rowId}', [CartController::class, 'removeCart']);
Route::post('/update/cart/item', [CartController::class, 'updateCart'])->name('update.cartitem');
// order routes
Route::post('/user/payment/process/', [PaymentController::class, 'PaymentProcess'])->name('payment.process');
Route::get('/user/congratulations/', [PaymentController::class, 'congratulations'])->name('user.congratulations');

// fontend checkout and wishlist, cupon
Route::get('/user/checkout/add', [CartController::class, 'Checkout'])->name('user.checkout');
Route::get('/user/checkout', [CartController::class, 'CheckoutRedirect'])->name('user.checkout.rediect');
// Route::get('/user/wishlist', [CartController::class, 'Wishlist'])->name('user.wishlist');

Route::post('/user/apply/coupon/', [CartController::class, 'applyCoupon'])->name('apply.coupon');
Route::get('/user/coupon/remove/', [CartController::class, 'CouponRemove'])->name('coupon.remove');

// Product Details Page
// Route::get('/allcategory/{id}', [ProductDetailsController::class, 'categoryView']);
Route::get('/product/show', [ProductDetailsController::class, 'AllproductView'])->name('allProduct.show');
// Route::get('/product/details/{id}/{product_name}', [ProductDetailsController::class, 'productView']);
Route::get('/product/{product_slug}', [ProductDetailsController::class, 'productView']);

//   Download file
Route::get('/download/{file}',[ProductDetailsController::class,'DownloadFile'])->name('download.file');


Route::get('/latest/offer/page', [ProductDetailsController::class, 'LatestOfferPage'])->name('latest.offer.page');
// Category wise product view
// Route::get('/category/{slug}', [ProductDetailsController::class, 'categoryView'])->name('category.view');
// Route::get('/category/{slug}', [ProductDetailsController::class, 'categoryView'])->name('category.view');
// Route::get('/category/{id}', [ProductDetailsController::class, 'categoryView'])->name('category.view');
Route::get('/category/{category_slug}', [ProductDetailsController::class, 'categoryView'])->name('category.view');


Route::get('/subcategory/{subcategory_slug}', [ProductDetailsController::class, 'SubCategoryView'])->name('subcategory.view');
Route::get('/childcategory/{childcategory_slug}', [ProductDetailsController::class, 'ChildCategoryView'])->name('childcategory.view');

// Product search controller
Route::get('/product-list', [ProductDetailsController::class, 'ProductListAjax']);
Route::post('/product/search', [ProductDetailsController::class, 'Search'])->name('product.search');

// Product filter
Route::post('product/brand/filter', [ProductDetailsController::class, 'BrandFilter'])->name('filter.brands');
Route::post('product/availability/filter', [ProductDetailsController::class, 'AvailabilityFilter'])->name('filter.availability');
Route::post('product/price/filter', [ProductDetailsController::class, 'PriceFilter'])->name('filter.price');

// Product filter with category
Route::post('brand/filter/category/{id}', [ProductDetailsController::class, 'BrandFilterCategory']);
Route::post('availability/filter/category/{id}', [ProductDetailsController::class, 'AvailabilityFiltercategory'])->name('filter.availability.category');
Route::post('price/filter/category/{id}', [ProductDetailsController::class, 'PriceFiltercategory'])->name('filter.price.category');

// Cart Routes
Route::post('/cart/product/add/{slug}', [ProductDetailsController::class, 'addCart']);
Route::post('/cart/combo/add/{slug}', [ProductDetailsController::class, 'addCartCombo']);
Route::post('/cart/product/add/buy/{slug}', [ProductDetailsController::class, 'addCartBuy']);




 // backend routes
 Route::get('/admin/login', [AdminController::class, 'adminLoginForm'])->name('admin.login.form');
 Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
 Route::post('/admin-login', [AdminController::class, 'adminLogin'])->name('admin.login');

 Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
     // home page Slider
    Route::get('/admin/list/slider',[SliderController::class,'listSlider'])->name('list.slider');
    Route::get('/admin/add/slider',[SliderController::class,'addSlider'])->name('add.slider');
    Route::post('/admin/store/slider',[SliderController::class,'storeSlider'])->name('store.slider');
    Route::get('/admin/delete/slider/{id}',[SliderController::class,'deleteSlider'])->name('delete.slider');
    Route::get('/admin/details/slider/{id}',[SliderController::class,'detailsSlider'])->name('details.slider');
    Route::get('/admin/edit/slider/{id}',[SliderController::class,'editSlider'])->name('edit.slider');
    Route::post('/admin/update/slider/{id}',[SliderController::class,'updateSlider'])->name('update.slider');

    // home site image Slider  one image section

    Route::get('/admin/list/slider/site',[SliderController::class,'listSiteSlider'])->name('list.slider.site');
    Route::get('/admin/add/slider/site',[SliderController::class,'addSiteSlider'])->name('add.slider.site');
    Route::post('/admin/store/slider/site',[SliderController::class,'storeSiteSlider'])->name('store.slider.site');
    Route::get('/admin/delete/slider/site/{id}',[SliderController::class,'deleteSiteSlider'])->name('delete.slider.site');
    Route::get('/admin/details/slider/site/{id}',[SliderController::class,'detailsSiteSlider'])->name('details.slider.site');
    Route::get('/admin/edit/slider/site/{id}',[SliderController::class,'editSiteSlider'])->name('edit.slider.site');
    Route::post('/admin/update/slider/site/{id}',[SliderController::class,'updateSiteSlider'])->name('update.slider.site');
    // home popup image section

    Route::get('/admin/list/popup',[SliderController::class,'listPopup'])->name('list.popup');
    Route::get('/admin/add/popup',[SliderController::class,'addPopup'])->name('add.popup');
    Route::post('/admin/store/popup',[SliderController::class,'storePopup'])->name('store.popup');
    Route::get('/admin/delete/popup/{id}',[SliderController::class,'deletePopup'])->name('delete.popup');
    Route::get('/admin/details/popup/{id}',[SliderController::class,'detailsPopup'])->name('details.popup');
    Route::get('/admin/edit/popup/{id}',[SliderController::class,'editPopup'])->name('edit.popup');
    Route::post('/admin/update/popup/{id}',[SliderController::class,'updatePopup'])->name('update.popup');

    Route::get('inactive/popup/{id}',[SliderController::class,'inactive']);
    Route::get('active/popup/{id}',[SliderController::class,'active']);

    // index site image Slider  two image section

    Route::get('/admin/list/slider/two/site',[SliderController::class,'listTwoSiteSlider'])->name('list.slider.twosite');
    Route::get('/admin/add/slider/two/site',[SliderController::class,'addTwoSiteSlider'])->name('add.slider.twosite');
    Route::post('/admin/store/slider/two/site',[SliderController::class,'storeTwoSiteSlider'])->name('store.slider.twosite');
    Route::get('/admin/delete/slider/two/site/{id}',[SliderController::class,'deleteTwoSiteSlider'])->name('delete.slider.twosite');
    Route::get('/admin/details/slider/two/site/{id}',[SliderController::class,'detailsTwoSiteSlider'])->name('details.slider.twosite');
    Route::get('/admin/edit/slider/site/two/{id}',[SliderController::class,'editSiteTwoSlider'])->name('edit.slider.twosite');
    Route::post('/admin/update/slider/site/two/{id}',[SliderController::class,'updateTwoSiteSlider'])->name('update.slider.twosite');

     // index page Slider
    Route::get('/admin/list/index/slider',[SliderController::class,'listIndexSlider'])->name('list.indexslider');
    Route::get('/admin/add/index/slider',[SliderController::class,'addIndexSlider'])->name('add.indexslider');
    Route::post('/admin/store/index/slider',[SliderController::class,'storeIndexSlider'])->name('store.indexslider');
    Route::get('/admin/delete/index/slider/{id}',[SliderController::class,'deleteIndexSlider'])->name('delete.indexslider');
    Route::get('/admin/details/index/slider/{id}',[SliderController::class,'detailsIndexSlider'])->name('details.indexslider');
    Route::get('/admin/edit/index/slider/{id}',[SliderController::class,'editIndexSlider'])->name('edit.indexslider');
    Route::post('/admin/update/index/slider/{id}',[SliderController::class,'updateIndexSlider'])->name('update.indexslider');

      // Category
      Route::get('/admin/list/category',[CategoryController::class,'listCategory'])->name('list.category');
      Route::get('/admin/add/category',[CategoryController::class,'addCategory'])->name('add.category');
      Route::post('/admin/store/category',[CategoryController::class,'storeCategory'])->name('store.category');
      Route::get('/delete/category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');
      Route::get('/admin/edit/category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
      Route::post('/admin/update/category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
      Route::get('/admin/details/category/{id}',[CategoryController::class,'detailsCategory'])->name('details.category');

    // Subcategory
    Route::get('/admin/list/subcategory',[SubCategoryController::class,'listSubCategory'])->name('list.subcategory');
    Route::get('/admin/add/subcategory',[SubCategoryController::class,'addSubCategory'])->name('add.subcategory');
    Route::post('/admin/store/subcategory',[SubCategoryController::class,'storeSubCategory'])->name('store.subcategory');
    Route::get('/admin/delete/subcategory/{id}',[SubCategoryController::class,'deleteSubCategory'])->name('delete.subcategory');
    Route::get('/admin/edit/subcategory/{id}',[SubCategoryController::class,'editSubCategory'])->name('edit.subcategory');
    Route::post('/admin/update/subcategory/{id}',[SubCategoryController::class,'updateSubCategory'])->name('update.subcategory');
    Route::get('/admin/details/subcategory/{id}',[SubCategoryController::class,'detailsSubCategory'])->name('details.subcategory');


    Route::get('/admin/list/childcategory',[ChildCategoryContoller::class,'listchildCategory'])->name('list.childcategory');
    Route::get('/admin/add/childcategory',[ChildCategoryContoller::class,'addchildCategory'])->name('add.childcategory');
    Route::post('/admin/store/childcategory',[ChildCategoryContoller::class,'storechildCategory'])->name('store.childcategory');
    Route::get('/admin/delete/childcategory/{id}',[ChildCategoryContoller::class,'deletechildCategory'])->name('delete.childcategory');
    Route::get('/admin/edit/childcategory/{id}',[ChildCategoryContoller::class,'editchildCategory'])->name('edit.childcategory');
    Route::post('/admin/update/childcategory/{id}',[ChildCategoryContoller::class,'updatechildCategory'])->name('update.childcategory');
    Route::get('/admin/details/childcategory/{id}',[ChildCategoryContoller::class,'detailschildCategory'])->name('details.childcategory');

    // shipments
    Route::get('/admin/list/shipments',[SubCategoryController::class,'listShipments'])->name('list.shipments');
    Route::get('/admin/add/shipments',[SubCategoryController::class,'addShipments'])->name('add.shipments');
    Route::post('/admin/store/shipments',[SubCategoryController::class,'storeShipments'])->name('store.shipments');
    Route::get('/admin/delete/shipments/{id}',[SubCategoryController::class,'deleteShipments'])->name('delete.shipments');
    Route::get('/admin/edit/shipments/{id}',[SubCategoryController::class,'editShipments'])->name('edit.shipments');
    Route::post('/admin/update/shipments/{id}',[SubCategoryController::class,'updateShipments'])->name('update.shipments');
    Route::get('/admin/details/shipments/{id}',[SubCategoryController::class,'detailsShipments'])->name('details.shipments');

    // Brand
  Route::get('/admin/list/brand',[BrandController::class,'listBrand'])->name('list.brand');
  Route::get('/admin/add/brand',[BrandController::class,'addBrand'])->name('add.brand');
  Route::post('/admin/store/brand',[BrandController::class,'storeBrand'])->name('store.brand');
  Route::get('/admin/delete/brand/{id}',[BrandController::class,'deleteBrand'])->name('delete.brand');
  Route::get('/admin/edit/brand/{id}',[BrandController::class,'editBrand'])->name('edit.brand');
  Route::post('/admin/update/brand/{id}',[BrandController::class,'updateBrand'])->name('update.brand');
  Route::get('/admin/details/brand/{id}',[BrandController::class,'detailsBrand'])->name('details.brand');

    // Blog
  Route::get('/admin/list/blog',[BlogController::class,'listBlog'])->name('list.blog');
  Route::get('/admin/add/blog',[BlogController::class,'addBlog'])->name('add.blog');
  Route::post('/admin/store/blog',[BlogController::class,'storeBlog'])->name('store.blog');
  Route::get('/admin/delete/blog/{id}',[BlogController::class,'deleteBlog'])->name('delete.blog');
  Route::get('/admin/edit/blog/{id}',[BlogController::class,'editBlog'])->name('edit.blog');
  Route::post('/admin/update/blog/{id}',[BlogController::class,'updateBlog'])->name('update.blog');
  Route::get('/admin/details/blog/{id}',[BlogController::class,'detailsBlog'])->name('details.blog');




  //blog Commments
  Route::post('/admin/store/blog/comments',[BlogController::class,'storeBlogComments'])->name('store.blog.comments');

     // Product
     Route::get('/admin/list/product',[ProductController::class,'listProduct'])->name('list.product');
     Route::get('/admin/add/product',[ProductController::class,'addProduct'])->name('add.product');
     Route::post('/admin/store/product',[ProductController::class,'storeProduct'])->name('store.product');
     Route::get('/admin/delete/product/{id}',[ProductController::class,'deleteProduct'])->name('delete.product');
     Route::get('/admin/edit/product/{id}',[ProductController::class,'editProduct'])->name('edit.product');
     Route::post('/admin/update/withoutimg/product/{id}',[ProductController::class,'updateWithoutImgProduct'])->name('update.product.withoutimg');
     Route::post('/admin/update/withimg/product/{id}',[ProductController::class,'updateWithImgProduct'])->name('update.product.withimg');
     Route::get('/admin/details/product/{id}',[ProductController::class,'detailsProduct'])->name('details.product');

     // combo
     Route::get('/admin/list/combo',[ComboController::class,'listcombo'])->name('list.combo');
     Route::get('/admin/page/combo',[ComboController::class,'Combopageshow'])->name('page.combo');
     Route::post('/admin/add/combo',[ComboController::class,'addProduct'])->name('add.combo');
     Route::get('/admin/delete/combo/{id}',[ComboController::class,'deleteCombo'])->name('delete.combo');
     Route::get('/admin/edit/combo/{id}',[ComboController::class,'editCombo'])->name('edit.combo');


     Route::get('inactive/combo/{id}',[ComboController::class,'inactive']);
     Route::get('active/combo/{id}',[ComboController::class,'active']);

     Route::post('/admin/update/withoutimg/combo/{id}',[ComboController::class,'updateWithoutImgCombo'])->name('update.combo.withoutimg');
     Route::post('/admin/update/withimg/combo/{id}',[ComboController::class,'updateWithImgCombo'])->name('update.combo.withimg');
     Route::get('/admin/details/combo/{id}',[ComboController::class,'detailsCombo'])->name('details.combo');


     Route::get('inactive/product/{id}',[ProductController::class,'inactive']);
     Route::get('active/product/{id}',[ProductController::class,'active']);
     Route::get('get/subcategory/{category_id}',[ProductController::class,'GetSubcat']);
     Route::get('get/childcategory/{category_id}',[ProductController::class,'GetChildcat']);

     // Setting
       Route::get('/admin/list/setting',[SettingController::class,'listSetting'])->name('list.setting');
       Route::get('/admin/add/setting',[SettingController::class,'addSetting'])->name('add.setting');
       Route::post('/admin/store/setting',[SettingController::class,'storeSetting'])->name('store.setting');
       Route::get('/admin/edit/setting/{id}',[SettingController::class,'editSetting'])->name('edit.setting');
       Route::post('/admin/update/setting/{id}',[SettingController::class,'updateSetting'])->name('update.setting');
     // Subscribe

    // this controller must be change
     Route::get('/admin/list/subscribe/', [SubscribeController::class, 'listSubscribe'])->name('list.subscribe');

      // Order List
      Route::get('/admin/list/order',[LeadManagementController::class,'listOrder'])->name('list.order');
      Route::post('/admin/status/update/{id}', [LeadManagementController::class, 'statusUpdate'])->name('admin.status.update');
      Route::get('/admin/details/order/{id}',[LeadManagementController::class,'detailsOrder'])->name('details.order');
      Route::get('/admin/order/invoice/{id}', [LeadManagementController::class, 'invoiceOrder'])->name('invoice.orderlist');

      // Q@A List
      Route::get('/admin/list/question',[QuestionAnswerController::class,'listQuestion'])->name('list.question');
      Route::get('/admin/submit/answer/{id}', [QuestionAnswerController::class, 'addAnswer'])->name('submit.answer');
      Route::post('/admin/update/answer/{id}',[QuestionAnswerController::class,'updateAnswer'])->name('update.answer');
    //   Route::post('/admin/status/update/{id}', [LeadManagementController::class, 'statusUpdate'])->name('admin.status.update');
    //   Route::get('/admin/details/order/{id}',[LeadManagementController::class,'detailsOrder'])->name('details.order');
    //   Route::get('/admin/order/invoice/{id}', [LeadManagementController::class, 'invoiceOrder'])->name('invoice.orderlist');
    Route::post('/question/manage', [QuestionAnswerController::class, 'answerManage']);


           // Coupon
     Route::get('/admin/list/coupon',[CouponController::class,'listCoupon'])->name('list.coupon');
     Route::get('/admin/add/coupon',[CouponController::class,'addCoupon'])->name('add.coupon');
     Route::post('/admin/store/coupon',[CouponController::class,'storeCoupon'])->name('store.coupon');
     Route::get('/admin/delete/coupon/{id}',[CouponController::class,'deleteCoupon'])->name('delete.coupon');
     Route::get('/admin/details/coupon/{id}',[CouponController::class,'detailsCoupon'])->name('details.coupon');
     Route::get('/admin/edit/coupon/{id}',[CouponController::class,'editCoupon'])->name('edit.coupon');
     Route::post('/admin/update/coupon/{id}',[CouponController::class,'updateCoupon'])->name('update.coupon');

});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'Home'])->name('homePage');
// this section for all page detials
Route::get('/about/us', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/category', [App\Http\Controllers\HomeController::class, 'Category'])->name('allcategory');
Route::get('/all/blog', [App\Http\Controllers\HomeController::class, 'Blog'])->name('allblog');
Route::get('/all/blog/{id}', [App\Http\Controllers\HomeController::class, 'SingleBlog'])->name('SingleBlog');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/Return/Policy',[App\Http\Controllers\HomeController::class, 'refundAndReturn'])->name('refundAndReturn');
Route::get('/online/delivery', [App\Http\Controllers\HomeController::class, 'delivery'])->name('delivery');
Route::get('/emi', [App\Http\Controllers\HomeController::class, 'emi'])->name('emi');
Route::get('/privacy/policy', [App\Http\Controllers\HomeController::class, 'policy'])->name('policy');
Route::get('/terms/condition', [App\Http\Controllers\HomeController::class, 'condition'])->name('condition');
// Write a Review
Route::get('/user/product/review/{id}', [FrontendUserReviewController::class, 'review'])->name('review');
Route::post('/user/product/review/form', [FrontendUserReviewController::class, 'reviewSection'])->name('review.section');
Route::get('/user/product/question/{id}',[FrontendUserReviewController::class, 'question'])->name('question');
Route::post('/user/product/question/form',[FrontendUserReviewController::class, 'questionSection'])->name('question.section');
// Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
// Route::get('/registration', [App\Http\Controllers\HomeController::class, 'register'])->name('register');

// Route::get('/', function () {
//   return view('frontend.pages.index');
// });
