@extends('fontend_master')
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    * {
        box-sizing: border-box;
    }

    /* body {
        background:#ddd;
        font-family:"Raleway";
    } */
    .tabs {
        position: absolute;
        /* top:50%;
  left:50%; */
        /* transform:translate(-50%,-50%); */
        width: 700px;
        /* height: 360px; */
        height: 360px;
        padding: 30px 20px;
        /* background:#f5f5f5; */
        /* box-shadow:5px 5px 10px 5px #ccc; */
        overflow: hidden;
    }

    .tabs .tab-header {
        float: left;
        width: 180px;
        height: 100%;
        border-right: 1px solid #ccc;
        padding: 50px 0px;
    }

    .tabs .tab-header>div {
        height: 50px;
        line-height: 50px;
        font-size: 16px;
        font-weight: 600;
        color: #888;
        cursor: pointer;
        padding-left: 10px;
    }

    .tabs .tab-header>div:hover,
    .tabs .tab-header>div.active {
        color: #FF6600;
    }

    .tabs .tab-header div i {
        display: inline-block;
        margin-left: 10px;
        margin-right: 5px;
    }

    .tabs .tab-content {
        position: relative;
        height: 100%;
        overflow: hidden;
    }

    .tabs .tab-content>div>i {
        display: inline-block;
        width: 50px;
        height: 50px;
        background: #555;
        color: #f5f5f5;
        font-size: 25px;
        font-weight: 600;
        /* text-align:center; */
        line-height: 50px;
        border-radius: 50%;
    }

    .tabs .tab-content>div {
        position: absolute;
        text-align: center;
        padding: 40px 20px;
        top: -200%;
        transition: all 500ms ease-in-out;
    }

    .tabs .tab-content>div.active {
        top: 0px;
    }

    .tabs .tab-indicator {
        position: absolute;
        width: 4px;
        height: 50px;
        background: #FF6600;
        left: 198px;
        top: 80px;
        transition: all 500ms ease-in-out;
    }
</style>

@section('content')
    <section-collapse>
        <div class="container mt-3">


            <div class="row ">


                <div class="col col-sm-8 col-md-9">
                    <div class="tabs">
                        <div class="tab-header">
                            <div class="active">
                                <i class="fa fa-shopping-cart"></i> Orders
                            </div>
                            <div>
                                {{-- <i class="fa fa-envelopefa-envelopefa-envelope"></i> Contact --}}
                                <i class="fa fa-shipping-fast"></i> Status
                            </div>
                        </div>
                        <div class="tab-indicator"></div>
                        <div class="tab-content text-center">



                            <div class="active container table-responsive py-5">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>

                                            <th scope="col">Sl</th>
                                            <th scope="col">Invoic Id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Single Price</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @php
                                        $order_details = DB::table('orders_details')
                                            ->leftJoin('orders', 'orders_details.order_id', '=', 'orders.id')
                                            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                                            ->leftJoin('shippings', 'orders.id', '=', 'shippings.order_id')
                                            ->get();
                                            $stordata;
                                    @endphp


                                        @foreach ($order_details as $key => $row)
                                            @if ($row->user_id == Auth::user()->id)


                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->invoice_num }}</td>
                                                    <td>{{ $row->product_name }}</td>
                                                    <td>{{ $row->quantity }}</td>
                                                    <td>{{ $row->singleprice }}</td>
                                                    <td>{{ $row->total }}</td>
                                                    <td>{{ ($row->status == 0) ? 'Pending' : 'Shipped' }}</td>
                                                    {{-- <td>{{  }}</td> --}}
                                                    @php
                                                    $stordata=$row->address;
                                                    @endphp

                                                </tr>

                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div>
                                {{-- <i class="fa fa-info"></i>
                                <span style="color: #FF6600;">Status will dynamic</span>
                                <h2>Congratulation </h2>
                                <p>Contact with </p> --}}
                                {{-- <i class="fa fa-info" style="color: #FF6600;"></i><br>
                            <span style="color: #FF6600;">Status will dynamic</span>
                                <div class="card-body">
                                    <h2 class="card-title">Invoice No #000111</h2>
                                    <p class="card-text">Contact with further query 1111111111 </p>
                                </div> --}}
                                <!-- Search form -->
                                <div class="card col-">
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Invoice ID</label>
                                            <input class="form-control" name="invoice_num" type="text" placeholder="Track Your Product" > <br>
                                            <button class="btn btn-info" type="submit">Track Now</button>
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>


                </div>

                <div class="col co-sm-4 col-md-3">
                    <div class="card mb-4">
                        <div class="card-body ">
                            <div class="text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            </div>
                            <hr>
                            <h5 class="my-3">Name: {{ Auth::user()->name }}</h5>
                            {{-- <h5 class="my-3">Name:asdfghjkl;</h5> --}}
                            {{-- <p class="text-muted mb-1">Contact: 123456789</p> --}}
                            {{-- <p class="text-muted mb-1">Contact: {{ Auth::user()->phone }}</p> --}}
                            {{-- <p class="text-muted mb-1">Address: {{$stordata}}</p> --}}
                            {{-- <button type="button" class="btn btn-danger">Logout</button> --}}
                            {{-- <div class=" mb-2">

                                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById(#logout-form).submit()">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>




        </div>
    </section-collapse>

    <script>
        function _class(name) {
            return document.getElementsByClassName(name);
        }

        let tabPanes = _class("tab-header")[0].getElementsByTagName("div");

        for (let i = 0; i < tabPanes.length; i++) {
            tabPanes[i].addEventListener("click", function() {
                _class("tab-header")[0].getElementsByClassName("active")[0].classList.remove("active");
                tabPanes[i].classList.add("active");

                _class("tab-indicator")[0].style.top = `calc(80px + ${i*50}px)`;

                _class("tab-content")[0].getElementsByClassName("active")[0].classList.remove("active");
                _class("tab-content")[0].getElementsByTagName("div")[i].classList.add("active");

            });
        }
    </script>
@endsection
