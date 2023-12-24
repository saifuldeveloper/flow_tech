@extends('fontend_master')
@section('content')
@php
$setting = DB::table('settings')->first();
@endphp
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="https://www.startech.com.bd/"><i class="material-icons" title="Home">home</i></a></li>
                <li><a href="https://www.startech.com.bd/refund-policy">Refund and Return Policy</a></li>
            </ul>
        </div>
    </section>
    <section class="info-page bg-bt-gray p-tb-15 ">
        <div class="container content ws-box m-auto">
            <style>
                .info-page .rr-policy h1 {
                    margin-bottom: 5px;
                    font-size: 20px;
                    font-weight: 700;
                    color: #01132d;
                    line-height: 35px;
                }

                .info-page .rr-policy hr {
                    background-color: #D6D6D6;
                    border: none;
                    height: 1px;
                }

                .info-page .rr-policy ul {
                    margin-top: 20px;
                    margin-bottom: 30px;
                }

                .info-page .rr-policy ul li {
                    color: #01132d;
                    margin-bottom: 10px;
                    line-height: 24.5px;
                    font-size: 14px;
                    list-style-type: circle;
                }

                .info-page .rr-policy .nb {
                    text-align: center;
                    border-top: 1px solid #D6D6D6;
                    color: #01132d;
                    margin-top: 48px;
                }

                .info-page .rr-policy .nb a {
                    line-height: 25px;
                }

                .info-page .rr-policy h3 {
                    font-size: 18px;
                    margin-top: 20px;
                    line-height: 30px;
                }
            </style>
            <div class="rr-policy">
                <h1>পণ্য রিটার্ন ও রিফান্ড পলিসি</h1>
                <hr>
                 <p>{!!$setting->refundpage!!}</p>
            </div>
        </div>
    </section>
@endsection
