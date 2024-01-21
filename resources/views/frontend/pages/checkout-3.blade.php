@extends('fontend_master')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @php
        $cartname = Cart::Content();
        $setting = DB::table('settings')->first();
        $shipments = DB::table('shipments')->first();
        $charge = $setting->shipping_charge;

        $shpping_Charge = 0;
        $coupon = Session::get('coupon');
       $subtotal = isset($coupon['discount']) ? Cart::Subtotal()-$coupon['discount'] :Cart::Subtotal();
    // dd($subtotal);
    @endphp
    <div class="container alert-container">
    </div>
    <section class="checkout bg-bt-gray p-tb-15">
        <div class="container">
            <h1 class="page-title">Checkout</h1>
            <form class="checkout-content" id="checkout-form" action="{{ route('payment.process')}}" method="post">
                    @csrf
                <div class="row">
                    @auth
                    <input name="user_id" type="hidden" class="form-control" value="{{ Illuminate\Support\Facades\Auth::id() }}">
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
                                            value="" placeholder="Input Your Name*"  required>
                                    </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-telephone">Mobile</label>
                                    <input type="tel" id="input-telephone" name="phone" value=""
                                        class="form-control" placeholder="Telephone*" required>
                                </div>
                                <div class="form-group" for="input-email">
                                    <label class="control-label">Email</label>
                                    <input type="email" id="input-email" name="email" value=""
                                        class="form-control" placeholder="E-Mail*">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-address">Address</label>
                                    <input type="text" id="input-address" name="address" value=""
                                        class="form-control" placeholder="Address*" required>
                                </div>
                                <div class="multiple-form-group">
                                    <div class="form-group" for="input-city">
                                        <label class="control-label">City</label>
                                        <input type="text" id="input-city" name="city" value=""
                                            class="form-control" placeholder="City*">
                                    </div>
                                    <div class="form-group" for="input-zone">
                                        <label class="control-label">Zone</label>
                                        <select name="zone" id="input-zone" class="form-control">
                                            <option value="Dhaka" selected> Dhaka City</option>
                                            <option value="Khulna"> Khulna City</option>
                                            <option value="Rajshahi"> Rajshahi City</option>
                                            <option value="Rangpur"> Rangpur City</option>
                                            <option value="Chittagong">Chittagong City</option>
                                            <option value="Gazipur">Gazipur City</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
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
                                    {{-- <label class="radio-inline">
                                        <input type="radio" name="payment" value=" Cash on Delivery"  />
                                        Cash on Delivery </label><br> --}}
                                        <div class="form-check">
                                            <input class="form-check-input" name="payment_method" type="checkbox" value="Cash on Deliver" id="CashonDelivery">
                                            <label class="form-check-label" for="CashonDelivery">
                                                Cash on Delivery
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="payment_method" type="checkbox" value="POS on Delivery" id="POSonDelivery">
                                            <label class="form-check-label" for="POSonDelivery">
                                                POS on Delivery
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="payment_method" type="checkbox" value="Online Payment" id="Online Payment">
                                            <label class="form-check-label" for="Online Payment">
                                                Online Payment
                                            </label>
                                        </div>
                                        {{-- <label class="radio-inline">
                                            <input type="checkbox" name="payment_method" value="Cash on Delivery" />
                                            Cash on Delivery </label><br> --}}
                                    {{-- <label class="radio-inline">
                                        <input type="checkbox" name="payment_method" value="pod" />
                                        POS on Delivery </label><br> --}}
                                    {{-- <label class="radio-inline">
                                        <input type="checkbox" name="payment_method" value="online" />
                                        Online Payment </label><br> --}}
                                    {{-- <div class="accepted-logo">
                                        <h5>We Accept : </h5>
                                        <a href="#"><img class="logo logo-visa"
                                                src="{{asset('assets/fontend/catalog/view/theme/starship/images/payment-methods.png')}}"></a>
                                        <div class="clear"></div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 delivery-methods">
                                <div class="page-section ws-box">
                                    <div class="section-head">
                                        <h2><span>3</span>Delivery Method</h2>
                                    </div>
                                    <p>Select a delivery method</p>
                                    <label class="radio-inline">
                                        <input type="checkbox" class="delivery" name="payment_method" value="Home Delivery" />
                                        Home Delivery - {{$shipments->home_delivery}} ৳ </label><br>
                                    <label class="radio-inline">
                                        <input type="checkbox" class="delivery" name="payment_method" value="Store Pickup" />
                                        Store Pickup - {{$shipments->store_pickup}}৳ </label><br>
                                    <input type="hidden" name="pickup.pickup.title" value="Store Pickup">
                                    <label class="radio-inline">
                                        <input type="checkbox" class="delivery" name="payment_method" value="Request Express" />
                                        Request Express - {{$shipments->request_express}}৳ </label><br>
                                    <input type="hidden" name="express.express.title" value="Request Express">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                {{-- <div class="page-section ws-box voucher-coupon"> --}}
                                    <div class="row">
                                        {{-- <div class="col-md-6 col-sm-12" id="gift-voucher">
                                            <div class="input-group">
                                                <input type="text" name="voucher" placeholder="Gift Voucher"
                                                    id="input-voucher" class="form-control" />
                                                <span class="input-group-btn"><button type="button" id="button-voucher"
                                                        data-loading-text="Loading..." class="btn st-outline">Apply
                                                        Voucher</button></span>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-6 col-sm-12" id="discount-coupon">
                                            <div class="input-group">
                                                <form action="{{ route('apply.coupon')}}" method="POST">
                                                    @csrf
                                                <input type="text" name="coupon" placeholder="Promo / Coupon Code"
                                                    id="input-coupon" class="form-control" />
                                                <span class="input-group-btn"><button type="submit" id="button-coupon"
                                                        data-loading-text="Loading..." class="btn st-outline">Apply
                                                        Coupon</button></span>
                                                </form>
                                            </div>
                                        </div> --}}
                                    </div>
                                {{-- </div> --}}
                            </div>
                            <div class="col-md-12 col-sm-12 details-section-wrap">
                                <div class="page-section ws-box">
                                    <div class="section-head">
                                        <h2><span>4</span>Order Overview</h2>
                                    </div>
                                    <table class="table-bordered bg-white checkout-data">
                                        <thead>
                                            <tr>
                                                <td>Product Name</td>
                                                <td>Price</td>
                                                <td class="text-right">Total</td>
                                            </tr>
                                            @php
                                                $total=0;
                                            @endphp
                                        </thead>
                                        <tbody>
                                            @foreach ($cartname as $carditem )
                                            <tr>
                                                <td class="name">
                                                    <a href="">{{ $carditem->name}}</a>
                                                    <div class="options">
                                                    </div>
                                                </td>
                                                <td class="price"><span>{{number_format($carditem->price)}}৳</span> <span> x </span> <span>{{ $carditem->qty}}</span>
                                                </td>
                                                <td class="price text-right">{{number_format($carditem->qty *  $carditem->price)}} </td>
                                            </tr>
                                            @endforeach

                                            <tr class="total">
                                                <td colspan="2" class="text-right"><strong>Sub-Total:</strong></td>
                                                <td class="text-right"><span class="amount">{{number_format(Cart::Subtotal())}}৳</span></td>
                                            </tr>
                                            @if(Session::has('coupon'))
                                            <input  type="hidden" name="coupon_name" class="form-control" value="{{ Session::get('coupon')['name']}}">
                                            <input  type="hidden" name="coupon_discount" class="form-control" value="{{ Session::get('coupon')['discount']}}">
                                              <input  type="hidden" name="subtotal" class="form-control" value="{{ intval(Cart::Subtotal())}}">
                                            @else
                                            <input  type="hidden" name="subtotal" class="form-control" value="{{ intval(Cart::Subtotal())}}">
                                            @endif
                                            @php
                                            $coupon = Session::get('coupon');
                                            $discount = isset($coupon['discount']) ? number_format($coupon['discount']) : 0;
                                            @endphp
                                            <tr class="total">
                                                <td colspan="2" class="text-right"><strong>Delivery Charge:</strong></td>
                                                <td class="text-right"><span class="amount deliveryCharge"></span></td>
                                            </tr>
                                            <tr class="discount">
                                                <td colspan="2" class="text-right"><strong>Discount:</strong></td>
                                                <td class="text-right"><span class="amount">{{$discount}}৳</span></td>
                                            </tr>


                                            <tr class="total">
                                                <td colspan="2" class="text-right"><strong>Total:</strong></td>
                                                <td class="text-right"><span class="amount subtotalAmount">{{$subtotal}}</span></td>
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
                <input  type="hidden" name="shipping"  id="shipping_charge" class="form-control" value="">
                <input  type="hidden" name="total" id="SubtotalAmount" class="form-control" value="">
                <div class="checkout-final-action">

                    <div class="agree-text" style="margin-bottom: 10px">I have read and agree to the <a
                            href="{{Route('condition')}}" target="_blank"><b>Terms and
                                Conditions</b></a>, <a href="{{Route('policy')}}"
                            target="_blank"><b>Privacy Policy</b></a> and <a
                            href="{{Route('refundAndReturn')}}" target="_blank"><b>Refund and Return
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

  {{-- <script>
    $(document).ready(function () {
                $('.deliveryCharge').text('{{$shipments->home_delivery}}'+'৳');
                $('.subtotalAmount').text('{{number_format($shipments->home_delivery+$subtotal)}}'+'৳');
                $('#shipping_charge').val('{{$shipments->home_delivery}}');
                $('#SubtotalAmount').val('{{$shipments->home_delivery+$subtotal}}');
        // Attach a click event handler to the radio buttons with class "delivery"
        $('.delivery').on('click', function () {
            // Get the selected value
            var selectedValue = $(this).val();

            // Update the text content of the element with class "amount" based on the selected value
            if (selectedValue === 'Home Delivery') {
                $('.deliveryCharge').text('{{$shipments->home_delivery}}'+'৳');
                $('.subtotalAmount').text('{{number_format($shipments->home_delivery+$subtotal)}}'+'৳');
                $('#shipping_charge').val('{{$shipments->home_delivery}}');
                $('#SubtotalAmount').val('{{$shipments->home_delivery+$subtotal}}');

            } else if (selectedValue === 'Store Pickup') {
                $('.deliveryCharge').text('{{$shipments->store_pickup}}'+'৳');
                $('.subtotalAmount').text('{{number_format($shipments->store_pickup+$subtotal)}}'+'৳');
                $('#shipping_charge').val('{{$shipments->store_pickup}}');
                $('#SubtotalAmount').val('{{$shipments->store_pickup+$subtotal}}');
            } else if (selectedValue === 'Request Express') {
                $('.deliveryCharge').text('{{$shipments->request_express}}'+'৳');
                $('.subtotalAmount').text('{{number_format($shipments->request_express+$subtotal)}}'+'৳');
                $('#shipping_charge').val('{{$shipments->request_express}}');
                $('#SubtotalAmount').val('{{$shipments->request_express+$subtotal}}');
            } else {
                $('.deliveryCharge').text('{{ 0 }}'+'৳');
                $('.subtotalAmount').text('{{number_format($shipments->request_express+$subtotal)}}'+'৳');
                $('#shipping_charge').val('{{$shipments->request_express}}');
                $('#SubtotalAmount').val('{{$shipments->request_express+$subtotal}}');
            } else {

            }

        });
    });
</script> --}}

{{-- <script>
    const checkboxes = document.querySelectorAll('.form-check-input');

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        if (this.checked) {
          checkboxes.forEach(otherCheckbox => {
            if (otherCheckbox !== this) {
              otherCheckbox.checked = false;
            }
          });
        }
      });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.delivery');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    checkboxes.forEach(otherCheckbox => {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false;
                        }
                    });
                }
            });
        });
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const formCheckboxes = document.querySelectorAll('.form-check-input');
        const deliveryCheckboxes = document.querySelectorAll('.delivery');

        formCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    formCheckboxes.forEach(otherCheckbox => {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false;
                        }
                    });
                    deliveryCheckboxes.forEach(deliveryCheckbox => {
                        deliveryCheckbox.checked = false;
                    });
                }
            });
        });

        deliveryCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    deliveryCheckboxes.forEach(otherCheckbox => {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false;
                        }
                    });
                    formCheckboxes.forEach(formCheckbox => {
                        formCheckbox.checked = false;
                    });
                }
            });
        });
    });
