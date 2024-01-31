@extends('fontend_master')
@php
$setting = DB::table('settings')->first();
// <p>{!!$setting->aboutpage!!}</p>
@endphp
@section('content')
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="material-icons" title="Home"></i>Home</a></li>
                <li><a href="{{route('emi')}}">EMI Terms</a></li>
            </ul>
        </div>
    </section>
    <section class="info-page bg-bt-gray p-tb-15 ">
        <div class="container content ws-box m-auto">
            <style>
                .emi-terms h1 {
                    margin-bottom: 5px;
                    font-size: 20px;
                    color: #01132d;
                    line-height: 35px;
                }

                .emi-terms .emi {
                    margin-top: 30px;
                }

                .emi-terms .emi .emi-content .status {
                    position: absolute;
                }

                .emi-terms .emi .emi-content .status .status-online {
                    width: 10px;
                    height: 10px;
                    background-color: #23e88e;
                    border-radius: 50%;
                    margin-right: 2px;
                    display: inline-block;
                }

                .emi-terms .emi .emi-content .status .status-offline {
                    width: 10px;
                    height: 10px;
                    background-color: #bdbdbd;
                    border-radius: 50%;
                    display: inline-block;
                }

                .emi-terms .emi .emi-content {
                    position: relative;
                    background: #fff;
                    border-radius: 5px;
                    border: 1px solid #ececec;
                    box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
                    padding: 20px;
                    height: 100%;
                }

                .emi-terms hr,
                .emi-terms .emi .emi-content hr,
                .emi-tnc hr,
                .saadiq-tnc hr,
                .ipdc-tnc hr {
                    background-color: #ececec;
                    border: none;
                    height: 1px;
                }

                .emi-terms .emi .emi-content h2 {
                    margin: 0;
                    padding: 15px 0 5px 0;
                    font-size: 20px;
                    font-weight: normal;
                    color: #01132d;
                    line-height: 35px;
                }

                .emi-terms .emi .emi-content h4 {
                    font-size: 14px;
                    color: #23262e;
                    line-height: 22px;
                    margin-top: 10px;
                    font-weight: normal;
                }

                .emi-terms .emi .emi-content span {
                    font-weight: bold;
                }

                .emi-tnc h1,
                .saadiq-tnc h1,
                .ipdc-tnc h1 {
                    margin-top: 30px;
                    margin-bottom: 5px;
                    font-size: 18px;
                    color: #01132d;
                    line-height: 35px;
                }

                .emi-tnc ul,
                .saadiq-tnc ul,
                .ipdc-tnc ul {
                    margin-top: 20px;
                    margin-bottom: 30px;
                }

                .emi-tnc li,
                .saadiq-tnc li,
                .ipdc-tnc li {
                    color: #01132d;
                    margin-bottom: 10px;
                    font-size: 14px;
                    line-height: 25px;
                    list-style: circle;
                }

                .saadiq-tnc h4,
                .ipdc-tnc h4 {
                    font-size: 16px;
                    font-weight: normal;
                    line-height: 27px;
                }

                .saadiq-tnc h4 a {}

                .ipdc-ez-banner {
                    margin-top: 30px;
                }
            </style>
            <div class="row emi-terms">
                <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                    <h1>Enjoy 0% EMI Facility From The Banks Listed Below</h1>

                 <hr>

                 <p>{!!$setting->emipage!!}</p


                </div>



           </div>
        </div>
    </section>
@endsection
