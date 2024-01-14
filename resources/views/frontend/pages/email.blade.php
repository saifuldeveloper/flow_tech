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

<body class="section-bg-one" style="margin-top: -100px;">
    <main class="container invoice-wrapper" id="download-section">
        <!-- invoice Description -->
        <div class="card-body pt-20 mt-30">
            @php
                $setting = DB::table('settings')->first();
            @endphp
            <div class="invoice-details mb-20">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="invoice-details-inner mt-2">
                            <img style="height: 50px; margin-left:12px" src="{{ URL($setting->logo) }}"
                                title="invoice" alt="invoice" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-3">
                        <div class="invoice-details-inner mt-2">
                            <p>{{ $setting->address }}</p>
                            <p>Hotline: {{ $setting->phone }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="invoice-details mb-20">
                        <h5 class="mb-10 text-18 text-capitalize">
                            <b>Delivery Address</b>
                        </h5>
                        <h5 class="mb-0 text-15 text-capitalize">
                            Name: <b>{{ $shipping['name'] }}</b>
                        </h5>
                        <h5 class="mb-0 text-15 text-capitalize">
                            Address: <b>{{ $shipping['address'] }}</b>
                        </h5>

                        <div class="invoice-details-inner mt-2">
                            <h5 class="mb-10 text-15 text-capitalize">
                                Number: <b>{{ $shipping['phone'] }}</b>
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
                            <p>{{ $shipping['invoice_num'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <p>Date:</p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <p>{{ $shipping['created_at'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <p>Payment:</p>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <h2>
                                <p>sd</p>
                            </h2>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <img class="barcode-image"
                                style="height: 50px; width: 320px;margin-button:15px; margin-top:10px;"
                                src="data:image/png;base64,{{ DNS1D::getBarcodePNG($shipping['invoice_num'], 'C39', 1, 30) }}"
                                alt="Barcode">
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
                                @foreach ($shipping['order_details'] as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->product_name }}</td>
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
        <div class="row" style="margin-top: -30px;">
            <div class="col-12 text-end">
                <table class="table">
                    <tbody>
                        <tr class="tex-end">
                            <td class="border-bottom-0">
                                <h3 class="text-end"><strong>Sub Total: BDT
                                        {{ $shipping['subtotal'] }}</strong></h3>
                                <h4 class="text-end font-10">Shipping Fee: BDT {{ $shipping['shipping'] }}</h4>
                                <h3 class="text-end"><strong>Total: BDT
                                        {{ $shipping['total'] }}</strong></h3>
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
    {{-- <div class="text-center mt-5 mb-4 regular-button">
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
                    <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none"
                        stroke="currentColor" stroke-linejoin="round" stroke-width="32"></rect>
                    <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                        stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path>
                    <circle cx="392" cy="184" r="24" fill="currentColor"></circle>
                </svg>
            </a>
        </div>
    </div> --}}
</body>

</html>
