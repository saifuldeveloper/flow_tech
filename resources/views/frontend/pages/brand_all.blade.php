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
    @endphp
    <!-- category banner start -->
    <section class="">
        {{-- <div class="container c-intro">
            <ul class="breadcrumb" itemscope itemtype="">
                <li><a href="{{ url('/') }}"><i class="fa fa-home" title="Home"></i></a></li>
                <li itemprop="itemListElement" itemscope itemtype=""><a itemtype="" itemprop="item"
                        href=""><span itemprop="name">Brands</span></a>
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

        </div> --}}

    </section>

    <section class="after-header p-tb-10">
        <div class="container c-intro">
            <ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <h1>All Brands</h1>
            </ul>
            <div class="child-list">
                @foreach ($brands as $item)
                    <a href="{{ route('brand', $item->brand_name) }}">{{ $item->brand_name }}</a>
                @endforeach

            </div>
        </div>
    </section>

    <!-- category banner end -->


    <section class=" p-item-page bg-bt-gray p-tb-15">
        <div class="container">
            <div class="row">
                <div id="content" class="col-xs-12 col-md-12 col-lg-12 product-listing">
                    <div class="top-bar ws-box">
                        <div class="row">
                            <div class="col-sm-4 col-xs-2 actions">
                                <label class="page-heading m-hide">All Brands</label>
                            </div>
                            <div class="col-sm-8 col-xs-10 show-sort">
                            </div>
                        </div>

                    </div>
                    <div class=" p-items-wrap">
                        @foreach ($brands as $item)
                            <div class="p-item">
                                <div class="p-item-inner">
                                    <div class="p-item-img">
                                        <a href="{{ route('brand', $item->brand_name) }}">
                                            <img src="{{ asset($item->brand_logo) }}" alt="{{ $item->brand_name }}"
                                                width="228" height="228">
                                        </a>
                                    </div>
                                    <div class="p-item-details">
                                        <h4 class="p-item-name"> <a
                                                href="{{ route('brand', $item->brand_name) }}">{{ $item->brand_name }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 ">
                        <div class="d-flex justify-content-center">
                            {!! $brands->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                    <div class="col-md-4 rs-none text-right">
                        <p>Showing {{ $brands->firstItem() }} to {{ $brands->lastItem() }} of
                            {{ $brands->total() }} ({{ $brands->lastPage() }} Pages)</p>
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
@endsection
