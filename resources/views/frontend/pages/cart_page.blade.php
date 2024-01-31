@extends('fontend_master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- cart-section start -->

    <section class="bg-bt-gray p-tb-15">
        <div class="container">
            <div class="content ws-box p-15">
                <h1 class="title">Shopping Cart </h1>
                {{-- <form action="" method="post" enctype="multipart/form-data"> --}}
                <div class="table-responsive">
                    <table class="table table-bordered cart-table bg-white">
                        <thead>
                            <tr>
                                <td class="text-center rs-none">Image</td>
                                <td class="text-left">Product Name</td>
                                {{-- <td class="text-left rs-none">Model</td> --}}
                                <td class="text-left">Quantity</td>
                                <td class="text-right rs-none">Unit Price</td>
                                <td class="text-right">Total</td>
                            </tr>
                        </thead>
                        @php
                            $total = 0;
                        @endphp
                        <tbody>
                            {{-- @dd($cart) --}}
                            @foreach ($cart as $row)
                                @php
                                    $total += $row->price * $row->qty;
                                @endphp
                                <tr>
                                    <td class="text-center rs-none">
                                        <a href="">
                                            <img src="{{ asset($row->options->image) }}" alt="" title=""
                                                height="100px" width="100px" class="img-thumbnail" /></a>
                                    </td>
                                    <td class="text-left">
                                        <a href="">{{ $row->name }}</a>
                                    </td>
                                    {{-- <td class="text-left rs-none">{{ $row->product_code }}</td> --}}
                                    <form action="{{ route('update.cartitem') }}" method="post">
                                        @csrf
                                        <td class="text-left">
                                            <div class="input-group btn-block" style="max-width: 200px;">


                                                <input type="number" value="{{ $row->qty }}" name="qty"
                                                    size="1" class="form-control" min="1"/>


                                                <span class="input-group-btn">
                                                    <button type="submit" data-toggle="tooltip" title="Update"
                                                        class="btn btn-primary"><i class="fa-solid fa-rotate"></i></button>
                                                    <input type="hidden" name="productid" value="{{ $row->rowId }}">
                                                    </form>
                                                    <a href="{{ url('remove/cart/' . $row->rowId) }}"><span class="btn btn-danger"><i class="fa-solid fa-trash"></i></span>
                                                    </a>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-right rs-none">{{ number_format($row->price) }}৳</td>
                                        <td class="text-right">{{ number_format($row->price * $row->qty) }}৳</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                </form>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered bg-white cart-total">
                            <tr>
                                <td class="text-right"><strong>Sub-Total:</strong></td>

                                <td class="text-right amount">{{ number_format($total) }}৳</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Discount:</strong></td>
                                <td class="text-right amount">
                               @php
                                $coupon = Session::get('coupon');
                                $discount = isset($coupon['discount']) ? number_format($coupon['discount']) : 0;
                                @endphp

                                {{ $discount }}৳ </td>


                            </tr>
                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                 <td class="text-right amount">
                                    @php
                                         $subtotal = isset($coupon['discount']) ? number_format((Cart::Subtotal())-$coupon['discount']) :number_format(Cart::Subtotal());
                                    @endphp
                                    {{$subtotal}} ৳</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h2 class="title">What would you like to do next? </h2>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery
                    cost.</p>
                <div class="page-section ws-box coupon-voucher-cart">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 coupon">
                            <form action="{{ route('apply.coupon')}}" method="POST">
                                @csrf
                            <div class="input-group">
                                <input type="text" name="coupon" value="" placeholder="Promo / Coupon Code"
                                    id="input-coupon" class="form-control" />
                                <span class="input-group-btn">
                                    <input type="submit" value="Apply Coupon" id="button-coupon"
                                        data-loading-text="Loading..." class="btn st-outline" /></span>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>

                <div class="buttons">
                    <div class="pull-right"><a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
                    </div>
                    <div class="pull-right"><a href="{{ Route('user.checkout') }}"
                            class="btn btn-primary checkout-btn">Confirm
                            Order</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->
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
@endsection
