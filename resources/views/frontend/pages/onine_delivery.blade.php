@extends('fontend_master')
@section('content')
@php
$setting = DB::table('settings')->first();

@endphp
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="material-icons" title="Home">home</i></a></li>
                <li><a href="{{route('delivery')}}">Online Delivery</a></li>
            </ul>
        </div>
    </section>
    <section class="info-page bg-bt-gray p-tb-15 ">
        <div class="container content ws-box m-auto">
            <style>
                .info-page .odc h1 {
                    margin-bottom: 5px;
                    font-size: 20px;
                    font-weight: 700;
                    color: #01132d;
                    line-height: 35px;
                }

                .info-page .odc hr {
                    background-color: #D6D6D6;
                    border: none;
                    height: 1px;
                }

                .info-page .odc ul {
                    margin-top: 20px;
                    margin-bottom: 30px;
                }

                .info-page .odc ul li {
                    color: #01132d;
                    margin-bottom: 10px;
                    line-height: 24.5px;
                    font-size: 14px;
                    list-style-type: circle;
                }

                .info-page .odc .nb {
                    text-align: center;
                    border-top: 1px solid #D6D6D6;
                    color: #01132d;
                    padding-top: 20px;
                    margin-top: 48px;
                }

                .info-page .odc .nb a {
                    padding: 2px 20px;
                    margin-top: 7px;
                }

                .info-page .odc .nb h3 {
                    font-size: 18px;
                    margin-top: 12px;
                    line-height: 30px;
                }
            </style>
            <div class="odc">
                <h1>স্টার টেক অনলাইন ডেলিভারির শর্তাবলি</h1>
                <hr>
                <p>{!!$setting->delivery!!}</p>
            </div>
        </div>
    </section>
@endsection
