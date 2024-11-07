@extends('fontend_master')
@section('meta_title'){{ $category->meta_title }}@stop
@section('meta_description'){{ $category->meta_description }}@stop
@section('meta_keywords'){{ $category->keyword }}@stop

    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

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

            .price-filter input {
                margin-top: 10px;
            }

            #loader {
                display: none;
            }
        </style>
    @endpush

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $category->meta_title }}">
    <meta itemprop="description" content="{{ $category->meta_description }}">
    <meta name="keywords" content="{{ $category->meta_tag }}" />
    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $category->meta_title }}" />
    <meta property="og:description" content="{{ $category->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection

@section('content')

    @php
        $slug = request()->segment(1);
        $category = DB::table('categories')->where('category_slug', $slug)->first();

        $id = $category->id;

        $slider = DB::table('sliders')->first();

        $productMinRange = DB::table('products')->min('selling_price');
        $productHighRange = DB::table('products')->max('selling_price');
    @endphp
    <!-- category banner start -->
    <section class="">
        <div class="container c-intro">
            <ul class="breadcrumb" itemscope itemtype="">
                <li><a href="{{ url('/') }}"><i class="fa fa-home" title="Home"></i></a></li>
                <li itemprop="itemListElement" itemscope itemtype=""><a itemtype="" itemprop="item"
                        href=""><span itemprop="name">{{ $category->category_name }}</span></a>
                    <meta itemprop="position" content="1" />
                </li>
            </ul>
            <div class="child-list">
            </div>


        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="shop-banner">

                        @if (isset($category->category_banner_img))
                            <img src="{{ asset($category->category_banner_img) }}" width="100%" height="200px"
                                alt="">
                        @else
                            Img not available
                        @endif

                    </div>

                </div>
            </div>

        </div>

    </section>

    <section class="after-header p-tb-10">
        <div class="container c-intro">
            <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                @if (isset($category->category_banner_text))
                    {!! $category->category_banner_text !!}
                @else
                    <!-- Handle the case where category_banner_text is null or not set -->
                    {{-- Text not available --}}
                @endif

            </ul>
            <div class="child-list">
                <a href="{{ Route('allcategory') }}">All category</a>
                @foreach ($categoryloop as $category)
                    <a
                        href="{{ url($category->category_slug . '/' . $category->subcategory_slug) }}">{{ $category->subcategory_name }}</a>
                @endforeach

            </div>
        </div>
    </section>

    <!-- category banner end -->


    <section class=" p-item-page bg-bt-gray p-tb-15">
        <!-- category filter start -->

        <div class="container">
            <div class="row">
                <column id="column-left" class="col-sm-3">
                    <span class="lc-close"><i class="material-icons" aria-hidden="true">close</i></span>
                    <div class="filters">
                        <div class="price-filter ws-box">
                            <div class="label">
                                <span>Price Range</span>
                            </div>
                            <div>

                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="pf-wrap">
                                    <div class="mb-2" id="slider-range"></div>
                                    <label class="range-label from"><input type="text" id="min" name="min"
                                            readonly value="0"></label>
                                    <label class="range-label to"><input type="text" id="max" name="max"
                                            readonly value="{{ $productHighRange }}"></label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-group ws-box show" data-group-type="status">
                            <div class="label">
                                <span>Availability</span>
                            </div>
                            <div class="items">
                                <input type="hidden" name="id" value="{{ $id }}">
                                <label class="filter">
                                    <input type="checkbox" name="availability[]" value="In Stock" class="availability" />
                                    <span>In Stock</span>
                                </label>
                                <label class="filter">
                                    <input type="checkbox" name="availability[]" value="Pre Order" class="availability" />
                                    <span>Pre Order</span>
                                </label>
                                <label class="filter">
                                    <input type="checkbox" name="availability[]" value="Up Coming" class="availability" />
                                    <span>Up Coming</span>
                                </label>
                            </div>
                        </div>
                        @php
                            $brand = DB::table('brands')->get();
                        @endphp
                        <div class="filter-group ws-box show" data-group-id="302">
                            <div class="label">
                                <span>Compatible Brand</span>
                            </div>
                            <div class="items">
                                @foreach ($brand as $item)
                                    <label class="filter">
                                        <input type="checkbox" name="brandfilter[]" value="{{ $item->id }}"
                                            class="brandfilter" />
                                        <span>{{ $item->brand_name }}</span>
                                    </label>
                                @endforeach
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
                                <label class="page-heading m-hide">{{ strtoupper($HeadSlug) }}</label>
                            </div>
                            <div class="col-sm-8 col-xs-10 show-sort">
                                <div class="form-group rs-none">
                                    <label>Show:</label>
                                    <div class="custom-select">
                                        <select id="input-limit">
                                            <option value="20" selected="selected">20</option>
                                            <option value="40">40</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sort By:</label>
                                    <div class="custom-select">
                                        <select id="input-sort">
                                            <option value="">Default</option>
                                            <option value="price_asc">Price (Low &gt; High)</option>
                                            <option value="price_desc">Price (High &gt; Low)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="spinner-border" role="status" id="loader">
                        <span class="visually-hidden">Loading...</span>
                    </div>


                    <div id="product_list" class="p-items-wrap">
                        {{-- @include('frontend.pages.filter_products', ['products' => $products]) --}}

                    </div>
                </div>

            </div>
        </div>

        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 ">
                        <div class="d-flex justify-content-center">
                            {{-- {!! $products->links('pagination::bootstrap-4') !!} --}}
                        </div>
                    </div>
                    <div class="col-md-4 rs-none text-right">
                        {{-- <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                            {{ $products->total() }} ({{ $products->lastPage() }} Pages)</p> --}}
                    </div>
                </div>

            </div>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category-description p-15 ws-box">

                        {{-- @if (isset($category) && isset($category->category_footer_text))
                            {!! $category->category_footer_text !!}
                        @endif --}}

                    </div>
                </div>
            </div>
        </div>

    </section>

