@extends('fontend_master')
@section('content')
@php
$setting = DB::table('settings')->first();
@endphp
<section class="after-header p-tb-10">
    <div class="container">
        <ul class="breadcrumb">
                        <li><a href="{{route('/')}}"><i class="material-icons" title="Home">home</i></a></li>
                        <li><a href="contact.html">Contact Us | Star Tech Ltd</a></li>
                    </ul>
    </div>
</section>
<div class="info-page bg-bt-gray p-tb-15">
    <div class="container body">
                <div class="contact-us-content">
            <div class="row m-b-30">
                <div class="col-md-6">
                    <div class="c-card ws-box">
                        <div class="ic"><a href="tel:16793"><i class="material-icons">phone</i></a></div>
                        <div class="each-contact-text">
                            <h3>Contact Us (10 AM - 7 PM)</h3>
                            <p class="c-phone">{{$setting->phone}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="c-card ws-box">
                        <div class="ic"><a href="{{$setting->email}}"><i class="material-icons">email</i></a></div>
                        <div class="each-contact-text">
                            <h3>For Corporate Deals & Complain</h3>
                            <p>{{$setting->email}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

            </div>

</div>
@endsection
