@extends('fontend_master')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/fontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontend/css/owl.theme.default.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- product details start -->

    <div class="  product-details content" itemscope itemtype="">
        <meta itemprop="sku" content="30322">
        <div class="product-details-summary">

            <div class="container">
                <div class="pd-q-actions">
                    <div class="share-on">
                        <span class="share">Share:</span>
                        <span class="icon-sprite share-ico fb-dark" data-type="facebook"></span>
                        <span class="icon-sprite share-ico pinterest-dark" data-type="pinterest"></span>
                    </div>

                </div>

                <div class="basic row">
                    <div class="col-md-5 left">
                        <div class="images product-images">
                            <div class="product-img-holder">
                                <a class="thumbnail" href=""
                                    title="{{ $product->product_name }}"><img class="main-img"
                                        src="{{ asset($product->image_one) }}"
                                        title="{{ $product->product_name }}"
                                        alt="{{ $product->product_name }}" width="500"
                                        height="500" /></a>
                                <meta itemprop="image" content="image" />
                            </div>

                            <ul class="product-gallery">

                                <li><a class="thumbnail"  title="; FHD Laptop"><img
                                            src="{{ asset($product->image_two) }}" title=""
                                            alt="{{ $product->product_name }}" width="100px"
                                            height="150px" /></a></li>
                                <meta itemprop="image" content="image" />
                                <li><a class="thumbnail" 
                                        title="{{ $product->product_name }}"><img
                                            src="{{ asset($product->image_three) }}"
                                            title="{{ $product->product_name }}"
                                            alt="{{ $product->product_name }}" width="100px"
                                            height="150px" /></a></li>
                                <meta itemprop="image" content="" />
                                <li>
                                    <a class="thumbnail" 
                                        title="{{ $product->product_name }}">
                                        <img src="{{ asset($product->image_one) }}"
                                            title="{{ $product->product_name }}"
                                            alt="{{ $product->product_name }}" width="100px"
                                            height="150px" />
                                    </a>

                                </li>
                                <meta itemprop="image" content="image" />

                            </ul>
                            <!-- product banner start -->
                            <div class="product-banner">
                                <img src="image/category.jpg" alt="">
                            </div>
                            <!-- product banner end -->

                        </div>
                    </div>
                    <div class="col-md-7 right" id="product">
                        <div class="pd-summary">
                            <div class="product-short-info">
                                <h1 itemprop="name" class="product-name">{{ $product->product_name }}</h1>
                                <table class="product-info-table">
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Price</td>
                                        <td class="product-info-data product-price">{{ $product->discount_price }}৳</td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Regular Price</td>
                                        <td class="product-info-data product-regular-price">{{ $product->selling_price }}৳
                                        </td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Status</td>
                                        <td class="product-info-data product-status">In Stock</td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Product Code</td>
                                        <td class="product-info-data product-code">{{ $product->product_code }}</td>
                                    </tr>
                                    <tr class="product-info-group" itemprop="brand" itemtype="http://schema.org/Thing"
                                        itemscope>
                                        <td class="product-info-label">Brand</td>
                                        <td class="product-info-data product-brand" itemprop="name">
                                            {{ $product->brand_name }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="short-description" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <link itemprop="itemCondition" href="http://schema.org/NewCondition">
                                <meta itemprop="priceCurrency" content="BDT" />
                                <meta itemprop="price" content="51400.0000" />
                                <h2>Key Features</h2>
                                <p>
                                    {!! $product->product_details !!}
                                </p>

                            </div>

                            <div class="product-price-options">

                                <span class="price">
                                    {{-- <h2 class="price-old">61,629৳</h2> --}}

                                    <h2 class="price-old">{!! $product->discount_price ? $product->discount_price : '' !!}</h2>

                                </span>
                                <span class="price">
                                    <h2 class="price-new"> {!! $product->discount_price ? $product->selling_price : $product->selling_price !!}</h2>
                                    {{-- <h2 class="price-new"> 51,400৳</h2> --}}

                                </span>

                            </div>
                            <form action="{{ url('cart/product/add/'.$product->id)}}" method="post">    
                                @csrf     
                                   
                             <input type="hidden" name="action" value="add_to_cart">
                            <div class="cart-option">
                                <label class="quantity">
                                    <span class="ctl" id="decrement"><i class="material-icons" >-</i></span>
                                    <span class="qty"><input type="text" name="qty" id="input-quantity"
                                            value="1" size="2"></span>
                                    <span class="ctl increment" id="increment"><i  class="material-icons">+</i></span>
                                    <input type="hidden" name="product_id" value="30322" />
                                </label>
                           
                                <div class="cart-buy-btn" style="padding: 20px 0px;">
                                    <a data-id="{{ $product->id}}"  value="add_to_cart" class="btn submit-btn addcart" 
                                        style="margin-right: 5px; float: left; margin-bottom: 5px; background-color: crimson; border: none;">Add
                                        To Cart</a>
                                    <a href="{{route('user.checkout')}}" data-id="{{$product->id}}"  class="btn submit-btn buynow" id="" style="  float: left; ">Buy
                                        Now</a>
                                </div>
                            </form>

                            </div>


                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- similar product start -->
        @php
        $id=$product->id;
        $combo = DB::table('combos')->where('product_id',$id)->get();
    @endphp

        <div class="container">

            <div class="combopackage">
                <div class="row">

                    <div class="col-md-5">
                        <div class="container ">
                            <div class="row desclaimer">
                                <div class="col-md-12 m-tb-15">
                                    <div class="owl-carousel">
                                        <div class="payment-desclaimer">
                                            <div class="payment-content-one">
                                                <h4>Price Change Declaimer </h4>
                                                <li class="nav-item">
                                                    <a href="">
                                                        <i class="fa-solid fa-dollar-sign"></i>
                                                    </a>
                                                    Flow Tech BD can change The price of any product at any moment due to
                                                    the volatile price of the technology product
                                                </li>
                                            </div>

                                        </div>
                                        <div class="payment-desclaimer">

                                            <div class="payment-content">

                                                <div class="payment-content-one">
                                                    <h4>Payment Options</h4>
                                                    <li class="">
                                                        <a href="">
                                                            <i class="fa-regular fa-credit-card"></i>
                                                        </a>
                                                        Visa & Master Card, Mobile Banking (5 banks)
                                                    </li>

                                                    <li class="">
                                                        Internet Banking (10 banks),
                                                        Installment EMI (22 banks),
                                                        Cash Payment

                                                    </li>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="payment-desclaimer">
                                            <div class="payment-content-one">
                                                <h4>Product Image Declaimer</h4>
                                                <li class="nav-item">
                                                    <a href="">
                                                        <i class="fa-regular fa-images"></i>
                                                    </a>
                                                    <span>Product Image For Illustration Purposes Only. Actual Product May
                                                        Vary In Size, Color, And Layout. No Claim Will Be Accepted For Image
                                                        Mismatch</span>


                                                </li>


                                            </div>

                                        </div>
                                        <div class="payment-desclaimer">
                                            <div class="payment-content-one">
                                                <h4>Product Information Declaimer</h4>
                                                <li class="nav-item">
                                                    <a href="">
                                                        <i class="fa-regular fa-images"></i>
                                                    </a>
                                                    <span>
                                                        We cannot guarantee that the information on this page is 100%
                                                        correct. Computer Village BD is not liable for usage outcomes.
                                                    </span>


                                                </li>


                                            </div>

                                        </div>




                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    @if ($combo)
                    <div class="col-md-6 ">

                        <div class="container">
                            <h2 class=" txt-center combo-heading"> Bought Together With Combo</h2>
                            <div class="row combo">
                                @foreach ($combo as $combo )
                                <div class="col-md-4 col-sm-12">
                                    <div class=" product-item">
                                        <form action="{{ url('cart/combo/add/'.$combo->id)}}" method="post">    
                                            @csrf
                                            <input type="hidden" name="action" value="add_to_cart">
                                        <div class="">
                                            <div class="">
                                                <img src="{{ asset($combo->image_one) }}"
                                                        alt="{{$combo->first_product_name}}" width="128"
                                                        height="128">
                                            </div>
                                            <div class="">
                                                <h4 class="p-item-name">
                                                    <a href="">
                                                         {{$combo->first_product_name}}
                                                    </a>

                                                </h4>
                                                <div class="p-item-price">
                                                    <span>{{$combo->first_selling_price}}৳</span>
                                                    <span class="price-old">{{$combo->first_discount_price}}৳</span>
                                                </div>

                                                <div class="actions">
                                                    <button type="submit" class="btn  " id="button-cart"
                                                        style=" margin: 4px 5px; background-color: crimson; border: none;">Add
                                                        To Cart</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                {{-- <div class="col-md-4 col-sm-12">
                                    <div class=" product-item">
                                        <div class="">
                                            <div class="">
                                                <img src="{{ asset($product->image_two) }}"
                                                        alt="{{$combo->second_product_name}}" width="128"
                                                        height="128">
                                            </div>
                                            <div class="">
                                                <h4 class="p-item-name">
                                                    <a href="">
                                                        {{$combo->second_product_name}}
                                                    </a>

                                                </h4>
                                                <div class="p-item-price">
                                                    <span>{{$combo->second_discount_price}}৳</span>
                                                    <span class="price-old">{{$combo->second_selling_price}}৳</span>
                                                </div>
                                                <div class="actions">
                                                    <a href="" class="btn  " id="button-cart"
                                                        style=" margin: 4px 5px; background-color: crimson; border: none;">Add
                                                        To Cart</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class=" product-item">
                                        <div class="">
                                            <div class="">
                                                <img src="{{ asset($product->image_three) }}"
                                                        alt="{{$combo->second_product_name}}" width="128"
                                                        height="128">
                                            </div>
                                            <div class="">
                                                <h4 class="p-item-name">
                                                    <a href="">
                                                        {{$combo->second_product_name}}
                                                    </a>

                                                </h4>
                                                <div class="p-item-price">
                                                    <span>{{$combo->thrid_discount_price}}৳</span>
                                                    <span class="price-old">{{$combo->thrid_selling_price}}৳</span>
                                                </div>
                                                <div class="actions">
                                                    <a href="" class="btn  " id="button-cart"
                                                        style=" margin: 4px 5px; background-color: crimson; border: none;">Add
                                                        To Cart</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>

                    </div>
                    @endif








                </div>
            </div>

        </div>
        <!-- similar product end -->




        <div class="pd-full">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <section class="latest-price bg-white m-tb-15" id="latest-price">
                            <div class="section-head">
                                <h2>What is the price of <span>{{$product->product_name}}</span> in
                                    Bangladesh?</h2>
                            </div>
                            <p>{!!$product->what_is_the!!}</p>
                        </section>


                    </div>
                </div>
            </div>
        </div>

        <div class="pd-full description-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="navs description-nav">
                            <ul class="nav has-child c-1">
                                <li data-area="specification">Specification</li>
                                <li data-area="description" id="">Description</li>
                                <li data-area="video-section">Video</li>
                                <li class="hidden-xs" data-area="ask-question">Questions </li>
                                <li data-area="write-review">Reviews</li>

                            </ul>

                        </div>

                        <section class="specification-tab m-tb-10" id="specification">
                            <div class="section-head">
                                <h2>Specification</h2>
                            </div>
                             <div>
                                {!!$product->specification!!}
                             </div>

                        </section>
                        <section class="description bg-white m-tb-15" id="description">
                            <div class="section-head">
                                <h2>Description</h2>
                            </div>
                            <div class="full-description" itemprop="description">
                                <h2 style="">{{$product->product_name}}</h2>
                                <p style="">{!!$product->long_description!!}</p>
                            </div>
                        </section>
                        <section class="videos bg-white m-tb-15" id="video-section">
                            <div class="section-head">

                                <h2 class="title-n-action"> Product Video</h2>

                            </div>
                            {{-- <div class="video" itemprop="video">
                                <video width="920" height="240" controls>
                                    <source src="{{ $product->video_link }}" type="video/mp4">

                                </video>
                            </div> --}}

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$product->video_link
                                }}" allowfullscreen></iframe>
                            </div>


                        </section>
                        <section class="ask-question q-n-r-section bg-white m-tb-15" id="ask-question">
                            <div class="section-head">
                                <div class="title-n-action">
                                    <h2>Questions (0)</h2>
                                    <p class="section-blurb">Have question about this product? Get specific details about
                                        this product from expert.</p>
                                </div>
                                <div class="q-action">
                                    <a href="" class="btn st-outline">Ask Question</a>
                                </div>
                            </div>
                            <div id="question">
                                <div class="empty-content">
                                    <span class="icon material-icons"></span>
                                    <div class="empty-text">There are no questions asked yet. Be the first one to ask a
                                        question.</div>
                                </div>
                            </div>
                        </section>


                        <section class="review  q-n-r-section bg-white m-tb-15" id="write-review">
                            <div class="section-head">
                                <div class="title-n-action">
                                    <h2>Reviews (0)</h2>
                                    <p class="section-blurb">Get specific details about this product from customers who own
                                        it.</p>
                                    <div class="average-rating">
                                    </div>
                                </div>
                                <div class="q-action">
                                    <a href="" class="btn st-outline">Write a Review</a>
                                </div>
                            </div>
                            <div id="review">
                                <div class="empty-content">
                                    <span class="icon material-icons"></span>
                                    <div class="empty-text">This product has no reviews yet. Be the first one to write a
                                        review.</div>
                                </div>
                            </div>
                        </section>
                        <section class="download bg-white m-tb-15" id="download">
                            <div class="section-head">
                                <h2>Download</h2>
                                <ul class="navbar-nav">
                                    <li class="nav-item has-child c-1">
                                        <a class="nav-link" href="">Catalouge</a>
                                    </li>
                                    <li class="nav-item has-child c-1">
                                        <a class="nav-link" href="">Drivers</a>
                                    </li>
                                    <li class="nav-item has-child c-1">
                                        <a class="nav-link" href="">Firmware</a>
                                    </li>
                                    <li class="nav-item has-child c-1">
                                        <a class="nav-link" href="">Manual</a>
                                    </li>

                                </ul>
                            </div>



                        </section>

                    </div>
                    @php 
                    $cat_id = $product->category_id;
                    $relatedProduct = App\Models\Product::where('category_id',$cat_id)->orderBy('id','DESC')->get();
                   @endphp
                    <!-- related product list section start -->
                    <div class="col-lg-3 col-md-12 c-left" style="margin-top: 54px;">
                        <section class="related-product-list">
                            <h3>Related Product</h3>
                            @foreach ($relatedProduct as $relProduct )
                            <div class="p-s-item m-t-30">
                                <div class="image-holder">
                                    <a href="{{url('product/details/'.$relProduct->id.'/'.$relProduct->product_name)}}"><img src="{{asset($relProduct->image_one)}}"
                                            alt="Acer Extensa 15 EX215-54-37AH Core i3 11th Gen 15.6&quot; FHD Laptop"
                                            width="80" height="80"></a>
                                </div>
                                <div class="caption">
                                    <h4 class="product-name">
                                        <a href="{{url('product/details/'.$relProduct->id.'/'.$relProduct->product_name)}}">{{$relProduct->product_name}}</a>
                                    </h4>
                                    <div class="p-item-price price">
                                        <span>{{$relProduct->selling_price}}৳</span>
                                    </div>
                                    <div class="actions">
                                        <span class="btn-compare" onclick=""><i class="material-icons"></i></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                        </section>

                    </div>

                    <!-- related product list section end -->

                </div>
            </div>
        </div>
    </div>
    <!-- product details end -->
    @if(Session::has('warning'))
    <script>
        toastr.warning("{{ session("warning") }}");
    </script>
    @endif
    
    @if(Session::has('success'))
    <script>
        toastr.success("{{ session("success") }}");
    </script>
    @endif
    
    @if(Session::has('error'))
    <script>
        toastr.error("{{ session("error") }}");
    </script>
    @endif
    <script>
        $("#decrement").click(function() {
            var valueget = $('#input-quantity').val();
            var result =valueget-1;
             if(result<1){
                alert('Must be quantity is 1 ');
             }
             else{
                $('#input-quantity').val(result);
             }
            // alert(result);
        });
        $("#increment").click(function() {
            var valueget = $('#input-quantity').val();
            valueget++;
                $('#input-quantity').val(valueget);
      
            // alert(result);
        });
    </script>
    
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
 
@endsection
