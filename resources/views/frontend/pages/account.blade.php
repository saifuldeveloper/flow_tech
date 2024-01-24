@extends('fontend_master')
@section('content')
    <style>

    </style>




    <body class="account-account">




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
                        {{-- @if (Auth::check()) --}}
                        @if (Auth::user())

                        <p class="user">{{ Illuminate\Support\Str::of(Auth::user()->name) }} </p>
                        @endif
                    </div>
                </div>

            </div>
            {{-- <ul class="navbar-nav ac-navbar">
                <li class="nav-item"><a href="" class="nav-link"><span class="material-icons"></span>Orders</a>
                </li>
                <li class="nav-item"><a href="" class="nav-link"><span class="material-icons"></span>Edit
                        Account</a></li>

            </ul> --}}
            <div class="ac-menus">
                <div class="ac-menu-item">
                    <a href="{{route('account.order.list')}}" class="ico-btn"><span
                            class="fa-solid fa-cart-flatbed-suitcase m-blurb"></span><span>Orders</span></a>
                </div>
                <div class="ac-menu-item">
                    <a href="{{route('account.edit')}}" class="ico-btn"><span class="fa solid fa-user m-blurb"></span><span>Edit
                            Profile</span></a>
                </div>

                <div class="ac-menu-item h-desk">
                    <a href="" class="ico-btn"><span class="">input</span><span>Logout</span></a>
                </div>
            </div>
        </div>

        <div class="overlay"></div>
        <script src="js/all.min.js"></script>
        <div class="overlay"></div>
    </body>

    </html>
@endsection
