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
    <link rel="stylesheet" type="text/css" href="{{ asset('invoice/assets/css/main-style.css') }}" />
</head>
<style>
    p {
        font-size: 10px;
    }
</style>

<body class="section-bg-one" style="margin-top: -5px;">
    <main class="container invoice-wrapper" style="padding: 30px; padding-top: 0px;" id="download-section">
        <!-- invoice Description -->
        <div class="card-body">
            <div class="row">
                {{-- <div class="col-md-6 col-sm-4"> --}}

                @php
                    $setting = DB::table('settings')->first();
                @endphp

                <img style="height: 82px; margin-left: -10px; width: 21%;" src="{{ URL($setting->logo) }}"
                    title="invoice" alt="invoice">
                {{-- </div> --}}

                <div class="col-md-6 col-sm-8">
                    <div class="invoice-details mb-20">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="invoice-details mb-20">
                        <div class="mb-10 ">
                            <br>
                            <h3 class="invoice-text " style="color: #000; font-weight:bold; margin-top: 25px;">Invoice
                                ID:
                                # {{ $order_shippings->invoice_num }}</h3>
                        </div>
                        <h5 class="mb-1 text-15 text-capitalize">
                            <b>Company Name: </b> {{ $setting->shopname }}
                        </h5>
                        <h5 class="mb-1 text-15 text-capitalize">
                            <b> Address:</b> {{ $setting->address }}
                        </h5>

                        <div class="invoice-details-inner mt-2">
                            <h5 class="mb-10 text-15 text-capitalize">
                                <b>Hotline:</b> {{ $setting->phone }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-3 col-sm-3">
                                <p>Customer Name: </p>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <p>{{ $order_shippings->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-3 col-sm-3">
                                <p>Address: </p>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <p> {{ $order_shippings->address }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-3 col-sm-3">
                                <p>Number: </p>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <p> {{ $order_shippings->phone }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-3 col-sm-3">
                                <p>Order Date: </p>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <p> {{ $order_shippings->created_at }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="col-md-3 col-sm-3">
                                <p>Payment Status: </p>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <h2>
                                    <p> {{ $order_shippings->payment }}</p>
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <img src="https://img.freepik.com/free-psd/barcode-illustration-isolated_23-2150584086.jpg?size=626&amp;ext=jpg&amp;ga=GA1.1.1546980028.1703376000&amp;semt=ais"
                                alt="" class="img-fluid" style="height: 100px; width: 280px">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="table-responsive invoice-table mb-4">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($order_details as $key => $row)
                                    @php
                                        $image = DB::table('products')
                                            ->where('id', $row->product_id)
                                            ->first()->image_one;
                                    @endphp
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td style="display: flex; align-items:center; gap:11px;">
                                            @if (isset($image))
                                                <img src="{{ URL::to($image) }}" width="40px" height="40px"
                                                    alt="">
                                            @endif
                                            {{ Str::limit($row->product_name, 50) }}

                                        </td>
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


        <!-- invoice Table -->
        @php
            $productamount = 0;
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
                                <h3 class="text-end"><strong>Total: BDT
                                        {{ $productamount + $order_charge->shipping }}</strong></h3>
                                <h4 class="text-end">(Including VAT)</h4>
                            </td>
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
    <script src="{{ asset('invoice/assets/js/jquery-3.7.0.min.js') }}"></script>
    <!-- Plugin -->
    <script src="{{ asset('invoice/assets/js/plugin.js') }}"></script>
    <!-- Main js-->
    <script src="{{ asset('invoice/assets/js/mian.js') }}"></script>
</body>

</html>
