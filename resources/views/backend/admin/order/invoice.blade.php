<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description"
        content="different types of invoice/bill/tally designed with friendly and markup using modern technology, you can use it on any type of website invoice, fully responsive and w3 validated." />
    <meta name="keywords"
        content="bill , receipt, tally, invoice, cash memo, invoice html, invoice pdf, invoice print, invoice templates, multipurpose invoice, template, booking invoice, general invoice, clean invoice, catalog, estimate, proposal" />
    <meta name="author" content="initTheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Invoice & Receipt</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('invoice/assets/css/main-style.css')}}" />
</head>
<style>
    p {
        font-size: 10px;
    }
</style>

<body class="section-bg-one" style="margin-top: -100px;">
    <main class="container invoice-wrapper" id="download-section">
        <!-- invoice Description -->
        <div class="card-body pt-20 mt-30">
            <div class="row">
                <div class="col-md-6 col-sm-4">

                    @php
                        $setting = DB::table('settings')->first();
                    @endphp

                    <img style="height: 50px; margin-left: -45px" src="{{ URL($setting->logo) }}" title="invoice"
                        alt="invoice" />
                </div>

                <div class="col-md-6 col-sm-8">
                    <div class="invoice-details mb-20">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                {{-- <h5 class="mb-10 text-18 text-capitalize">HQ</h5> --}}

                                <div class="invoice-details-inner mt-2">
                                    <p>{{ $setting->address }}</p>
                                    <p>Hotline: {{ $setting->phone }}</p>
                                </div>
                            </div>

                            <div class="col-md-5 col-sm-5">
                                <div class="invoice-details-inner mt-2">
                                    <br /><br />
                                    <p>VAT Registration No.</p>
                                    <p>0 0 3 1 3 1 7 1 4 - 0 4 0 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-6 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="mb-10 text-18 text-capitalize">
                            <b>Delivery Address</b>
                        </h5>

                        @php
                            // $cusId = $posSale->customer_id;
                            // $customer = DB::table('shippings')
                            //     ->where('order_id', $id)
                            //     ->first();
                            // limon


                        @endphp



                        <h5 class="mb-0 text-15 text-capitalize">
                            Name: <b>{{ $order_shippings->name }}</b>
                        </h5>
                        <h5 class="mb-0 text-15 text-capitalize">
                            Address: <b>{{ $order_shippings->address }}</b>
                        </h5>

                        <div class="invoice-details-inner mt-2">
                            <h5 class="mb-10 text-15 text-capitalize">
                                Number: <b>{{ $order_shippings->phone }}</b>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="mb-10">
                        <h1 class="" style="color: #000; font-weight:bold;">Invoice</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <p>Invoice ID:</p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <p>{{ $order_shippings->invoice_num }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <p>Date:</p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <p>{{ $order_shippings->created_at }}</p>
                        </div>
                        {{-- <div class="col-md-3 col-sm-3">
                            <p>Item Count:</p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <p>1</p>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <p>Payment:</p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <h2>
                                <p>{{ $order_shippings->payment }}</p>
                            </h2>
                        </div>
                        {{-- <div class="col-md-3 col-sm-3">
                            <p>Payable:</p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <h2>
                                <p>BDT {{ $posSale->paid_amount }}</p>
                            </h2>
                        </div> --}}
                        <div class="col-md-12 col-sm-12">
                            <img src="https://img.freepik.com/free-psd/barcode-illustration-isolated_23-2150584086.jpg?size=626&ext=jpg&ga=GA1.1.1546980028.1703376000&semt=ais"
                                alt="" class="img-fluid" style="height: 120px; width: 320px" />
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-6 col-sm-6">
            <div class="invoice-details mb-20">
              <h5 class="mb-10 text-18 text-capitalize">
                <b>#Title</b>
              </h5>

              <p class="mb-10 text-18 text-capitalize">1. Classical Edition Single Jersey Knitted Zipper <br> Polo- Euphoria</p>

              </div>
            </div> -->

                <div class="col-md-12 col-sm-12">
                    <div class="table-responsive invoice-table mb-4">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    {{-- <th>Discount</th> --}}


                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @php
                                    $saleId = $posSale->id;
                                    $saleItems = DB::table('pos_sale_items')
                                        ->where('possale_id', $saleId)
                                        ->get();
                                @endphp --}}

                                @foreach ($order_details as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        {{-- @php
                                            $productId = $row->product_id; // Use $row instead of $saleItems
                                            $productDetails = App\Models\Product::find($productId);
                                        @endphp --}}
                                        <td>{{ $row->product_name }}</td>
                                        {{-- <td>{{ $row->discount }}</td> --}}
                                        <td>{{ $row->singleprice }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ $row->singleprice * $row->quantity }}</td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
        </div>

        <!-- invoice Table -->
        @php
          // $totalcalulation = 0;
          $productamount = 0;
          // $shipping = DB::table('shipping_charges')->first();
          // $total = 0;
        @endphp
        @foreach ($order_details as $row)
            @php
                $productamount += $row->singleprice * $row->quantity;
            @endphp
        @endforeach

        <div class="row" style="margin-top: -30px;">
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 ms-auto">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="border-bottom-0">
                                <h3 class="text-end"><strong>Sub Total: BDT
                                  {{ $productamount }}</strong></h3>
                                 <h4 class="text-end font-10">Shipping Fee: BDT {{ $order_charge->shipping }}</h4>
                                {{-- <h4 class="text-end">Discount: BDT {{ $posSale->discount }}</h4></br> --}}
                                <h3 class="text-end"><strong>Total: BDT {{ $productamount + $order_charge->shipping }}</strong></h3>
                                <h4 class="text-end">(Including VAT)</h4>

                            </td>
                            <!-- <td class="border-bottom-0">
                  <strong>Shipping Fee: BDT 100.0</strong>
                </td>
                <td class="border-bottom-0">
                    <strong>Discount: BDT 0.0</strong>
                  </td>
                  <td class="border-bottom-0">
                    <strong>Total: BDT 830.0</strong>
                  </td>
                  <td class="border-bottom-0">
                    <strong>(Including VAT)</strong>
                  </td>
                  <td class="border-bottom-0">
                    <strong>In Words: Eight Hundred And Thirty Tk Only</strong>
                  </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-10">
                <h4 class="mb-2 text-title font-700 text-border"> Return Policy : </h4>
                <p>This is an electronic generated receipt so doesn't require any signature. </p>
            </div>
            <div class="mb-10">
                <h4 class="mb-2 text-title font-700 text-border"> Terms & Conditions : </h4>
                <p>If you want to cancel the booking please inform us before 3 days, otherwise, you will not get any
                    refund.
                    Invoice was created on a computer and is valid without the signature and seal.</p>
            </div>
        </div>
    </main>
    <!-- invoice Bottom  -->
    <div class="text-center mt-5 mb-4 regular-button">
        <div class="d-print-none d-flex justify-content-center gap-10 mt-5">
            <button id="bill-download" class="btn-primary-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path
                        d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32"></path>
                </svg>
            </button>
            <a href="javascript:window.print()" class="btn-primary-fill">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path
                        d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                        fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path>
                    <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32"
                        fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></rect>
                    <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                        stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path>
                    <circle cx="392" cy="184" r="24" fill="currentColor"></circle>
                </svg>
            </a>
        </div>
    </div>

    <!-- jquery-->
    <script src="{{asset('invoice/assets/js/jquery-3.7.0.min.js')}}"></script>
    <!-- Plugin -->
    <script src="{{asset('invoice/assets/js/plugin.js')}}"></script>
    <!-- Main js-->
    <script src="{{asset('invoice/assets/js/mian.js')}}"></script>
</body>

</html>
