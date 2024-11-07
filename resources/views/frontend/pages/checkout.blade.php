@extends('fontend_master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .ddbl,
        .manual_card_payment,
        .payment_card,
        .accepted-logo {
            display: none;
        }

        .card {
            background: #f5f5f5;
            width: 100%;
        }

        .p_text {
            font-size: 16px;
            font-weight: 600;
            color: #02ac24;
        }
    </style>


    @php
        $cartname = Cart::Content();
        $setting = DB::table('settings')->first();
        $shipments = DB::table('shipments')->first();
        $charge = $setting->shipping_charge;

        $shpping_Charge = 0;
        $coupon = Session::get('coupon');
        $subtotal = isset($coupon['discount']) ? Cart::Subtotal() - $coupon['discount'] : Cart::Subtotal();
        // dd($subtotal);
    @endphp
    <div class="container alert-container">
    </div>
    <section class="checkout bg-bt-gray p-tb-15">
        <div class="container">
            <h1 class="page-title">Checkout</h1>
            <form class="checkout-content" id="checkout-form" action="{{ route('payment.process') }}" method="post">
                @csrf
                <div class="row">
                    @auth
                        <input name="user_id" type="hidden" class="form-control" value="{{ Auth::id() }}">

                    @endauth

                    <div class="col-md-4 col-sm-12">
                        <div class="page-section ws-box">
                            <div class="section-head">
                                <h2><span>1</span>Customer Information</h2>
                            </div>
                            <div class="address">
                                <div class="form-group">
                                    <label class="control-label" for="input-firstname">Name</label>
                                    <input class="form-control" name="name" type="text" id="input-firstname"
                                        value="" placeholder="Input Your Name*" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-telephone">Mobile</label>
                                    <input type="tel" id="input-telephone" name="phone" value=""
                                        class="form-control" placeholder="Telephone*">
                                </div>
                                <div class="form-group" for="input-email">
                                    <label class="control-label">Email</label>
                                    <input type="email" id="input-email" name="email" value=""
                                        class="form-control" placeholder="E-Mail*">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-address">Address</label>
                                    <input type="text" id="input-address" name="address" value=""
                                        class="form-control" placeholder="Address*">
                                </div>
                                <div class="multiple-form-group">
                                    <div class="form-group" for="input-city">
                                        <label class="control-label">City</label>
                                        <input type="text" id="input-city" name="city" value=""
                                            class="form-control" placeholder="City*">
                                    </div>
                                    <div class="form-group" for="input-zone">
                                        <label class="control-label">Division </label>
                                        <select name="zone" id="input-zone" class="form-control">
                                            <option value="Dhaka" selected> Dhaka </option>
                                            <option value="Khulna"> Khulna </option>
                                            <option value="Rajshahi"> Rajshahi </option>
                                            <option value="Rangpur"> Rangpur </option>
                                            <option value="Chittagong">Chittagong </option>
                                            <option value="Borishal">Borishal </option>
                                            <option value="Sylhet"> Sylhet </option>
                                            <option value="Mymensingh"> Mymensingh </option>

                                            {{-- <option value="Others">Others</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-address">Shipping Address</label>
                                    <input type="text" id="input-shipping_address" name="shipping_address" value=""
                                        class="form-control" placeholder="Optional*">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Comment</label>
                                    <textarea class="form-control" name="notes" value="" placeholder="Comment" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12">
                        <div class="row row-payment-delivery-order">
                            <div class="col-md-6 col-sm-12 payment-methods">
                                <div class="page-section ws-box">
                                    <div class="section-head">
                                        <h2><span>2</span>Payment Method</h2>
                                    </div>
                                    <p>Select a payment method</p>
                                    <label class="radio-inline">
                                        <input type="radio" name="payment_method" value=" Cash on Delivery"
                                            checked="checked" />
                                        Cash on Delivery </label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="payment_method" value="pod" />
                                        POS on Delivery </label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="payment_method" value="online" />
                                        Online Payment </label><br>

                                    <div class="accepted-logo">
                                        <h5>We Accept : </h5>

                                        <span>
                                            <label class="radio-inline">
                                                <input type="radio" name="online" value="bkash" checked />
                                                Bkash </label>
                                        </span>

                                        <span> <label class="radio-inline">
                                                <input type="radio" name="online" value="rocket" />
                                                Rocket </label>
                                        </span>
                                        <span>
                                            <label class="radio-inline">
                                                <input type="radio" name="online" value="nagad" />
                                                Nagad </label>
                                        </span>
                                        <span>
                                            <label class="radio-inline">
                                                <input type="radio" name="online" value="manual" />
                                                Manual </label>
                                        </span>

                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12 delivery-methods">
                                <div class="page-section ws-box">
                                    <div class="section-head">
                                        <h2><span>3</span>Delivery Method</h2>
                                    </div>
                                    <p>Select a delivery method</p>
                                    <label class="radio-inline">
                                        <input type="radio" class="delivery" name="shipping_method"
                                            value="Home Delivery" checked="checked" />
                                        Small Parcel(0-3kg) - {{ $shipments->home_delivery }} ৳ </label><br>
                                    <label class="radio-inline">
                                        <input type="radio" class="delivery" name="shipping_method"
                                            value="Store Pickup" />
                                        Medium Parcel(3-10kg) - {{ $shipments->store_pickup }}৳ </label><br>
                                    <input type="hidden" name="pickup.pickup.title" value="Store Pickup">
                                    <label class="radio-inline">
                                        <input type="radio" class="delivery" name="shipping_method"
                                            value="Request Express" />
                                        Large Parcel(10-50kg) - {{ $shipments->request_express }}৳ </label><br>
                                    <input type="hidden" name="express.express.title" value="Request Express">
                                </div>
                            </div>

                            <div class="col-md-6">
                                {{-- input card box show in online --}}
                                <div class="card payment_card">
                                    <div class="card-body">
                                        <p>1.5 % transcation charge applicable</p>
                                        <p class="p_text">You need to send us ৳ <span
                                                class="amount subtotalAmount">{{ $subtotal }}</span></p>
                                        <p>Account Type: <strong>Personal</strong> </p>
                                        <p> <span class="text_content">Bkash</span> Account Number:
                                            <strong>01611482988<span class="ddbl">-4</span> </strong>
                                        </p>

                                        <div style="margin-top:10px;">
                                            <div class="">
                                                <label for="online_account">Your <span class="text_content">Bkash </span>
                                                    Account Number</label>
                                                <input type="number" name="payment_number" class="form-control"
                                                    id="online_account" placeholder="01xxxxxxxxx" style="width: 100%">
                                            </div>

                                            <div style="margin-top:10px;">
                                                <label for="transactionId"> <span class="text_content">Bkash </span>
                                                    Transaction ID</label>
                                                <input type="text" name="transaction_id" class="form-control"
                                                    id="transactionId" placeholder="Transaction ID">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="card manual_card_payment">
                                    <div class="card-body">
                                        <p> পেমেন্ট নিয়ে কোন ইস্যু থাকলে এটি সিলেক্ট করুন, ফোনে কথা বলে পেমেন্ট ফিক্স করা
                                            হবে।</p>
                                    </div>

                                </div>



                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="page-section ws-box voucher-coupon">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="section-head">
                                                <h2><span>4</span>Discount Coupon</h2>
                                            </div>
                                            <div class="form-group" id="coupon">
                                                <label class="control-label" for="input-coupon">Enter your coupon
                                                    here</label>
                                                <div class="input-group">
                                                    <input type="text" name="coupon_code" value=""
                                                        placeholder="Enter your coupon here" id="input-coupon"
                                                        class="form-control">
                                                    <span class="input-group-btn">
                                                        <input type="button" value="Apply Coupon" id="button-coupon"
                                                            data-loading-text="Loading..." class="btn submit-btn">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 details-section-wrap">
                                <div class="page-section ws-box">
                                    <div class="section-head">
                                        <h2><span>5</span>Order Overview</h2>
                                    </div>
                                    <table class="table-bordered bg-white checkout-data">
                                        <thead>
                                            <tr>
                                                <td>Product Name</td>
                                                <td>Price</td>
                                                <td class="text-right">Total</td>
                                            </tr>
                                            @php
                                                $total = 0;
                                            @endphp
                                        </thead>
                                        <tbody>
                                            @foreach ($cartname as $carditem)
                                                <tr>
                                                    <td class="name">
                                                        <a href="">{{ $carditem->name }}</a>
                                                        <div class="options">
                                                        </div>
                                                    </td>
                                                    <td class="price"><span>{{ number_format($carditem->price) }}৳</span>
                                                        <span> x </span> <span>{{ $carditem->qty }}</span>
                                                    </td>
                                                    <td class="price text-right">
                                                        {{ number_format($carditem->qty * $carditem->price) }} </td>
                                                </tr>
                                            @endforeach

                                            <tr class="total">
                                                <td colspan="2" class="text-right"><strong>Sub-Total:</strong></td>
                                                <td class="text-right"><span
                                                        class="amount">{{ number_format(Cart::Subtotal()) }}৳</span></td>
                                            </tr>
                                            @if (Session::has('coupon'))
                                                <input type="hidden" name="coupon_name" class="form-control"
                                                    value="{{ Session::get('coupon')['name'] }}">
                                                <input type="hidden" name="coupon_discount" class="form-control"
                                                    value="{{ Session::get('coupon')['discount'] }}">
                                                <input type="hidden" name="subtotal" class="form-control"
                                                    value="{{ intval(Cart::Subtotal()) }}">
                                            @else
                                                <input type="hidden" name="subtotal" class="form-control"
                                                    value="{{ intval(Cart::Subtotal()) }}">
                                            @endif
                                            @php
                                                $coupon = Session::get('coupon');
                                                $discount = isset($coupon['discount'])
                                                    ? number_format($coupon['discount'])
                                                    : 0;
                                            @endphp
                                            <tr class="total">
                                                <td colspan="2" class="text-right"><strong>Delivery Charge:</strong>
                                                </td>
                                                <td class="text-right"><span class="amount deliveryCharge"></span></td>
                                            </tr>
                                            <tr class="discount">
                                                <td colspan="2" class="text-right"><strong>Discount:</strong></td>
                                                <td class="text-right"><span class="amount">{{ $discount }}৳</span>
                                                </td>
                                            </tr>


                                            <tr class="total">
                                                <td colspan="2" class="text-right"><strong>Total:</strong></td>
                                                <td class="text-right"><span
                                                        class="amount subtotalAmount">{{ $subtotal }}</span></td>
                                                {{-- <td class="text-right"><span class="amount subtotal"></span></td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <input  type="hidden" name="shipping" id="shipping_charge" class="form-control" value="{{ $charge}}">
                <input  type="hidden" name="subtotal" id="SubtotalAmount" class="form-control" value="{{ Cart::Subtotal() }}"> --}}
                <input type="hidden" name="shipping" id="shipping_charge" class="form-control" value="">
                <input type="hidden" name="total" id="SubtotalAmount" class="form-control" value="">
                <div class="checkout-final-action">

                    <div class="agree-text" style="margin-bottom: 10px">I have read and agree to the <a
                            href="{{ Route('condition') }}" target="_blank"><b>Terms and
                                Conditions</b></a>, <a href="{{ Route('policy') }}" target="_blank"><b>Privacy
                                Policy</b></a> and <a href="{{ Route('refundAndReturn') }}" target="_blank"><b>Refund and
                                Return
                                Policy</b></a> <input type="checkbox" name="agree" value="1" checked="checked" />
                    </div>
                    <button id="button-confirm" class="btn submit-btn pull-right" type="submit">Confirm Order</button>
                </div>
            </form>

        </div>
    </section>
    <section class="content-bottom">
        <div class="container">
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

    {{-- js cdn --}}


    <script>
        // checked the checkbox  online
        jQuery(document).ready(function($) {

            $('input[name="payment_method"]').change(function() {
                if ($(this).val() === 'online') {
                    $('.payment_card').show();
                    $('.accepted-logo').show();

                    $('#online_account').attr('required', true);
                    $('#transactionId').attr('required', true);
                } else {

                    $('#online_account').attr('required', false);
                    $('#transactionId').attr('required', false);

                    $('.accepted-logo').hide();
                    $('.payment_card').hide();
                }
            });


            // checked the checkbox  online
            $('input[name="online"]').change(function() {
                $('.payment_card').show();
                $(".manual_card_payment").hide();
                $(".ddbl").hide();

                if ($(this).val() === 'bkash') {
                    $('.text_content').text('Bkash');
                } else if ($(this).val() === 'rocket') {
                    $('.text_content').text('Rocket');
                    $(".ddbl").show();
                } else if ($(this).val() === 'nagad') {
                    $('.text_content').text('Nagad');

                } else if ($(this).val() === 'manual') {

                    $('#online_account').attr('required', false);
                    $('#transactionId').attr('required', false);

                    $('.payment_card').hide();
                    $(".manual_card_payment").show();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('.deliveryCharge').text('{{ $shipments->home_delivery }}' + '৳');
            $('.subtotalAmount').text('{{ number_format($shipments->home_delivery + $subtotal) }}' + '৳');
            $('#shipping_charge').val('{{ $shipments->home_delivery }}');
            $('#SubtotalAmount').val('{{ $shipments->home_delivery + $subtotal }}');
            // Attach a click event handler to the radio buttons with class "delivery"
            $('.delivery').on('click', function() {
                // Get the selected value
                var selectedValue = $(this).val();

                // Update the text content of the element with class "amount" based on the selected value
                if (selectedValue === 'Home Delivery') {
                    $('.deliveryCharge').text('{{ $shipments->home_delivery }}' + '৳');
                    $('.subtotalAmount').text(
                        '{{ number_format($shipments->home_delivery + $subtotal) }}' +
                        '৳');
                    $('#shipping_charge').val('{{ $shipments->home_delivery }}');
                    $('#SubtotalAmount').val('{{ $shipments->home_delivery + $subtotal }}');

                } else if (selectedValue === 'Store Pickup') {
                    $('.deliveryCharge').text('{{ $shipments->store_pickup }}' + '৳');
                    $('.subtotalAmount').text('{{ number_format($shipments->store_pickup + $subtotal) }}' +
                        '৳');
                    $('#shipping_charge').val('{{ $shipments->store_pickup }}');
                    $('#SubtotalAmount').val('{{ $shipments->store_pickup + $subtotal }}');
                } else if (selectedValue === 'Request Express') {
                    $('.deliveryCharge').text('{{ $shipments->request_express }}' + '৳');
                    $('.subtotalAmount').text(
                        '{{ number_format($shipments->request_express + $subtotal) }}' + '৳');
                    $('#shipping_charge').val('{{ $shipments->request_express }}');
                    $('#SubtotalAmount').val('{{ $shipments->request_express + $subtotal }}');
                }
            });
        });
    </script>
@endsection
