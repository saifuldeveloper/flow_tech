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
        $slider = DB::table('indexsliders')->get();
        $sitesliderone =DB::table('homesitesliders')->first();
    @endphp
    <div class="bg-gray content p-tb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="home-slider">
                        @foreach ($slider as  $sliders )
                        <div class="slide">
                            <a href="">
                                <img src="{{ asset($sliders->slider_img)}}" alt="Outlet Notice"
                                    class="img-responsive" width="982" height="500" />
                            </a>
                        </div>
                        @endforeach
                       
                        {{-- <div class="slide">
                            <a href="">
                                <img
                                    src="image/express-delivery-girl-receiving-parcel-home-banner-982x500.webp"
                                    alt="bkash-durga-puja-cashback" class="img-responsive" width="982"
                                    height="500" />
                                </a>
                        </div>
                        <div class="slide">
                            <a href="">
                                <img src="image/uttara-sonarga-outlet-notice-home-banner-982x500.png"
                                    alt="express delivery" class="img-responsive" width="982" height="500" />
                                </a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="sidebar-banner">
                        <div class="ads loaded">
                            <a href="">
                                <img src="{{ asset($sitesliderone->slider_img) }}"
                                    alt="home |Budget Desktop PC" width="300" height="100%">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- slider section end -->

        <div class="container">
            <div class="sliding_text_wrap">

                @php
                $indexsites = DB::table('homesitesliders')->first();
            @endphp


                 <marquee direction="left">{{ $indexsites->marquee}}</marquee>
            </div>
            <div class="container">
                <!-- category start -->
                @php
                $category = DB::table('categories')->get();
                @endphp
                <div class="m-home m-cat">

                    <h2 class="m-header">Featured Category</h2>
                    <p class="m-blurb">Get Your Desired Product from Featured Category!</p>
                    <div class="cat-items-wrap">
                        @foreach ($category as $category)
                        <div class="cat-item">
                            <a href="{{url('allcategory/'.$category->id)}}" class="cat-item-inner">
                                <span class="cat-icon"><img src="{{ asset($category->category_img) }}" alt="Drone" width="48"
                                        height="48"></span>
                                <p>{{$category->category_name}}</p>
                            </a>
                        </div>
                        @endforeach
                       
                        {{-- <div class="cat-item">
                            <a href="category.html" class="cat-item-inner">
                                <span class="cat-icon"><img src="image/drone.png" alt="Drone" width="48"
                                        height="48"></span>
                                <p>Drone</p>
                            </a>
                        </div>
                        <div class="cat-item">
                            <a href="category.html" class="cat-item-inner">
                                <span class="cat-icon"><img src="image/drone.png" alt="Drone" width="48"
                                        height="48"></span>
                                <p>Drone</p>
                            </a>
                        </div>
                        <div class="cat-item">
                            <a href="category.html" class="cat-item-inner">
                                <span class="cat-icon"><img src="image/drone.png" alt="Drone" width="48"
                                        height="48"></span>
                                <p>Drone</p>
                            </a>
                        </div>
                        <div class="cat-item">
                            <a href="category.html" class="cat-item-inner">
                                <span class="cat-icon"><img src="image/drone.png" alt="Drone" width="48"
                                        height="48"></span>
                                <p>Drone</p>
                            </a>
                        </div>
                        <div class="cat-item">
                            <a href="category.html" class="cat-item-inner">
                                <span class="cat-icon"><img src="image/drone.png" alt="Drone" width="48"
                                        height="48"></span>
                                <p>Drone</p>
                            </a>
                        </div>
                        <div class="cat-item">
                            <a href="category.html" class="cat-item-inner">
                                <span class="cat-icon"><img src="image/drone.png" alt="Drone" width="48"
                                        height="48"></span>
                                <p>Drone</p>
                            </a>
                        </div>
                        <div class="cat-item">
                            <a href="category.html" class="cat-item-inner">
                                <span class="cat-icon"><img src="image/drone.png" alt="Drone" width="48"
                                        height="48"></span>
                                <p>Drone</p>
                            </a>
                        </div> --}}

                    </div>
                </div>
                <!-- category End -->
                @php
                $product = DB::table('products')->where('status',1)->where('trend',1)->get();
                @endphp
                <!-- product start -->
                <div class="m-product m-home" id="module-481">

                    <h2 class="m-header">Fetured Products</h2>
                    <p class="m-blurb">Check &amp; Get Your Desired Product!</p>
                    <div class="p-items-wrap">
                        <!-- product item start -->
                        @foreach ($product as $product )
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="{{url('product/details/'.$product->id.'/'.$product->product_name)}}"><img src="{{ asset($product->image_one) }}"
                                            alt="{{$product->product_name}}" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_name)}}">{{$product->product_name}}</a>
                                    </h4>
                                    <div class="p-item-price">
                                        {{-- <span>{{$product->selling_price}}</span> --}}
                                        <span>{{$product->selling_price}}৳</span>  
                                        <span class="price-old">{{$product->discount_price}}৳</span>  
                                    </div>
                                    <div class="actions">
                                        <a href="" data-id="{{ $product->id}}" class=" addcart btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="{{route('user.checkout')}}" class="btn submit-btn buynow" data-id="{{ $product->id}}" id="button-cart" style="width: 100%;">Buy
                                            Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                     
                        {{-- <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp"
                                            alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>100,000৳</span>
                                        <span class="price-old">61,000৳</span>
                                    </div>
                                    <div class="actions">
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="" class="btn submit-btn " id="button-cart"
                                            style="width: 100%;">Buy Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
  --}}


                        <!-- product item end -->


                    </div>
                </div>


                <!-- product end -->
                @php
                $productbest_sell = DB::table('products')->where('status',1)->where('best_rated',1)->get();
                 $setting = DB::table('settings')->first();
                @endphp
                <!-- product item start -->
                <div class="m-product m-home" id="module-481">
                    <h2 class="m-header">Best Seller Products</h2>
                    <p class="m-blurb">Check &amp; Get Your Desired Product!</p>
                    <div class="p-items-wrap">
                        <!-- product item start -->
                        @foreach ($productbest_sell as $productbest_sell )
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="{{url('product/details/'.$productbest_sell->id.'/'.$productbest_sell->product_name)}}"><img src="{{ asset($product->image_one) }}"
                                            alt="{{$productbest_sell->product_name}}" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="{{url('product/details/'.$productbest_sell->id.'/'.$productbest_sell->product_name)}}">{{$product->product_name}}</a>
                                    </h4>
                                    <div class="p-item-price">
                                        <span>{{$productbest_sell->selling_price}}৳</span>  
                                        <span class="price-old">{{$productbest_sell->discount_price}}৳</span>  
                                    </div>
                                    <div class="actions">
                                        <a href="" data-id="{{ $productbest_sell->id}}" class="addcart btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="{{Route('user.checkout')}}" data-id="{{ $productbest_sell->id}}" class="btn submit-btn buynow" id="button-cart" style="width: 100%;">Buy
                                            Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div>
      <div class="p-item">
          <div class="p-item-inner">
             <div class="p-item-img"><a href="product.html"><img src="image/cmt.webp" alt="DJI Mini 3 Drone Fly More Combo" width="228" height="228"></a></div>
              <div class="p-item-details">
                  <h4 class="p-item-name"> <a href="product.html">DJI Mini 3 Drone Fly More Combo</a></h4>
                                        <div class="p-item-price">
                                            <span>100,000৳</span>  
                                            <span class="price-old">61,000৳</span>                  
                                          </div>
                                        <div class="actions">
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add To Cart</a>
                                            <a href="" class="btn submit-btn " id="button-cart" style="width: 100%;">Buy Now</a>
                                       
                                               
                  </div>
              </div>
          </div>
      </div> --}}

                        <!-- product item end -->


                    </div>
                </div>


                <!-- product item end -->


                <div class="container">
                    <div class="m-home seo-content m-html">
                        <h1>Leading Computer, Laptop & Gaming PC Retail & Online Shop in Bangladesh</h1>
                        <p>{!!$setting->computer_laptop_gameingPc!!}</p>
                        <h1>Best Laptop Shop in Bangladesh</h1>
                        <p>{!!$setting->Best_laptop!!}</p>
                        <h1>Best Desktop PC Shop In Bangladesh</h1>
                        <p>{!!$setting->Best_desktop!!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- top reated product section end -->

    </div>
    <!-- product end -->
    
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
     // buy now

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
