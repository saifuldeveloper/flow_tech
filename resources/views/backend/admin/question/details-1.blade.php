@extends('master_admin')
@section('content')

<div class="content-wrapper">
   <div class="row">
   <div class="col-md-4">
    <div class="page-header">
        <h3 class="page-title card p-5">Order Date: {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</h3>
  
  
  
       
      </div>
   </div>
    <div class="col-md-4">
        <div class="page-header">
            <h3 class="page-title card p-5">Customer Name: {{$order->name}}</h3>
            <h3 class="page-title card p-5">Customer Name: {{$order->order_id}}</h3>
      
      
      
           
          </div>
    </div>
      <div class="col-md-4">
        <div class="page-header">
            <h3 class="page-title card p-5">Phone Number: {{$order->phone}}</h3>
      
      
      
           
          </div>
      </div>
   </div>
    <div class="row card p-5">
        <div class="col-md-12">
            <h3>Name: {{$order->name}}</h3>
            <h3>City: {{$order->city}}</h3>
            <h3>Address: {{$order->address}}</h3>
            <h3>Notes: {{$order->notes}}</h3>
            <h3>Payment: {{$order->payment}}</h3>
            <h3>Subtotal: {{$order->subtotal}}</h3>
            <h3>Shipping: {{$order->shipping}}</h3>
            <h3>Coupon Discount: {{$order->coupon_discount}}</h3>
            <h3>Total: {{$order->total}}</h3>
        </div>
    </div>

    <div class="row card p-5">
        <table class="">
            <thead>
              <tr>
                <th>Sl</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Single Price</th>
                <th>Total Price</th>
              </tr>
            </thead>
            <tbody>
                @php 
                    $id = $order->order_id;
                    $order_details = \DB::table('orders_details')->where('order_id',$id)->get();
                    // dd($order_details);
                @endphp

                @foreach($order_details as $key=>$row)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$row->product_name}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{$row->singleprice}}</td>
                    <td>{{$row->totalprice}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection