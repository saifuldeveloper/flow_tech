@extends('master_admin')

@section('content')
    @php
        // $total_product = DB::table('products')->count();
        // $total_delivery_amout_pending = DB::table('orders')->where('status', '=', '0')->sum('total');
        // $total_seles_amount = DB::table('orders')->where('status', '=', '1')->sum('total');
        // $total_order = DB::table('orders')->count();
        // $total_category = DB::table('categories')->count();
        // $total_subcategory = DB::table('sub_categories')->count();
        // $total_band = DB::table('brands')->count();
        // $total_cupons = DB::table('coupons')->count();
        // $total_Subscriber = DB::table('subscribes')->count();
        // $total_customer = DB::table('users')->count();

        $today = Carbon\Carbon::today();

        $completed_order = DB::table('orders')->where('status', 'completed')->count();
        $processing_order = DB::table('orders')->where('status', 'processing')->count();
        $pending_order = DB::table('orders')->where('status', 'pending')->count();
        $rejected_order = DB::table('orders')->where('status', 'rejected')->count();
        $paid_order = DB::table('orders')->where('status', 'paid')->count();
        $unpaid_order = DB::table('orders')->where('status', 'unpaid')->count();

        $completed_order_today = DB::table('orders')
            ->where('status', 'completed')
            ->whereDate('created_at', $today)
            ->count();

        $processing_order_today = DB::table('orders')
            ->where('status', 'processing')
            ->whereDate('created_at', $today)
            ->count();

        $pending_order_today = DB::table('orders')
            ->where('status', 'pending')
            ->whereDate('created_at', $today)
            ->count();

        $rejected_order_today = DB::table('orders')
            ->where('status', 'rejected')
            ->whereDate('created_at', $today)
            ->count();

        $paid_order_today = DB::table('orders')->where('status', 'paid')->whereDate('created_at', $today)->count();

        $unpaid_order_today = DB::table('orders')->where('status', 'unpaid')->whereDate('created_at', $today)->count();

        // Most Ordered Products Product Name &	Quantity
        $topProducts = DB::table('orders_details')
            ->select('product_id', DB::raw('sum(quantity) as total'))
            ->groupBy('product_id')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        // Most Ordered Brands wise product
        // $topBrands = DB::table('orders_details')
        //     ->select('brand_id', DB::raw('sum(quantity) as total'))
        //     ->groupBy('brand_id')
        //     ->orderBy('total', 'desc')
        //     ->limit(10)
        //     ->get();

        // Most Ordered Brands wise product
        // $topCategories = DB::table('orders_details')
        //     ->select('category_id', DB::raw('sum(quantity) as total'))
        //     ->groupBy('category_id')
        //     ->orderBy('total', 'desc')
        //     ->limit(10)
        //     ->get();

    @endphp
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-6">

        <x-dashboard-card bg="#26A9E3" title="Completed Order" :total="$completed_order" />

        <x-dashboard-card bg="#27B779" title="Processing Order" :total="$processing_order" />

        <x-dashboard-card bg="#7360EE" title="Pending Order" :total="$pending_order" />

        <x-dashboard-card bg="#DA542E" title="Rejected Order" :total="$rejected_order" />

        <x-dashboard-card bg="#2155A4" title="Paid Order" :total="$paid_order" />

        <x-dashboard-card bg="#FFB748" title="Unpaid Order" :total="$unpaid_order" />


        {{-- today dashboard --}}
        <x-dashboard-card bg="#26A9E3" title="Completed Order(Today)" :total="$completed_order_today" />

        <x-dashboard-card bg="#27B779" title="Processing Order(Today)" :total="$processing_order_today" />

        <x-dashboard-card bg="#7360EE" title="Pending Order(Today)" :total="$pending_order_today" />

        <x-dashboard-card bg="#DA542E" title="Rejected Order(Today)" :total="$rejected_order_today" />

        <x-dashboard-card bg="#2155A4" title="Paid Order(Today)" :total="$paid_order_today" />

        <x-dashboard-card bg="#FFB748" title="Unpaid Order(Today)" :total="$unpaid_order_today" />


    </div><!--end row-->

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Most Ordered Products</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th> Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topProducts as $item)
                                    @php
                                        @$product_name = DB::table('products')
                                            ->where('id', $item->product_id)
                                            ->first()->product_name;

                                    @endphp
                                    <tr>
                                        <td>{{ $product_name ?? 'N/A' }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Most Ordered Brands</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Brand Name</th>
                                    <th> No of Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach (@$topBrands as $item)
                                    @php
                                        $brand_name = DB::table('brands')
                                            ->where('id', $item->brand_id)
                                            ->first()->brand_name;
                                    @endphp
                                    <tr>
                                        <td>{{ $brand_name ?? 'N/A' }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach --}}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Most Ordered Categories</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th> No of Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($topCategories as $item)
                                    @php

                                        $category_name = DB::table('categories')
                                            ->where('id', $item->category_id)
                                            ->first()->category_name;
                                    @endphp
                                    <tr>
                                        <td>{{ $category_name }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
