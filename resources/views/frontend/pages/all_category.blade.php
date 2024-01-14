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
            {{-- <a href="{{url('category/product/details/'.$category->id)}}">{{$category->category_name}}</a>    --}}
            <a href="{{ url('category/'. $category->category_slug) }}">{{$category->category_name}}</a>
            @endforeach

          </div>
    </div>
  </section>

  <!-- category banner end -->


  <section class=" p-item-page bg-bt-gray p-tb-15">
  <!-- category filter start -->

    <div class="container">
      <div class="row">

    <!-- category filter end -->
   <!-- product list start -->

          <div id="content" class="col-xs-12 col-md-12 col-lg-12 product-listing">
              <div class="top-bar ws-box">
            <div class="row">
                <div class="col-sm-4 col-xs-2 actions">
                    {{-- <button class="tool-btn" id="lc-toggle"><i class="material-icons"></i> Filter</button> --}}
                    <label class="page-heading m-hide">All Category</label>
                </div>
                <div class="col-sm-8 col-xs-10 show-sort">
                    {{-- <div class="form-group rs-none">
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
                    </div> --}}
                </div>
            </div>

        </div>
        <!-- product list item start -->
             <div class=" p-items-wrap">
      <!-- product item start -->

      @php
         $all_category = App\Models\Category::paginate(12);
      @endphp
      @foreach ($all_category as $item )
      <div class="p-item">
        <div class="p-item-inner">
           <div class="p-item-img">
            {{-- <a href="{{ url('category/product/details/' . $item->id) }}"> --}}
            <a href="{{ url('category/'.$item->category_slug) }}">
              <img src="{{ asset($item->category_img) }}" alt="{{ $item->category_name }}" width="228" height="228">
          </a>
            </div>
            <div class="p-item-details">
                {{-- <h4 class="p-item-name"> <a href="{{url('category/product/details/'.$item->id)}}">{{$item->category_name}}</a></h4> --}}
                <h4 class="p-item-name"> <a href="{{url('category/'.$item->category_name)}}">{{$item->category_name}}</a></h4>
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
                 </div>
        <div class="col-md-4 rs-none text-right">
            <p>Showing {{$all_category->firstItem()}} to {{$all_category->lastItem()}} of {{$all_category->total()}} ({{$all_category->lastPage()}} Pages)</p>
        </div>
    </div>

    </div>

  </div>

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
