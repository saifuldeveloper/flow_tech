@extends('fontend_master')
@section('content')
@php
$setting = DB::table('settings')->first();

@endphp
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="material-icons" title="Home"></i>Home</a></li>
                <li><a href="">Privacy Policy</a></li>
            </ul>
        </div>
    </section>
    <section class="info-page bg-bt-gray p-tb-15 ">
        <div class="container content ws-box m-auto">
            <style>
                .priv-pol h1 {
                    margin-bottom: 5px;
                    font-size: 20px;
                    font-weight: 700;
                    color: #01132d;
                    line-height: 35px;
                }

                .priv-pol hr {
                    background-color: #D6D6D6;
                    border: none;
                    height: 1px;
                }

                .priv-pol .pp-desc {
                    margin-top: 20px;
                }

                .priv-pol h2 {
                    font-size: 18px;
                    color: #01132d;
                    line-height: 30px;
                    margin-top: 25px;
                }

                .priv-pol ul li {
                    color: #01132d;
                    margin-bottom: 0px;
                    line-height: 24.5px;
                    font-size: 14px;
                    list-style-type: circle;
                }

                .priv-pol .nb {
                    text-align: center;
                    border-top: 1px solid #D6D6D6;
                    color: #01132d;
                    margin-top: 48px;
                }

                .priv-pol .nb a {
                    line-height: 25px;
                }

                .priv-pol .nb h3 {
                    font-size: 18px;
                    margin-top: 20px;
                    line-height: 30px;
                }

                .priv-pol .nb p {
                    margin-bottom: 0px;
                }
            </style>
            <div class="priv-pol">
                <h1>Privacy Policy of Star Tech Ltd.</h1>
                <hr>
                 <p>{!!$setting->policypage!!}</p>
        </div>
     </div>
    </section>
@endsection
