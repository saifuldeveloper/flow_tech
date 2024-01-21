@extends('master_admin')
@section('content')

<div class="content-wrapper">
  
   

    <div class="row card p-5">
        <table class="table">
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