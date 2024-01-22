@extends('fontend_master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<style>
  #slider-range {
  margin-top: -20px;
  margin-bottom: 10px;
}

.ui-widget-content {
  height: 4px;
  background-color: #b7b7b7;
  border: none !important;
  position: relative;
}

.ui-widget-header {
  background-color: #EF4A23 !important;
  position: absolute;
  height: 100%;
}

.ui-slider-handle {
  top: -8px !important;
  height: 20px;
  width: 20px;
  background-color: #EF4A23 !important;
  border-radius: 10px;
  border-color: #EF4A23 !important;
  position: absolute;
}
.price-filter input{
  margin-top: 10px;
}
</style>

@php
  $slider = DB::table('sliders')->first();
@endphp
<section class="">
    <div class="container c-intro">
      <ul class="breadcrumb" itemscope itemtype="">
                      <li><a href="index.html"><i class="fa fa-home" title="Home">home</i></a></li>
                      <li  itemprop="itemListElement" itemscope itemtype=""><a itemtype="" itemprop="item" href=""><span itemprop="name">Laptop</span></a><meta itemprop="position" content="1" /></li>
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
          <h1>Category list </h1>
          @php
          $category= DB::table('categories')->get();
          $productHighRange = DB::table('products')->min('selling_price');
         @endphp
           <div class="child-list">
            @foreach ($category as $category )
            {{-- <a href="{{url('category/product/details/'.$category->id)}}">{{$category->category_name}}</a> --}}
            <a href="{{ route('category.view', ['category_slug' => $category->category_slug]) }}">{{$category->category_name}}</a>
            @endforeach
    </div>
  </section>

  <!-- category banner end -->


  <section class=" p-item-page bg-bt-gray p-tb-15">
  <!-- category filter start -->

    <div class="container">
      <div class="row">
      <column id="column-left" class="col-sm-3">
      {{-- <span class="lc-clos"><i class="material-icons" aria-hidden="true">close</i></span> --}}
    <div class="filters">
       <div class="price-filter ws-box">
         <div class="label">
          <span>Price Range</span>
         </div>
         <form action="{{ route('filter.price') }}" method="post">
          @csrf
         <div class="pf-wrap">

            <div class="mb-2" id="slider-range"></div>
            <label class="range-label from"><input type="text" id="min" name="min" value="0"></label>
            <label  class="range-label to"><input type="text" id="max" name="max" value="{{$productHighRange}}"></label>
         </div>

         </form>
      </div>

        <div class="filter-group ws-box show" data-group-type="status">
        <div class="label">
          <span>Availability</span>
        </div>
        <div class="items">
          <form action="{{ route('filter.availability') }}" method="post">
          <label class="filter">
              @csrf
            <input type="checkbox" name="availability[]" value="In Stock" />
            <span>In Stock</span>
          </label>
          <label class="filter">
            <input type="checkbox" name="availability[]" value="Pre Order" />
            <span>Pre Order</span>
          </label>
          <label class="filter">
            <input type="checkbox" name="availability[]" value="Up Coming" />
            <span>Up Coming</span>
          </label>
          <input type="submit" class="btn btn-success" value="Search Availability">
          </form>
        </div>
      </div>

    @php
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
        <input type="submit" class="btn btn-success" value="Search Brand">
      </form>
          </div>
    </div>
    </div>
  </column>
    <!-- category filter end -->
   <!-- product list start -->


          <div id="content" class="col-xs-12 col-md-9 col-lg-9 product-listing">
              <div class="top-bar ws-box">
            <div class="row">
                <div class="col-sm-4 col-xs-2 actions">
                    <button class="tool-btn" id="lc-toggle"><i class="material-icons"></i> Filter</button>
                    <label class="page-heading m-hide">All Products</label>
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
        <div class=" p-items-wrap" id="productList_p">
          <!-- product item start -->
            @foreach ($product as $item )
            <div class="p-item">
              <div class="p-item-inner">

                <div class="p-item-img"><a href="{{ url('product/' . $item->product_slug) }}"><img src="{{asset($item->image_one)}}" alt="{{$item->product_name}}" width="228" height="228"></a></div>
                  <div class="p-item-details">
                      <h4 class="p-item-name"> <a href="{{url('product/' . $item->product_slug)}}">{{$item->product_name}}</a></h4>
                      <div class="p-item-price">
                        <span>{{ $item->selling_price - $item->discount_price }}৳</span>
                        <span class="price-old">{{ $item->selling_price }}৳</span>
                      </div>
                    <div class="actions">
                        <a href="" data-id="{{$item->id}}"  class="btn submit-btn addcart" id="button-cart" style="width: 100%; margin:  0px 10px 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                        <a href="{{route('user.checkout')}}" data-id="{{$item->id}}"  class="buynow btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>

                      </div>
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
                 </div>
        <div class="col-md-4 rs-none text-right">
        </div>
    </div>

    </div>

  </div>


  </section>

<script type="text/javascript">

  $(document).ready(function(){
    $('.addcart').on('click', function(){
      event.preventDefault();
       var id = $(this).data('id');
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

<script>
  function formatSliderValues(value) {
    if (value == null) return 'Any';
    return value;
  }

  var stepSize = 1;
  var maxSliderValue = 5000;
  var values = Array.from({ length: (maxSliderValue / stepSize) + 1 }, (_, i) => i * stepSize);

  $("#slider-range").slider({
    range: true,
    max: values.length - 1,
    values: [0, values.length - 1],
    slide: function (event, ui) {
      var min = values[ui.values[0]];
      var max = values[ui.values[1]];
      $("[name=min]").val(min);
      $("[name=max]").val(max);
      $("#min").val(formatSliderValues(min));
      $("#max").val(formatSliderValues(max));

      updatePrices(min, max);
    }
  });


  var min = values[$("#slider-range").slider("values", 0)];
  var max = values[$("#slider-range").slider("values", 1)];
  $("[name=min]").val(min);
  $("[name=max]").val(max);
  $("#min").val(formatSliderValues(min));
  $("#max").val(formatSliderValues(max));


  function updatePrices(min, max) {
  $.post('{{ route('filter.price') }}', {
    "_token": '{{ csrf_token() }}',
    min: min,
    max: max,
  }, function (data) {
     $('#productList_p').html(data);
  });
};

</script>



@endsection
