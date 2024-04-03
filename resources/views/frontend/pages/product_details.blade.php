@extends('fontend_master')
{{-- @dd($product); --}}
@section('meta_title'){{ $product->meta_title }}@stop
@section('meta_description'){{ $product->meta_description }}@stop
@section('meta_keywords'){{ $product->keyword }}@stop
@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $product->meta_title }}">
    <meta itemprop="description" content="{{ $product->meta_description }}">
    <meta name="keywords" content="{{ $product->meta_tag }}"/>
    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $product->meta_title }}" />
    <meta property="og:description" content="{{ $product->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            line-height: 1.5;
        }

        .card-wrapper {
            max-width: 1100px;
            margin: 0 auto;
        }

        img {
            width: 100%;
            display: block;
        }

        .img-display {
            overflow: hidden;
        }

        .img-showcase {
            display: flex;
            width: 100%;
            transition: all 0.5s ease;
        }

        .img-showcase img {
            min-width: 100%;
        }

        .img-select {
            display: flex;
        }

        .img-item {
            margin: 0.3rem;
        }

        .img-item:nth-child(1),
        .img-item:nth-child(2),
        .img-item:nth-child(3) {
            margin-right: 0;
        }

        .img-item:hover {
            opacity: 0.8;
        }

        .product-content {
            padding: 2rem 1rem;
        }

        .product-title {
            font-size: 3rem;
            text-transform: capitalize;
            font-weight: 700;
            position: relative;
            color: #12263a;
            margin: 1rem 0;
        }

        .product-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            width: 80px;
            background: #12263a;
        }

        .product-link {
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 0.5rem;
            background: #256eff;
            color: #fff;
            padding: 0 0.3rem;
            transition: all 0.5s ease;
        }

        .product-link:hover {
            opacity: 0.9;
        }

        .product-rating {
            color: #ffc107;
        }

        .product-rating span {
            font-weight: 600;
            color: #252525;
        }

        .product-price {
            margin: 1rem 0;
            font-size: 1rem;
            font-weight: 700;
        }

        .product-price span {
            font-weight: 400;
        }

        .last-price span {
            color: #f64749;
            text-decoration: line-through;
        }

        .new-price span {
            color: #256eff;
        }

        .product-detail h2 {
            text-transform: capitalize;
            color: #12263a;
            padding-bottom: 0.6rem;
        }

        .product-detail p {
            font-size: 0.9rem;
            padding: 0.3rem;
            opacity: 0.8;
        }

        .product-detail ul {
            margin: 1rem 0;
            font-size: 0.9rem;
        }

        .product-detail ul li {
            margin: 0;
            list-style: none;
            background: url(https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/checked.png) left center no-repeat;
            background-size: 18px;
            padding-left: 1.7rem;
            margin: 0.4rem 0;
            font-weight: 600;
            opacity: 0.9;
        }

        .product-detail ul li span {
            font-weight: 400;
        }

        .purchase-info {
            margin: 1.5rem 0;
        }

        .purchase-info input,
        .purchase-info .btn {
            border: 1.5px solid #ddd;
            border-radius: 25px;
            text-align: center;
            padding: 0.45rem 0.8rem;
            outline: 0;
            margin-right: 0.2rem;
            margin-bottom: 1rem;
        }

        .purchase-info input {
            width: 60px;
        }

        .purchase-info .btn {
            cursor: pointer;
            color: #fff;
        }

        .purchase-info .btn:first-of-type {
            background: #256eff;
        }

        .purchase-info .btn:last-of-type {
            background: #f64749;
        }

        .purchase-info .btn:hover {
            opacity: 0.9;
        }

        .social-links {
            display: flex;
            align-items: center;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            color: #000;
            border: 1px solid #000;
            margin: 0 0.2rem;
            border-radius: 50%;
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.5s ease;
        }

        .social-links a:hover {
            background: #000;
            border-color: transparent;
            color: #fff;
        }

        @media screen and (min-width: 992px) {
            .card {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 1.5rem;
            }

            .card-wrapper {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .product-imgs {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .product-content {
                padding-top: 0;
            }
        }
    </style>
    <!-- product details start -->
    <div class="product-details content" itemscope itemtype="">
        <meta itemprop="sku" content="30322">
        <div class="product-details-summary">
            <div class="container">
                <div class="pd-q-actions">
                    <div class="share-on">
                        @php
                            $currentUrl = url()->current();

                        @endphp
                        <span class="share">Share:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $currentUrl }}&display=popup"><span class="icon-sprite share-ico fb-dark" data-type="facebook"></span></a>
                        <a href="https://www.pinterest.com/pin/create/button/?url={{ $currentUrl }}&media=SourceImageUrl&display=popup"><span class="icon-sprite share-ico pinterest-dark" data-type="pinterest"></span></a>

                        {{-- <span class="icon-sprite share-ico fb-dark" data-type="facebook"></span>
                        <span class="icon-sprite share-ico pinterest-dark" data-type="pinterest"></span> --}}
                    </div>
                </div>
                <div class="basic row">
                    <div class="col-md-5 left">
                        @php
                            $product_images = [];

                            if ($product) {
                                // $product_images = [$product->image_one, $product->image_two, $product->image_three, $product->image_four, $product->image_five, $product->image_six];
                                $product_images = array(
                                    array('image' => $product->image_one, 'tag' => $product->image_one_tag),
                                    array('image' => $product->image_two, 'tag' => $product->image_two_tag),
                                    array('image' => $product->image_three, 'tag' => $product->image_three_tag),
                                    array('image' => $product->image_four, 'tag' => $product->image_four_tag),
                                    array('image' => $product->image_five, 'tag' => $product->image_five_tag),
                                    array('image' => $product->image_six, 'tag' => $product->image_six_tag),
                                );
                                $product_images = array_filter($product_images, fn($value) => $value !== null);
                            }
                        @endphp
                        {{-- @foreach ($product_images as $item)
                        <img src = "{{ asset($item[image_one]) }}" alt = "{{$item[image_one_tag]}}">
                    @endforeach --}}

                        {{-- @php
                            $product_images = [$product->image_one, $product->image_two, $product->image_three, $product->image_four, $product->image_five, $product->image_six];
                            $product_images = array_filter($product_images, fn($value) => $value !== null);
                        @endphp --}}
                        <div class = "product-imgs">
                            <div class = "img-display">
                                <div class = "img-showcase">
                                    @foreach ($product_images as $item)
                                        {{-- <img src = "{{ asset($item) }}" alt = "shoe image"> --}}
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['tag'] }}">
                                    @endforeach

                                </div>
                            </div>
                            <div class = "img-select">
                                @foreach ($product_images as $key => $image)
                                    <div class="img-item">
                                        <a href="#" data-id="{{ $key + 1 }}">
                                            {{-- <img src="{{ asset($image) }}" alt="shoe image"> --}}
                                        <img src="{{ asset($image['image']) }}" alt="{{ $image['tag'] }}">

                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="product-banner">
                            @if (isset($product->product_banner))
                                {{-- {!! $category->category_banner_text !!} --}}
                                <img src="{{ asset($product->product_banner) }}" alt="{{$product->product_banner_tag}}">
                            @else
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7 right" id="product">
                        <div class="pd-summary">
                            <div class="product-short-info">
                                @if (isset($product->product_name))
                                    <h1 itemprop="name" class="product-name">{{ $product->product_name }}</h1>
                                @else
                                @endif

                                <table class="product-info-table">
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Price</td>
                                        @if (isset($product->discount_price))
                                            <td class="product-info-data product-price">
                                                {{ $product->selling_price - $product->discount_price }}৳</td>
                                        @else
                                        @endif
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Regular selling_price</td>
                                        @if (isset($product->discount_price))
                                            <td class="product-info-data product-regular-price">{{ $product->selling_price }}৳
                                        @else
                                        @endif
                                        </td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Status</td>
                                        <td class="product-info-data product-status">In Stock</td>
                                    </tr>
                                    <tr class="product-info-group">
                                        <td class="product-info-label">Product Code</td>
                                        @if (isset($product->product_code))

                                        <td class="product-info-data product-code">{{ $product->product_code }}</td>
                                        @else

                                        @endif
                                    </tr>
                                    <tr class="product-info-group" itemprop="brand" itemtype="http://schema.org/Thing"
                                        itemscope>
                                        <td class="product-info-label">Brand</td>
                                        @if (isset($product->brand_name))

                                        <td class="product-info-data product-brand" itemprop="name">{{ $product->brand_name }}</td>
                                        @else

                                        @endif
                                    </tr>
                                </table>
                            </div>
                            <div class="short-description" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <link itemprop="availability" href="http://schema.org/InStock" />
                                <link itemprop="itemCondition" href="http://schema.org/NewCondition">
                                <meta itemprop="priceCurrency" content="BDT" />
                                <meta itemprop="price" content="51400.0000" />
                                <h2>Key Features</h2>
                                @if (isset($product->product_details))

                                        <p>
                                            {!! $product->product_details !!}
                                        </p>
                                        @else

                                        @endif

                                <li class="view-more" data-area="specification">View More Info</li>

                            </div>

                            <div class="product-price-options">

                                <span class="price">
                                    @if (isset($product->selling_price))

                                        <h2 class="price-old">{{ $product->selling_price }}</h2>
                                        @else

                                        @endif
                                    {{-- <h2 class="price-old">61,629৳</h2> --}}
                                </span>
                                <span class="price">
                                    @if (isset($product->discount_price))

                                    <h2 class="price-new">{{ $product->selling_price - $product->discount_price }}</h2>
                                    @else

                                    @endif
                                    {{-- <h2 class="price-new"> {!! $product->discount_price ? $product->selling_price : $product->selling_price !!}</h2> --}}
                                    {{-- <h2 class="price-new"> 51,400৳</h2> --}}
                                </span>
                            </div>
                            @if ($product)

                                <form action="{{ url('cart/product/add/' . $product->product_slug) }}" method="post" id="addToCartForm">
                                    @csrf
                                    <input type="hidden" name="action" value="add_to_cart">
                                    <div class="cart-option">
                                        <label class="quantity">
                                            <span class="ctl" id="decrement"><i class="material-icons">-</i></span>
                                            <span class="qty"><input type="text" name="qty" id="input-quantity"
                                                    value="1" size="2"></span>
                                            <span class="ctl increment" id="increment"><i class="material-icons">+</i></span>
                                            <input type="hidden" name="product_id" value="30322" />
                                        </label>
                                        <div class="cart-buy-btn" style="padding: 20px 0px;">
                                            <a data-id="{{ $product->id }}" value="add_to_cart"
                                                class="btn submit-btn addcart"
                                                style="margin-right: 5px; float: left; margin-bottom: 5px; background-color: crimson; border: none;">Add
                                                To Cart</a>
                                            <a href="#" data-id="{{ $product->id }}" class="btn submit-btn buynow"
                                                id="buynow" style="  float: left; ">Buy
                                                Now</a>
                                        </div>
                                </form>
                            @else
                            @endif

                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- similar product start -->
    {{-- There need a major changee after 437  --}}
    @php
        if ($product) {
            # code...
            $id = $product->id;
            $combo = DB::table('combos')
            ->where('product_id', $id)
                ->get();
        }
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
                {{-- combo --}}
                {{-- @if (isset($product->video_link))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $product->video_link }}"
                                allowfullscreen></iframe>
                        </div>
                        @else
                        @endif --}}


        </div>

    </div>

    </div>
    </div>

    </div>
    <div class="pd-full">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <section class="latest-price bg-white m-tb-15" id="latest-price">
                        <div class="section-head">
                            {{-- <h2>What is the Price</h2> --}}
                            {{-- <h2>What is the price of <span>@if (isset($product->product_name))
                                {{ $product->product_name }}
                            @else
                            @endif</span> in
                                Bangladesh?</h2> --}}
                            {{-- <h2>What is the price of <span>{{ $product->product_name }}</span> in
                                Bangladesh?</h2> --}}
                        </div>
                        @if (isset($product->what_is_the))
                                    <p>{!! $product->what_is_the !!}</p>
                        @else
                        @endif
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
                        @if (isset($product->specification))
                                    <div>
                                        {!! $product->specification !!}
                                    </div>
                        @else
                        @endif
                    </section>
                    <section class="description bg-white m-tb-15" id="description">
                        <div class="section-head">
                            <h2>Description</h2>
                        </div>
                        <div class="full-description" itemprop="description">
                            {{-- @if (isset($product->product_name))
                                <h2 style="">{{ $product->product_name }}</h2>
                            @else
                            @endif --}}

                            @if (isset($product->long_description))

                            <p style="">{!! $product->long_description !!}</p>
                            @else
                            @endif
                        </div>
                    </section>
                    <section class="videos bg-white m-tb-15" id="video-section">
                        <div class="section-head">

                            <h2 class="title-n-action"> Product Video</h2>

                        </div>

                        @if (isset($product->video_link))
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $product->video_link }}"
                                    allowfullscreen></iframe>
                            </div>
                        @else

                        @endif



                    </section>
                    @php
                    if (isset($product->id)){

                        $Id = $product->id;
                        $question = DB::table('user_questions')
                            ->leftJoin('users','user_questions.user_id','users.id')
                            ->where('product_id', $Id)
                            ->get();
                        $review = DB::table('ratings')
                            ->leftJoin('users','ratings.user_id','users.id')
                            ->where('product_id', $Id)
                            ->get();
                            $totalQuestion =  DB::table('user_questions')->where('product_id', $Id)->count();
                            $totalReview =  DB::table('ratings')->where('product_id', $Id)->count();
                    }


                    @endphp
                    <section class="ask-question q-n-r-section bg-white m-tb-15" id="ask-question">
                        <div class="section-head">
                            <div class="title-n-action">

                                @if (isset($totalQuestion))
                                <h2>Questions ({{$totalQuestion}})</h2>
                            @else

                            @endif

                                <p class="section-blurb">Have question about this product? Get specific details about
                                    this product from expert.</p>
                            </div>
                            <div class="q-action">
                                @if (Auth::user())
                                <a href="{{ route('question', ['id' => $product->id]) }}" class="btn st-outline">Ask Question</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn st-outline">Write a Review</a>
                                @endif
                            </div>
                        </div>
                        <div id="question">
                            {{-- question --}}
                            @if (isset($question))


                                @foreach ($question as $row)
                                    <div class="question-wrap">
                                        <p class="author">
                                            <span class="name">{{ $row->name ?? '' }}</span> on {{ isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('d M Y') : '' }}

                                        </p>
                                        <h3 class="question"><span class="hint">Q: </span> {{ $row->question ?? '' }}</h3>
                                        <p class="answer"><span class="hint">A: </span> {!! isset($row->answer) ? $row->answer : '' !!}</p>
                                        <p class="author answerer"><span class="fade">By</span> <span>Flow Tech Support </span> <span class="fade">{{ isset($row->updated_at) ? \Carbon\Carbon::parse($row->updated_at)->format('d M Y') : '' }}</span></p>
                                    </div>

                                @endforeach
                            @else
                            <div class="empty-content">
                                <span class="icon material-icons"></span>
                                <div class="empty-text">There are no questions asked yet. Be the first one to ask a
                                    question.</div>
                            </div>
                            @endif

                        </div>
                    </section>


                    <section class="review  q-n-r-section bg-white m-tb-15" id="write-review">
                        <div class="section-head">
                            <div class="title-n-action">
                                <h2>Reviews ({{$totalReview ?? 0}})</h2>
                                <p class="section-blurb">Get specific details about this product from customers who own
                                    it.</p>
                                <div class="average-rating">
                                </div>
                            </div>
                            <div class="q-action">
                                @if (Auth::user())

                                    <a href="{{ route('review', ['id' => $product->id]) }}" class="btn st-outline">Write a Review</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn st-outline">Write a Review</a>
                                @endif

                            </div>
                        </div>
                        <div id="review">
                            @if (isset($review))


                                @foreach ($review as $key => $row)
                                <div class="review-wrap">
                                    <div class="review-author">
                                      <span class="rating">
                                        @for ($i =1; $i <= $row->ratting; $i++)
                                            ⭐
                                        @endfor
                                      </span>
                                    </div>
                                    <p class="review">
                                      {!! $row->comments !!}
                                    </p>
                                    <p class="author">
                                      By <span class="name">{{ $row->name }}</span> on {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}
                                    </p>
                                </div>
                                @endforeach
                            @else
                            <div class="empty-content">
                                <span class="icon material-icons"></span>
                                <div class="empty-text">This product has no reviews yet. Be the first one to write a
                                    review.</div>
                            </div>
                            @endif



                        </div>
                    </section>
                    <section class="download bg-white m-tb-15" id="download">
                        <div class="section-head">
                            <h2>Download</h2>
                            <ul class="navbar-nav">
                                <li class="nav-item has-child c-1">
                                    {{-- <a class="nav-link" href="{{url('/download',$product->catalouge)}}">Catalouge</a> --}}
                                    <a class="nav-link" href="{{ route('download.file', ['id' => $product->id ?? 0]) }}">Catalouge</a>

                                    {{-- <a class="nav-link" href="{{ url('/download'.'/'.($product->catalouge)) }}">Catalouge</a> --}}
                                    {{-- <a class="nav-link" href="{{ url('/download', urlencode($product->catalouge)) }}">Catalouge</a> --}}

                                </li>
                                <li class="nav-item has-child c-1">
                                    <a class="nav-link" href="{{ route('download.drivefile', ['id' => $product->id ?? 0]) }}">Drivers</a>
                                    {{-- <a class="nav-link" href="{{ url('download/'.($product->drivers)) }}">Drivers</a> --}}
                                </li>
                                <li class="nav-item has-child c-1">
                                    <a class="nav-link" href="{{($product->firmware ?? '')}}">Firmware</a>
                                </li>
                                <li class="nav-item has-child c-1">
                                    <a class="nav-link" href="{{($product->manual ?? '')}}">Manual</a>
                                </li>

                            </ul>
                        </div>



                    </section>

                </div>
                @php
                    $cat_id = $product->category_id ?? null;
                    $relatedProduct = App\Models\Product::where('category_id', $cat_id)
                        ->orderBy('id', 'DESC')
                        ->get();
                @endphp
                <!-- related product list section start -->
                <div class="col-lg-3 col-md-12 c-left" style="margin-top: 54px;">
                    <section class="related-product-list">
                        <h3>Related Product</h3>
                        @foreach ($relatedProduct as $relProduct)
                            <div class="p-s-item m-t-30">
                                <div class="image-holder">
                                    <a href="{{ url('product/' . $relProduct->product_slug) }}"><img
                                            src="{{ asset($relProduct->image_one) }}"
                                            alt="Acer Extensa 15 EX215-54-37AH Core i3 11th Gen 15.6&quot; FHD Laptop"
                                            width="80" height="80"></a>
                                </div>
                                <div class="caption">
                                    <h4 class="product-name">
                                        <a
                                            href="{{ url('product/' . $relProduct->product_slug) }}">{{ $relProduct->product_name }}</a>
                                    </h4>
                                    <div class="p-item-price price">
                                        <span>{{ $relProduct->selling_price - $relProduct->discount_price }}৳</span>
                                    </div>
                                    <div class="actions">
                                        <span class="btn-compare" onclick=""><i class="material-icons"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </section>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- product details end -->
    @section('metaschema')
    <meta name="schema-markup" content="{{  $product->schema_markup }}"/>
    @endsection
    @if (Session::has('warning'))
        <script>
            toastr.warning("{{ session('warning') }}");
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
    <script>
        $("#decrement").click(function() {
            var valueget = $('#input-quantity').val();
            var result = valueget - 1;
            if (result < 1) {
                alert('Must be quantity is 1 ');
            } else {
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
        $(document).ready(function() {
            $('.addcart').on('click', function() {
                event.preventDefault();
                var id = $(this).data('id');
                var quantity = $('#input-quantity').val();
                if (id) {
                    $.ajax({
                        url: " {{ url('/add/to/cart/') }}/" + id,
                        type: "GET",
                        data: {
                            quantity: quantity
                        },
                        datType: "json",
                        success: function(data) {
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

                            const responseData = JSON.parse(data);
                            let totalCart = responseData.totalCart;
                            $(".totalCartDisplay").text(totalCart);

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }
                        },
                    });
                } else {
                    alert('danger');
                }
            });



            $('.buynow').on('click', function(event) {
                event.preventDefault();
                const id = $(this).data('id');
                var quantity = $('#input-quantity').val();


                if (id) {
                    $.ajax({
                        url: "{{ route('user.checkout') }}",
                        type: 'GET',
                        data: {
                            id: id,
                            quantity: quantity
                        },
                        dataType: 'json',
                        success: function(data) {
                            window.location.href = data.url;
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', xhr.responseText);
                        }
                    });
                } else {
                    console.error('Invalid ID');
                }
            });




        });
    </script>

    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;
        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }
        window.addEventListener('resize', slideImage);
    </script>

@endsection
