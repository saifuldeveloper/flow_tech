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
        $sitesliderone = DB::table('homesitesliders')->first();
    @endphp
    <div class="bg-gray content p-tb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="home-slider">
                        @foreach ($slider as $sliders)
                            <div class="slide">
                                <a href="">
                                    <img src="{{ asset($sliders->slider_img) }}" alt="Outlet Notice" class="img-responsive"
                                        width="982" height="500" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="sidebar-banner">
                        <div class="ads loaded">
                            <a href="">
                                <img src="{{ asset($sitesliderone->slider_img) }}" alt="home |Budget Desktop PC"
                                    width="300" height="100%">
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
                <marquee direction="left">{{ $indexsites->marquee }}</marquee>
            </div>
            <div class="container">
                @php
                    $category = DB::table('categories')->get();
                @endphp
                <div class="m-home m-cat">

                    <h2 class="m-header">Featured Category</h2>
                    <p class="m-blurb">Get Your Desired Product from Featured Category!</p>
                    <div class="cat-items-wrap">
                        @foreach ($category as $category)
                            <div class="cat-item">
                                <a href="{{ route('category.view', ['category_slug' => $category->category_slug]) }}"
                                    class="cat-item-inner">
                                    <span class="cat-icon"><img src="{{ asset($category->category_img) }}" alt="Drone"
                                            width="48" height="48"></span>
                                    <p>{{ $category->category_name }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @php
                    $product = DB::table('products')->where('status', 1)->where('trend', 1)->get();
                @endphp
                <!-- product start -->
                <div class="m-product m-home" id="module-481">
                    <h2 class="m-header">Fetured Products</h2>
                    <p class="m-blurb">Check &amp; Get Your Desired Product!</p>
                    <div class="p-items-wrap">
                        <!-- product item start -->
                        @foreach ($product as $item)
                            <div class="p-item">
                                @include('frontend.pages.product_item')
                            </div>
                        @endforeach
                    </div>
                </div>
                @php
                    $productbest_sell = DB::table('products')->where('status', 1)->where('best_rated', 1)->get();
                    $setting = DB::table('settings')->first();
                @endphp
                <div class="m-product m-home" id="module-481">
                    <h2 class="m-header">Best Seller Products</h2>
                    <p class="m-blurb">Check &amp; Get Your Desired Product!</p>
                    <div class="p-items-wrap">
                        @foreach ($productbest_sell as $item)
                            <div class="p-item">
                                @include('frontend.pages.product_item')
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- product item end -->
                <div class="container">
                    <div class="m-home seo-content m-html">
                        <p>{!! @$setting->home_page_text !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- top reated product section end -->
    </div>
    <!-- product end -->
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
@endsection
