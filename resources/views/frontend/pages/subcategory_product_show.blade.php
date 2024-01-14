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

        .price-filter input {
            margin-top: 10px;
        }
    </style>

    @php
        // Assuming the URL is something like http://127.0.0.1:8000/category/product/details/12
        $id = request()->segment(4); // Adjust the segment number based on your URL structure
        $slider = DB::table('sliders')->first();
        $category = DB::table('sub_categories')->get();
        $productHighRange = DB::table('products')->min('selling_price');
    @endphp
    <!-- category banner start -->
    <section class="">
        <div class="container c-intro">
            <ul class="breadcrumb" itemscope itemtype="">
                <li><a href="{{ url('/') }}"><i class="fa fa-home" title="Home"></i></a></li>
                <li itemprop="itemListElement" itemscope itemtype=""><a itemtype="" itemprop="item"
                        href=""><span itemprop="name">Category</span></a>
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
                        <img src="{{ asset($slider->slider_img) }}" width="100%" height="200px" alt="">
                    </div>

                </div>
            </div>

        </div>

    </section>

    <section class="after-header p-tb-10">
        <div class="container c-intro">
            <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <h1>Cateogry Product</h1>
            </ul>
            <div class="child-list">
                <a href="{{ Route('allcategory') }}">All category</a>
                @foreach ($category as $category)
                    <a href="{{ route('subcategory.view', ['subcategory_slug' => $category->subcategory_slug]) }}">{{ $category->subcategory_name }}</a>
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
                            <form action="{{ url('price/filter/category/' . $id) }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="pf-wrap">
                                    <div class="mb-2" id="slider-range"></div>
                                    <label class="range-label from"><input type="text" id="min" name="min"
                                            readonly value="0"></label>
                                    <label class="range-label to"><input type="text" id="max" name="max"
                                            readonly value="{{ $productHighRange }}"></label>
                                </div>
                            </form>
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
                                            <option value="price_asc">Price (Low &gt; High)</option>
                                            <option value="price_desc">Price (High &gt; Low)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- product list item start -->
                    <div class="p-items-wrap" id="productList_p">
                        <!-- product item start -->
                        @foreach ($category_all as $item)
                            <div class="p-item">
                                <div class="p-item-inner">
                                    <div class="p-item-img"><a
                                            href="{{url('product/'.$item->product_slug)}}"><img
                                                src="{{ asset($item->image_one) }}" alt="{{ $item->product_name }}"
                                                width="228" height="228"></a>
                                    </div>
                                    <div class="p-item-details">
                                        <h4 class="p-item-name"> <a
                                                href="{{url('product/'.$item->product_slug)}}">{{ $item->product_name }}</a>
                                        </h4>
                                        <div class="p-item-price">
                                            <span>{{ $item->selling_price - $item->discount_price }}৳</span>
                                            <span class="price-old">{{ $item->selling_price }}৳</span>
                                        </div>
                                        <div class="actions">
                                            <a href="" data-id="{{ $item->id }}"
                                                class="btn submit-btn addcart" id="button-cart"
                                                style="width: 100%; margin:  0px 10px 5px 0px; background-color: crimson; border: none;">Add
                                                To Cart</a>
                                            <a href="{{ route('user.checkout') }}" data-id="{{ $item->id }}"
                                                class="buynow btn submit-btn " id="button-cart" style="width: 100%;">Buy
                                                Now</a>


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
                        <div class="d-flex justify-content-center">
                            {!! $category_all->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                    <div class="col-md-4 rs-none text-right">
                        <p>Showing {{ $category_all->firstItem() }} to {{ $category_all->lastItem() }} of
                            {{ $category_all->total() }} ({{ $category_all->lastPage() }} Pages)</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.addcart').on('click', function() {

                var id = $(this).data('id');
                event.preventDefault();
                // alert(id);

                if (id) {
                    $.ajax({
                        url: " {{ url('/add/to/cart/') }}/" + id,
                        type: "GET",
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
            $('.buynow').on('click', function() {
                var id = $(this).data('id');
                // alert(id);

                if (id) {
                    $.ajax({
                        url: " {{ url('/add/to/cart/') }}/" + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

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

        });
    </script>




    <script>
        function formatSliderValues(value) {
            return value == null ? 'Any' : value;
        }

        var stepSize = 1;
        var maxSliderValue = 50000;
        var values = Array.from({
            length: (maxSliderValue / stepSize) + 1
        }, (_, i) => i * stepSize);

        $("#slider-range").slider({
            range: true,
            max: values.length - 1,
            values: [0, values.length - 1],
            slide: function(event, ui) {
                var min = values[ui.values[0]];
                var max = values[ui.values[1]];

                // Update the displayed values
                $("[name=min]").val(min);
                $("[name=max]").val(max);
                $("#min").val(formatSliderValues(min));
                $("#max").val(formatSliderValues(max));
                updatePrices(min, max);
            }
        });

        // Set initial values for min and max
        var initialMin = values[$("#slider-range").slider("values", 0)];
        var initialMax = values[$("#slider-range").slider("values", 1)];

        $("[name=min]").val(initialMin);
        $("[name=max]").val(initialMax);

        initialMin = parseInt(initialMin);
        initialMax = parseInt(initialMax);
        $("#min").val(formatSliderValues(initialMin));
        $("#max").val(formatSliderValues(initialMax));

        jQuery(document).ready(function($) {
            var availability = [];
            var brand = [];

            function getCheckedValues(selector) {
                return $(selector + ":checked").map(function() {
                    return $(this).val();
                }).get();
            }
            $("#slider-range").slider({
                range: true,
                max: values.length - 1,
                values: [0, values.length - 1],
                slide: function(event, ui) {
                    var min = values[ui.values[0]];
                    var max = values[ui.values[1]];

                    // Update the displayed values
                    $("[name=min]").val(min);
                    $("[name=max]").val(max);
                    $("#min").val(formatSliderValues(min));
                    $("#max").val(formatSliderValues(max));

                    // Collect the selected values dynamically
                    updatePrices(min, max, availability);
                }
            });

            $(".availability").on("click", function() {
                availability = getCheckedValues(".availability");
                var sliderValues = $("#slider-range").slider("values");
                var min = values[sliderValues[0]];
                var max = values[sliderValues[1]];
                updatePrices(min, max, availability);
            });

            $(".brandfilter").on("click", function() {
                var brand = getCheckedValues(".brandfilter");
                var availability = getCheckedValues(".availability");
                var limitProduct = getCheckedValues("#input-limit");
                var sliderValues = $("#slider-range").slider("values");
                var min = values[sliderValues[0]];
                var max = values[sliderValues[1]];

                updatePrices(min, max, availability, brand);
            });

            $("#input-limit").change(function() {
                var limitProduct = $(this).val();
                var selectedSortOption = $("#input-sort").val();
                var sliderValues = $("#slider-range").slider("values");
                var availability = getCheckedValues(".availability");
                var brand = getCheckedValues(".brandfilter");
                var min = values[sliderValues[0]];
                var max = values[sliderValues[1]];
                updatePrices(min, max, availability, brand, limitProduct, selectedSortOption);
            });

            $("#input-sort").change(function() {
                var selectedSortOption = $(this).val();
                var limitProduct = $("#input-limit").val();
                var availability = getCheckedValues(".availability");
                var brand = getCheckedValues(".brandfilter");
                var sliderValues = $("#slider-range").slider("values");
                var min = values[sliderValues[0]];
                var max = values[sliderValues[1]];
                updatePrices(min, max, availability, brand, limitProduct, selectedSortOption);
            });
        });

        function updatePrices(min, max, availability, brand, limitProduct, selectedSortOption) {
            $.post('{{ url('price/filter/category/' . $id) }}', {
                "_token": '{{ csrf_token() }}',
                min: min,
                max: max,
                availability: availability,
                brand: brand,
                limitProduct: limitProduct,
                selectedSortOption: selectedSortOption,
            }, function(data) {
                console.log(data);
                $('#productList_p').html(data);
            });
        };
    </script>
@endsection