@section('metaschema')
    <meta name="schema-markup" content="{{ $category->schema_markup }}" />
@endsection

@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script>
    $(document).ready(function() {
        var min = $('#min').val();
        var max = $('#max').val();
        $("#slider-range").slider({
            range: true,
            min: min,
            max: max,
            values: [100, max],
            slide: function(event, ui) {
                $("#min").val(ui.values[0]);
                $("#max").val(ui.values[1]);
            },
            change: function(event, ui) {
                fetch_data();
            }

        });
        $("#min").val($("#slider-range").slider("values", 0));
        $("#max").val($("#slider-range").slider(
            "values", 1));


        // Trigger filter on change
        $('.availability').on('change', function() {
            fetch_data();
        });

        $('.brandfilter').on('change', function() {
            fetch_data();
        });

        $('#input-sort').on('change', function() {
            let sort = $(this).val();

            fetch_data(sort);

        });

        $('#input-limit').on('change', function() {
            let limit = $(this).val();

            fetch_data(sort = '', limit);
        });


        // fetch data
        function fetch_data(sort = "", limit) {

            let priceRange = $("#slider-range").slider("values");
            let availabilities = [];
            let brands = [];
            $('.availability').each(function() {
                if ($(this).is(":checked")) {
                    availabilities.push($(this).val());
                }
            });

            $('.brandfilter').each(function() {
                if ($(this).is(":checked")) {
                    brands.push($(this).val());
                }
            });

            $.ajax({
                url: "{{ url('category/product/' . $category->category_slug) }}",
                method: "get",
                data: {
                    limit_item: limit,
                    sortPrice: sort,
                    min: priceRange[0],
                    max: priceRange[1],
                    availabilities: availabilities,
                    brands: brands
                },
                dataType: "json",

                beforeSend: function() {
                    $('#loader').show();
                    $('#product_list').hide();
                },
                success: function(data) {

                    let row = "";

                    if (data.length == 0) {
                        row = `<div class="p-item">
                                        <h4 class="p-item-name text-danger">
                                            No Product Found
                                        </a>
                                    </h4>
                                </div>`;
                    } else {

                        $.each(data, function(key, item) {
                            row += `<div class="p-item">
                                        <div class="p-item-inner">
                                            <div class="p-item-img"><a href="${item.product_slug}"><img
                                                        src="${item.image_one}" alt="${item.product_name}" width="228"
                                                        height="228"></a>
                                            </div>
                                            <div class="p-item-details">
                                                <h4 class="p-item-name"> <a href="">
                                                       ${item.product_name}
                                                    </a>
                                                </h4>
                                                <div class="p-item-price">
                                                    <span>${item.selling_price - item.discount_price}৳</span>
                                                    <span class="price-old">${item.selling_price}৳</span>
                                                </div>
                                                <div class="actions action_custom">
                                                    <input type="hidden" name="qty" value="1" id="input-quantity">
                                                    <a href="" data-id="{{ $item->id }}" class="btn submit-btn addcart" id="button-cart"
                                                        style="width: 100%; margin:  0px 10px 5px 0px; background-color: crimson; border: none;">
                                                        Cart</a>
                                                    <a href="{{ route('user.checkout') }}" data-id="${item.id}" class="buynow btn submit-btn "
                                                        id="button-cart" style="width: 100%;">Buy
                                                        Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                        });
                    }


                    $('#product_list').html(row);
                },


                complete: function() {
                    $('#loader').hide();
                    $('#product_list').show();
                }


            });
        }
        fetch_data();
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

                        console.log(data);
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
@endpush
