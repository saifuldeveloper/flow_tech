@extends('master_admin')
@section('content')
    <div class="content-wrapper">



        <div class="row card p-5">

            <div class="card-header">
                @if ($order->payment == 'online')
                    <p>Payment Type: <strong>{{ $order->payment_type ?? 'N/A' }}</strong></p>
                    <p>Payment Number: <strong>{{ $order->payment_number ?? 'N/A' }}</strong></p>
                    <p>Transaction ID: <strong>{{ $order->transactionID ?? 'N/A' }}</strong></p>
                @endif

                <hr>
                <p>Name: <strong>{{ $order->name ?? 'N/A' }}</strong></p>
                <p>Phone: <strong>{{ $order->phone ?? 'N/A' }}</strong></p>
                <p>Address: <strong>{{ $order->address ?? 'N/A' }}</strong></p>
            </div>


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
                        $order_details = \DB::table('orders_details')->where('order_id', $id)->get();
                        // dd($order_details);
                    @endphp



                    @foreach ($order_details as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->product_name }}</td>
                            <td>{{ $row->quantity }}</td>

                            <td>{{ $row->singleprice }}</td>
                            <td>{{ $row->totalprice }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
