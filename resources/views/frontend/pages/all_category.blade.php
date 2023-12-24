@extends('fontend_master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@php
  $slider = DB::table('sliders')->first();
  $category= DB::table('categories')->get();
@endphp 
<!-- category banner start -->
<section class="">
    <div class="container c-intro">
      <ul class="breadcrumb" itemscope itemtype="">
                      <li><a href="{{url('/')}}"><i class="fa fa-home" title="Home"></i></a></li>
                      <li  itemprop="itemListElement" itemscope itemtype=""><a itemtype="" itemprop="item" href=""><span itemprop="name">Category</span></a><meta itemprop="position" content="1" /></li>
                  </ul>        
                  <div class="child-list">
                    </div>
  
  
  </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="shop-banner"> 
            <img src="{{asset($slider->slider_img)}}" width="100%" height="200px" alt="">
          </div>
  
        </div>
      </div>
  
    </div>
  
  </section>
  
  <section class="after-header p-tb-10">
    <div class="container c-intro">
        <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">          
          <h1>All Cateogry</h1>
          </ul>     
           <div class="child-list">
            @foreach ($category as $category )
            <a href="{{url('category/product/details/'.$category->id)}}">{{$category->category_name}}</a>   
            @endforeach
         
          </div>
    </div>
  </section>
  
  <!-- category banner end -->
  
  
  <section class=" p-item-page bg-bt-gray p-tb-15">
  <!-- category filter start -->
  
    <div class="container">
      <div class="row">
      {{-- <column id="column-left" class="col-sm-3">
      <span class="lc-close"><i class="material-icons" aria-hidden="true">close</i></span>
        <div class="filters">
      <div class="price-filter ws-box">
        <div class="label">
          <span>Price Range</span>
        </div>
        <div class="pf-wrap">
        <div id="rang-slider" class="noUi-horizontal" data-from="0" data-to="16500" data-min="0" data-max="16500"></div>
        </div>
        <label class="range-label from"><input type="text" id="range-to" name="from"></label>
        <label  class="range-label to"><input type="text" id="range-from" name="to"></label>
      </div>
        <div class="filter-group ws-box show" data-group-type="status">
        <div class="label">
          <span>Availability</span>
        </div>
        <div class="items">
          <label class="filter">
            <input type="checkbox" name="status" value="7" />
            <span>In Stock</span>
          </label>
          <label class="filter">
            <input type="checkbox" name="status" value="8" />
            <span>Pre Order</span>
          </label>
          <label class="filter">
            <input type="checkbox" name="status" value="9" />
            <span>Up Coming</span>
          </label>
        </div>
      </div>
   {{-- <div class="filter-group ws-box show" data-group-id="305">
      <div class="label">
        <span>Brand</span>
      </div>
      <div class="items">
            <label class="filter">
          <input type="checkbox" name="filter" value="2094" />
          <span>MaxGreen</span>
        </label>
            <label class="filter">
          <input type="checkbox" name="filter" value="2095" />
          <span>Others</span>
        </label>
          </div>
    </div> --}}
    {{-- @php
    $brand=DB::table('brands')->get();
    @endphp
    <div class="filter-group ws-box show" data-group-id="302">
      <div class="label">
        <span>Compatible Brand</span> 
      </div>
      <div class="items">
        <form action="{{ route('filter.brands') }}" method="post">
          @csrf
        @foreach ($brand as $item )
        <label class="filter">
          <input type="checkbox" name="brandfilter[]" value="{{$item->id}}" />
          <span>{{$item->brand_name}}</span>
        </label>
        @endforeach
      
        </form>
          </div>
    </div>
    </div>  
  </column>  --}}
    <!-- category filter end -->
   <!-- product list start -->
  
          <div id="content" class="col-xs-12 col-md-12 col-lg-12 product-listing">
              <div class="top-bar ws-box">
            <div class="row">
                <div class="col-sm-4 col-xs-2 actions">
                    <button class="tool-btn" id="lc-toggle"><i class="material-icons"></i> Filter</button>
                    <label class="page-heading m-hide">All Category</label>
                </div>
                <div class="col-sm-8 col-xs-10 show-sort">
                    <div class="form-group rs-none">
                        <label>Show:</label>
                        <div class="custom-select">
                            <select id="input-limit">
                              <option value="20" selected="selected">20</option>
                              <option value="24">24</option>
                               <option value="48">48</option>
                               <option value="75">75</option>
                                <option value="90">90</option>
                               </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sort By:</label>
                        <div class="custom-select">
                            <select id="input-sort">
                            <option value="">Default</option>
                           <option value="p.price-ASC">Price (Low &gt; High)</option>
                          <option value="p.price-DESC">Price (High &gt; Low)</option>
                      </select>
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
        <!-- product list item start -->
             <div class=" p-items-wrap">
      <!-- product item start -->
      {{-- @foreach ($category_all as $category_all )
      <div class="p-item">
        <div class="p-item-inner">
           <div class="p-item-img"><a href="{{url('product/details/'.$category_all->id.'/'.$category_all->product_name)}}"><img src="{{asset($category_all->image_one)}}" alt="{{$category_all->product_name}}" width="228" height="228"></a></div>
            <div class="p-item-details">
                <h4 class="p-item-name"> <a href="{{url('product/details/'.$category_all->id.'/'.$category_all->product_name)}}">{{$category_all->product_name}}</a></h4>
                                      <div class="p-item-price">
                                          <span>{{$category_all->selling_price}}৳</span>  
                                          <span class="price-old">{{$category_all->discount_price}}৳</span>                  
                                        </div>
                                      <div class="actions">
                                          <a href="" data-id="{{$category_all->id}}"  class="btn submit-btn addcart" id="button-cart" style="width: 100%; margin:  0px 10px 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                          <a href="{{route('user.checkout')}}" data-id="{{$category_all->id}}"  class="buynow btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                     
                                             
                </div>
            </div>
        </div>
    </div>
      @endforeach --}}
      @php
         $all_category = App\Models\Category::paginate(8);
      @endphp
      @foreach ($all_category as $item )
      <div class="p-item">
        <div class="p-item-inner">
           <div class="p-item-img">
            <a href="{{ url('category/product/details/' . $item->id) }}">
              <img src="{{ asset($item->category_img) }}" alt="{{ $item->category_name }}" width="228" height="228">
          </a>
            </div>
            <div class="p-item-details">
                <h4 class="p-item-name"> <a href="{{url('category/product/details/'.$item->id)}}">{{$item->category_name}}</a></h4>
            </div>
        </div>
    </div>
      @endforeach
     
  </div>
       <!-- product item end -->
                    
  </div>
   <!-- product list end -->
   </div>
  </div>

  

  <div class="bottom-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12 ">
          <div class="d-flex justify-content-center">
            {!! $all_category->links('pagination::bootstrap-4') !!}
        </div>
            {{-- <ul class="pagination">
              <li>
                <span class="disabled">PREV</span>
              </li>
              <li class="active"><span>1</span></li>
              <li><a href="1stplayer-casing4658.html?page=2">2</a></li>
              <li><a href="1stplayer-casing4658.html?page=2">NEXT</a></li></ul>          --}}
                 </div>
        <div class="col-md-4 rs-none text-right">
            <p>Showing {{$all_category->firstItem()}} to {{$all_category->lastItem()}} of {{$all_category->total()}} ({{$all_category->lastPage()}} Pages)</p>
        </div>
    </div>
  
    </div>
   
  </div>
  {{-- <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="category-description p-15 ws-box">
          <h2>Buy original branded Laptop in BD</h2>
    
     <table class="table-responsive table-bordered">
  
  
              <tr>
                <th class="txt-left">Laptop List</th>
                <th class="text-right">Price in BD</th>
              </tr>
              <tr class="latest-product">
                <td class="product-name">
                <a href="">Acer TravelMate TMP215-53 Core i3 11th Gen 1TB HDD 15.6&quot; FHD Laptop</a>
              </td>
              <td class="product-price text-right">0৳</td>
            </tr>
            <tr class="latest-product"><td class="product-name">
              <a href="">Acer TravelMate TMP214-54 Core i7 12th Gen 14&quot; FHD Laptop</a></td>
              <td class="product-price text-right">0৳</td>
            </tr>
            <tr class="latest-product"><td class="product-name">
              <a href="">Acer TravelMate TMP214-54 Core i5 12th Gen 14&quot; FHD Laptop</a>
            </td>
            <td class="product-price text-right">0৳</td>
          </tr>
          <tr class="latest-product">
            <td class="product-name">
              <a href="">Acer TravelMate TMP214-54 Core i3 12th Gen 14&quot; HD Laptop</a></td>
              <td class="product-price text-right">0৳</td>
            </tr>
            <tr class="latest-product">
              <td class="product-name">
                <a href="">Lenovo IdeaPad Slim 3i Core i7 11th Gen 15.6&quot; FHD Laptop Abyss Blue</a>
              </td>
              <td class="product-price text-right">0৳</td>
            </tr>
            <tr class="latest-product">
              <td class="product-name">
                <a href="">Dell Latitude 3420 Core i7 11th Gen MX350 2GB Graphics 14&quot; FHD Laptop</a>
              </td>
              <td class="product-price text-right">92,500৳</td>
            </tr>
            <tr class="latest-product"><td class="product-name">
              <a href="">Dell Latitude 3520 Core i5 11th Gen MX550 2GB Graphics 15.6&quot; FHD Laptop</a>
            </td>
            <td class="product-price text-right">78,500৳</td>
          </tr>
          <tr class="latest-product"><td class="product-name">
            <a href="">Lenovo IdeaPad Slim 3i Core i3 11th Gen 512GB SSD 15.6&quot; FHD Laptop</a>
          </td>
          <td class="product-price text-right">53,500৳</td>
        </tr>          
      </table>
          <h2>How to Find The Best Laptop Easily</h2>
          Our user-friendly official site and App lets you search for a 
            <a href="" target="">laptop </a> 
            inyour price range. You can also check brand-wise laptops such as <a href="" target="">Razer</a>,
            <a href="" target="">Apple</a>, Asus, Acer, <a href="" target="">HP</a>,
               
           </div>
      </div>
    </div>
  </div> --}}
  
  </section>
  <script type="text/javascript">
    
    $(document).ready(function(){
      $('.addcart').on('click', function(){
        
         var id = $(this).data('id');
         event.preventDefault();
        // alert(id);

         if (id) {
             $.ajax({
                 url: " {{ url('/add/to/cart/') }}/"+id,
                 type:"GET",
                 datType:"json",
                 success:function(data){

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "center",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                        });
                        Toast.fire({
                        icon: "success",
                        title: "Add Card Successfully"
                        });

       
              if ($.isEmptyObject(data.error)) {
 
                 Toast.fire({
                   icon: 'success',
                   title: data.success
                 })

              
              }else{
                  Toast.fire({
                   icon: 'error',
                   title: data.error
                 })

          
              }
  
 
                 },
             });
 
         }else{
             alert('danger');
         }

      });
      $('.buynow').on('click', function(){
         var id = $(this).data('id');
        // alert(id);

         if (id) {
             $.ajax({
                 url: " {{ url('/add/to/cart/') }}/" + id,
                 type:"GET",
                 dataType:"json",
                 success:function(data){
    
              if ($.isEmptyObject(data.error)) {
 
                 Toast.fire({
                   icon: 'success',
                   title: data.success
                 })

              
              }
              else{
                  Toast.fire({
                   icon: 'error',
                   title: data.error
                 })

          
              }
  
 
                 },
             });
 
         }else{
             alert('danger');
         }

      });
 
    });
 
 
 </script>
@endsection