</script>


{{--
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.form-check-input');
        const deliveryCheckboxes = document.querySelectorAll('.delivery');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    checkboxes.forEach(otherCheckbox => {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false;
                        }
                    });

                    // Enable/disable corresponding delivery checkbox based on form-check-input state
                    const correspondingDeliveryCheckbox = document.querySelector(`.delivery[data-option="${this.dataset.option}"]`);
                    if (correspondingDeliveryCheckbox) {
                        correspondingDeliveryCheckbox.disabled = !this.checked;
                        correspondingDeliveryCheckbox.checked = this.checked && correspondingDeliveryCheckbox.checked;
                    }
                }
            });
        });

        deliveryCheckboxes.forEach(deliveryCheckbox => {
            deliveryCheckbox.addEventListener('change', function () {
                // Disable all other form-check-input checkboxes if this delivery checkbox is checked
                if (this.checked) {
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = false;
                    });
                }
            });
        });
    });
</script> --}}

{{-- 2nd --}}


<script>
    $(document).ready(function () {
        $('.deliveryCharge').text('0৳');
        // $('.deliveryCharge').text('{{$shipments->home_delivery}}'+'৳');
        $('.subtotalAmount').text('{{number_format($shipments->home_delivery+$subtotal)}}'+'৳');
        $('#shipping_charge').val('{{$shipments->home_delivery}}');
        $('#SubtotalAmount').val('{{$shipments->home_delivery+$subtotal}}');

        // Attach a click event handler to the radio buttons with class "delivery"
        $('.delivery').on('click', function () {
            // Get the selected value
            var selectedValue = $(this).val();

            // Update the text content of the element with class "amount" based on the selected value
            if (selectedValue === 'Home Delivery') {
                $('.deliveryCharge').text('{{$shipments->home_delivery}}'+'৳');
                $('.subtotalAmount').text('{{number_format($shipments->home_delivery+$subtotal)}}'+'৳');
                $('#shipping_charge').val('{{$shipments->home_delivery}}');
                $('#SubtotalAmount').val('{{$shipments->home_delivery+$subtotal}}');

            } else if (selectedValue === 'Store Pickup') {
                $('.deliveryCharge').text('{{$shipments->store_pickup}}'+'৳');
                $('.subtotalAmount').text('{{number_format($shipments->store_pickup+$subtotal)}}'+'৳');
                $('#shipping_charge').val('{{$shipments->store_pickup}}');
                $('#SubtotalAmount').val('{{$shipments->store_pickup+$subtotal}}');
            } else if (selectedValue === 'Request Express') {
                $('.deliveryCharge').text('{{$shipments->request_express}}'+'৳');
                $('.subtotalAmount').text('{{number_format($shipments->request_express+$subtotal)}}'+'৳');
                $('#shipping_charge').val('{{$shipments->request_express}}');
                $('#SubtotalAmount').val('{{$shipments->request_express+$subtotal}}');
            }
            else {
                // Set shipping_charge to 0 and get the subtotal amount
                $('.deliveryCharge').text('0৳'); // You may adjust this based on your needs
                $('.subtotalAmount').text('{{number_format($subtotal)}}' + '৳');
                $('#shipping_charge').val('0');
                $('#SubtotalAmount').val('{{$subtotal}}');
            }
        });

        $('.form-check-input').on('click', function () {
            // Get the selected value
            var selectedValue = $(this).val();

            // Update the text content of the element with class "amount" based on the selected value
            if (selectedValue === 'Cash on Deliver') {
                $('.deliveryCharge').text('0৳'); // You may adjust this based on your needs
                $('.subtotalAmount').text('{{number_format($subtotal)}}' + '৳');
                $('#shipping_charge').val('0');
                $('#SubtotalAmount').val('{{$subtotal}}');

            }
            else if (selectedValue === 'POS on Delivery') {
                $('.deliveryCharge').text('0৳'); // You may adjust this based on your needs
                $('.subtotalAmount').text('{{number_format($subtotal)}}' + '৳');
                $('#shipping_charge').val('0');
                $('#SubtotalAmount').val('{{$subtotal}}');

            }
            else if (selectedValue === 'Online Payment') {
                $('.deliveryCharge').text('0৳'); // You may adjust this based on your needs
                $('.subtotalAmount').text('{{number_format($subtotal)}}' + '৳');
                $('#shipping_charge').val('0');
                $('#SubtotalAmount').val('{{$subtotal}}');

            }
            else {
                // Set shipping_charge to 0 and get the subtotal amount
                $('.deliveryCharge').text('0৳'); // You may adjust this based on your needs
                $('.subtotalAmount').text('{{number_format($subtotal)}}' + '৳');
                $('#shipping_charge').val('0');
                $('#SubtotalAmount').val('{{$subtotal}}');
            }
        });
    });
</script>



@endsection
