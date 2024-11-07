@extends('master_admin')

@section('content')
    @php
        $total_product = DB::table('products')->count();
        $total_delivery_amout_pending = DB::table('orders')->where('status', '=', '0')->sum('total');
        $total_seles_amount = DB::table('orders')->where('status', '=', '1')->sum('total');
        $total_order = DB::table('orders')->count();
        $total_category = DB::table('categories')->count();
        $total_subcategory = DB::table('sub_categories')->count();
        $total_band = DB::table('brands')->count();
        $total_cupons = DB::table('coupons')->count();
        $total_Subscriber = DB::table('subscribes')->count();
        $total_customer = DB::table('users')->count();
    @endphp
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">Total Product</h5>
                        <div class="ms-auto">
                            <i class='fa-brands fa-product-hunt fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ number_format($total_product) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-orange">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">Total Order</h5>
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ number_format($total_order) }} </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0 text-white">Total Order Pending</h6>
                        <div class="ms-auto">
                            <i class="fa-solid fa-spinner text-white fs-3"></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ DB::table('orders')->where('status', '=', '0')->count() }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0 text-white">Total Order Delivery</h6>
                        <div class="ms-auto">
                            <i class='fa-solid fa-truck fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ DB::table('orders')->where('status', '=', '1')->count() }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-orange">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0 text-white">Total Sale Amount Pending</h6>
                        <div class="ms-auto">
                            <i class="fa-solid fa-hand-holding-dollar fs-3 text-white"></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">৳ {{ number_format($total_delivery_amout_pending) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0 text-white">Total Sale Amount Delivery</h6>
                        <div class="ms-auto">
                            <i class="fa-solid fa-hand-holding-dollar fs-3 text-white"></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">৳ {{ number_format($total_seles_amount) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">Total Category</h5>
                        <div class="ms-auto">
                            <i class='bx bx-category fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ number_format($total_category) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">Total Sub-Category</h5>
                        <div class="ms-auto">
                            <i class='fa-solid fa-grip fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ number_format($total_subcategory) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">Total Band</h5>
                        <div class="ms-auto">
                            <i class='fa-solid fa-diamond fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ number_format($total_band) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">Total Customer</h5>
                        <div class="ms-auto">
                            <i class='fa-solid fa-user fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ number_format($total_customer) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">Total Cupon</h5>
                        <div class="ms-auto">
                            <i class='fa-solid fa-percent fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ number_format($total_cupons) }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">Total Subscriber</h5>
                        <div class="ms-auto">
                            <i class='fa-solid fa-envelope fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <h5 class="mb-0 m-auto text-white">{{ number_format($total_Subscriber) }}</h5>
                    </div>
                </div>
            </div>
        </div>

    </div><!--end row-->









    {{-- <div class="row">
<div class="col-12 col-lg-8 col-xl-8 d-flex">
   <div class="card radius-10 w-100">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h6 class="mb-0">Site Traffic</h6>
            </div>
            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
            </div>
        </div>
        <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>New Visitor</span>
            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ade2f9"></i>Old Visitor</span>
        </div>
       <div class="chart-container-1">
         <canvas id="chart1"></canvas>
       </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
      <div class="col">
        <div class="p-3">
          <h5 class="mb-0">45.87M</h5>
          <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
        </div>
      </div>
      <div class="col">
        <div class="p-3">
          <h5 class="mb-0">15:48</h5>
          <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
        </div>
      </div>
      <div class="col">
        <div class="p-3">
          <h5 class="mb-0">245.65</h5>
          <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
        </div>
      </div>
    </div>
   </div>
</div>

<div class="col-12 col-lg-4 col-xl-4 d-flex">
   <div class="card radius-10 overflow-hidden w-100">
      <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h6 class="mb-0">Weekly sales</h6>
            </div>
            <div class="font-22 ms-auto text-white"><i class="bx bx-dots-horizontal-rounded"></i>
            </div>
        </div>
        <div class="chart-container-2 my-3">
          <canvas id="chart2"></canvas>
         </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center mb-0">
          <tbody>
            <tr>
              <td><i class="bx bxs-circle me-2" style="color: #14abef"></i> Direct</td>
              <td>$5856</td>
              <td>+55%</td>
            </tr>
            <tr>
              <td><i class="bx bxs-circle me-2" style="color: #02ba5a"></i>Affiliate</td>
              <td>$2602</td>
              <td>+25%</td>
            </tr>
            <tr>
              <td><i class="bx bxs-circle me-2" style="color: #d13adf"></i>E-mail</td>
              <td>$1802</td>
              <td>+15%</td>
            </tr>
            <tr>
              <td><i class="bx bxs-circle me-2" style="color: #fba540"></i>Other</td>
              <td>$1105</td>
              <td>+5%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
</div><!--End Row-->


<div class="row row-cols-1 row-cols-lg-3">
<div class="col">
   <div class="card radius-10">
     <div class="card-body">
       <div class="d-flex align-items-center">
         <div class="w_chart easy-dash-chart1" data-percent="60">
           <span class="w_percent"></span>
         </div>
         <div class="ms-3">
           <h6 class="mb-0">Facebook Followers</h6>
           <small class="mb-0">22.14% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
         </div>
         <div class="ms-auto fs-1 text-facebook"><i class='bx bxl-facebook'></i></div>
       </div>
     </div>
   </div>
 </div>
 <div class="col">
   <div class="card radius-10">
     <div class="card-body">
       <div class="d-flex align-items-center">
         <div class="w_chart easy-dash-chart2" data-percent="65">
           <span class="w_percent"></span>
         </div>
         <div class="ms-3">
            <h6 class="mb-0">Twitter Tweets</h6>
            <small class="mb-0">32.15% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
          </div>
          <div class="ms-auto fs-1 text-twitter"><i class='bx bxl-twitter'></i></div>
       </div>
     </div>
   </div>
 </div>
 <div class="col">
   <div class="card radius-10">
     <div class="card-body">
       <div class="d-flex align-items-center">
         <div class="w_chart easy-dash-chart3" data-percent="75">
           <span class="w_percent"></span>
         </div>
         <div class="ms-3">
            <h6 class="mb-0">Youtube Subscribers</h6>
            <small class="mb-0">58.24% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
          </div>
          <div class="ms-auto fs-1 text-youtube"><i class='bx bxl-youtube'></i></div>
       </div>
     </div>
   </div>
 </div>
</div><!--End Row--> --}}
@endsection
