<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="different types of invoice/bill/tally designed with friendly and markup using modern technology, you can use it on any type of website invoice, fully responsive and w3 validated.">
    <meta name="keywords"
        content="bill , receipt, tally, invoice, cash memo, invoice html, invoice pdf, invoice print, invoice templates, multipurpose invoice, template, booking invoice, general invoice, clean invoice, catalog, estimate, proposal">
    <meta name="author" content="initTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Flow Tech BD | Invoice</title>
    <link rel="icon" type="image/x-icon" sizes="20x20" href="https://mmmkings.com/assets/images/icons/favicon.png">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="http://localhost:8000/invoice/css/main-style.css">
</head>

<body class="section-bg-one">
    @php
        $setting = DB::table('settings')->first();
    @endphp
    <main class="container invoice-wrapper" id="download-section">
        <!-- invoice Top -->
        <div class="card-headers d-flex flex-wrap gap-15 align-items-center justify-content-between mb-4">
            <div class="logo">
                <a href="https://flowtechbd.com">
                    <img height="80px" width="180px" src="https://flowtechbd.com/media/logo/1788608982823317.jpg"
                        alt="flowtechbd_logo">
                </a>

            </div>
            <div class="title">
                <h4 class="text-15 mb-0 mt-0"><strong>Address:</strong> {{ $setting->address }}</h4>
                <span class="status d-block text-capitalize"><strong>Mobile:</strong> {{ $setting->phone }}</span>
                <span class="status d-block text-capitalize"><strong>Email:</strong> {{ $setting->email }}</span>
            </div>
        </div>
        <!-- invoice Description -->
        <div class="card-body mb-4 border-top pt-25 mt-30">
            <div class="row">
                <div class="col-md-8 col-sm-6">
                    <div class="invoice-details">
                        <h5 class="mb-10 text-18 text-capitalize"> Invoice To:</h5>
                        <p><strong>{{ $order_shippings->name }}</strong></p>
                        <div class="invoice-details-inner mt-2">
                            <p><strong>Address:</strong> {{ $order_shippings->address }}</p>
                            <p><strong>Email:</strong> {{ $order_shippings->email }}</p>
                            <p><strong>Phone:</strong> {{ $order_shippings->phone }}</p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4 ml-1 col-sm-6">
                    <div class="invoice-details" style="text-align: right;">
                        <h5 class="mb-10 text-18 text-capitalize"> Invoice Id:# {{ $order_shippings->invoice_num }}</h5>
                        <p><strong></strong></p>
                        <div class="invoice-details-inner mt-2">

                            <p><strong>Invoice Date:</strong> {{ $order_shippings->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- invoice Table -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive invoice-table mb-20 mt-30">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_details as $key => $row)
                                @php
                                    $image =
                                        DB::table('products')
                                            ->where('id', $row->product_id)
                                            ->first()->image_one ?? null;
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td style="display: flex; align-items:center; gap:11px;">
                                        @if (isset($image))
                                            <img src="{{ !empty($image) ? URL::to($image) : config('app.placeholder') . '/100X100' }}"
                                                width="40px" height="40px" alt="">
                                        @endif
                                        {{ Str::limit($row->product_name, 50) }}

                                    </td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>{{ $row->singleprice }}৳</td>
                                    <td>{{ $row->singleprice * $row->quantity }}৳</td>
                                </tr>
                            @endforeach

                            @php
                                $productamount = 0;
                            @endphp
                            @foreach ($order_details as $row)
                                @php
                                    $productamount += $row->singleprice * $row->quantity;
                                    $total = $productamount + $order_charge->shipping - $order_charge->coupon_discount;

                                @endphp
                            @endforeach


                            <tr>
                                <th class="text-right" colspan="4">Sub Total</th>
                                <td>{{ $productamount }}৳</td>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="4">Cupon Discount</th>
                                <td>{{ $order_charge->coupon_discount ?? '0.00' }}৳</td>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="4">Shipping</th>
                                <td> {{ $order_charge->shipping }}৳
                                </td>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="4">Grand Total</th>
                                <td> {{ $total }}৳
                                </td>
                            </tr>
                            <tr>


                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Transaction summary start -->
        @if ($order_shippings->payment == 'online')
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive invoice-table mb-20 mt-30">
                        <table class="table table-striped table-bordered table-hover">

                            <thead>
                                <h3 class="" style="padding: 10px 0px;">Transaction:</h3>
                                <tr>
                                    <th>Date</th>
                                    <th>Gateway</th>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order_charge->created_at }}</td>
                                    <td>{{ $order_charge->payment_type ?? 'N/A' }}</td>
                                    <td>{{ $order_charge->transactionID ?? 'N/A' }}</td>
                                    <td>{{ $order_charge->total }}৳</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @endif

        <!-- Transaction summary end -->



    </main>
    <!-- invoice Bottom  -->
    <div class="text-center mt-5 mb-4 regular-button">
        <div class="d-print-none d-flex justify-content-center flex-wrap gap-10">
            <button id="bill-download" class="btn-primary-outline">Download</button>
            <a href="javascript:window.print()" class="btn-primary-fill">Print Invoice</a>
        </div>
    </div>

    <!-- jquery-->
    <!-- <script src="assets/js/jquery-3.7.0.min.js"></script> -->
    <!-- Plugin -->
    <!-- <script src="assets/js/plugin.js"></script> -->
    <!-- Main js-->
    <!-- <script src="assets/js/mian.js"></script> -->
</body>

</html>
