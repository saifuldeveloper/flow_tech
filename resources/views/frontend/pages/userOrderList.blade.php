@extends('fontend_master')
@section('content')
    <style>
        /* generic */

body {
  background-color:#eee;
  color:#444;
  font-family:sans-serif;
}

.list ul:nth-child(odd) {
  background-color:#ddd;
}

.list ul:nth-child(even) {
  background-color:#fff;
}

/* big */
@media screen and (min-width:600px) {

  .list {
    display:table;
    margin:1em;
  }

  .list ul {
    display:table-row;
  }

  .list ul:first-child li {
    background-color:#444;
    color:#fff;
  }

  .list ul > li {
    display:table-cell;
    padding:.5em 1em;
  }

}

/* small */
@media screen and (max-width:599px) {

  .list ul {
    border:solid 1px #ccc;
    display:block;
    list-style:none;
    margin:1em;
    padding:.5em 1em;
  }

  .list ul:first-child {
    display:none;
  }

  .list ul > li {
    display:block;
    padding:.25em 0;
  }

  .list ul:nth-child(odd) > li + li {
    border-top:solid 1px #ccc;
  }

  .list ul:nth-child(even) > li + li {
    border-top:solid 1px #eee;
  }

  .list ul > li:before {
    color:#000;
    content:attr(data-label);
    display:inline-block;
    font-size:75%;
    font-weight:bold;
    text-transform:capitalize;
    vertical-align:top;
    width:50%;
  }

  .list p {
    margin:-1em 0 0 50%;
  }

}

/* tiny */
@media screen and (max-width:349px) {

  .list ul > li:before {
    display:block;
  }

  .list p {
    margin:0;
  }

}


    </style>




    <body class="account-account">


@php
    $Id = Auth::user()->id;

    $Items = DB::table('users')
            ->leftJoin('orders','users.id','orders.user_id')
            ->leftJoin('orders_details','orders.id','orders_details.order_id')
            ->leftJoin('shippings','orders.id','shippings.order_id')
            ->where('users.id', $Id)
            ->get();

@endphp

        <section class="after-header p-tb-10">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-home" title="Home"></i></a></li>
                    <li><a href="{{route('account')}}">Account</a></li>
                </ul>
            </div>
        </section>
        <div class="container ac-layout">
            <div class="ac-header">
                <div class="left">
                    <span class="avatar"><img
                            src="https://www.gravatar.com/avatar/4823de601222ef12c9f16ae825938b8a?s=70&d=mp&r=g"
                            width="80" height="80" alt=""></span>
                    <div class="name">
                        <p>Hello,</p>
                        @if (Auth::user())

                        <p class="user">{{ Illuminate\Support\Str::of(Auth::user()->name) }} </p>
                        @endif
                    </div>
                </div>

            </div>
            <ul class="navbar-nav ac-navbar">
                <li class="nav-item"><a href="{{route('account.order.list')}}" class="nav-link"><span class="material-icons"></span>Orders</a>
                </li>
                <li class="nav-item"><a href="{{route('account.edit')}}" class="nav-link"><span class="material-icons"></span>Edit
                        Account</a></li>

            </ul>
            <div class="ac-title"><a href=""><span class="material-icons">arrow_back</span></a>
                <h1>Order Information</h1>
            </div>

            <div class="list">
                <ul>
                  <li>SI</li>
                  <li>Product Name</li>
                  <li>Qty</li>
                  <li>Total</li>
                </ul>

                @foreach ($Items as $key=>$item)
                <ul>
                    <li data-label="serial_no">{{ $key+1}}</li>
                    <li data-label="product_name">{{$item->product_name}}</li>
                    <li data-label="product_qunatity">{{$item->quantity}}</li>
                    <li data-label="product_totalprice">{{$item->totalprice}}</li>
                    </li>
                  </ul>

                @endforeach


              </div>


        </div>

    </body>

    </html>
@endsection
