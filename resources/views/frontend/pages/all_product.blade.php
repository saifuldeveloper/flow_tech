@extends('fontend_master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        #loader {
            display: none;
        }
    </style>

    @php
        $slider = DB::table('sliders')->first();
    @endphp
    <section class="">
        <div class="container c-intro">
            <ul class="breadcrumb" itemscope itemtype="">
                <li><a href="index.html"><i class="fa fa-home" title="Home">home</i></a></li>
                <li itemprop="itemListElement" itemscope itemtype=""><a itemtype="" itemprop="item"
                        href=""><span itemprop="name">All Products</span></a>
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
                <h1>Category list </h1>
                @php
                    $category = DB::table('categories')->get();
                    $productHighRange = DB::table('products')->min('selling_price');
                @endphp
                <div class="child-list">
                    @foreach ($category as $category)
                        {{-- <a href="{{url('category/product/details/'.$category->id)}}">{{$category->category_name}}</a> --}}
                        <a
                            href="{{ route('category.view', ['category_slug' => $category->category_slug]) }}">{{ $category->category_name }}</a>
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
                                    <label class="range-label from"><input type="text" id="min" name="min"
                                            value="0"></label>
                                    <label class="range-label to"><input type="text" id="max" name="max"
                                            value="{{ $productHighRange }}"></label>
                                </div>

                            </form>
                        </div>

                        <div class="filter-group ws-box show" data-group-type="status">
                            <div class="label">
                                <span>Availability</span>
                            </div>
                            <div class="items">

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
                    <!-- product list item start -->
                    <div class=" p-items-wrap" id="productList_p">
                        <!-- product item start -->
                          @foreach ($products as $item)
                            <div class="p-item">
                               @include('frontend.pages.product_item')
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
                            {!! $products->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                    <div class="col-md-4 rs-none text-right">
                        <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                            {{ $products->total() }} ({{ $products->lastPage() }} Pages)</p>
                    </div>
                </div>

            </div>

        </div>


    </section>

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

    {{-- <script>
        function formatSliderValues(value) {
            if (value == null) return 'Any';
            return value;
        }

        var stepSize = 1;
        var maxSliderValue = 5000;
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
            // $.post('{{ route('filter.price') }}', {
            //     "_token": '{{ csrf_token() }}',
            //     min: min,
            //     max: max,
            // }, function(data) {
            //     $('#productList_p').html(data);
            // });

            $.ajax({
                url: '{{ route('filter.price') }}',
                method: "POST",
                type: "HTML",
                data: {
                    min: min,
                    max: max,
                    _token: '{{ csrf_token() }}',
                },
                beforeSend: function() {
                    $("#loader").css("display", "block");
                    $("#productList_p").css("display", "none");
                },
                success: function(data) {
                    $('#productList_p').html(data);
                },

                complete: function() {
                    $("#productList_p").css("display", "block");
                    $("#loader").css("display", "none");
                }
            });


        };
    </script> --}}

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

            $.ajax({
                url: "{{ route('filter.price') }}",
                method:"post",
                type: "HTML",
                data: {
                    min: min,
                    max: max,
                    availability: availability,
                    brand: brand,
                    limitProduct: limitProduct,
                    selectedSortOption: selectedSortOption,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function () {
                    $("#loader").css("display", "block");
                    $("#productList_p").css('opacity', '0')

                },
                success: function (data) {
                    $('#productList_p').html(data);
                },
                complete: function () {
                    $("#loader").css("display", "none");
                    $("#productList_p").css('opacity', '1')
                }
            });

        };
    </script>
@endsection
