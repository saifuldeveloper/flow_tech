@extends('fontend_master')
@section('meta_title', 'Flow Tech BD | ডিজিটাল কমার্স নির্দশিকা')
@section('content')
    @php
        $setting = DB::table('settings')->first();

    @endphp
    <section class="after-header p-tb-10 info-page bg-bt-gray">
        <div class="container">
            <ul class="breadcrumb">

                <li><a href="{{ url('digitalCommerce') }}">ডিজিটাল কমার্স নির্দশিকা</a></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="m-home seo-content m-html">
            <p>{!! $setting->Best_laptop !!}</p>
        </div>
    </div>
@endsection