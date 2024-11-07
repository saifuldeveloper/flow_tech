@extends('fontend_master')
@section('meta_title', 'Flow Tech BD | Delivery & Return Policy')
@section('content')
    @php
        $setting = DB::table('settings')->first();

    @endphp
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">

                <li><a href="{{ route('deliveryReturnPage') }}">Delivery & Return Policy</a></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="m-home seo-content m-html">
            <p>{!! $setting->Best_desktop !!}</p>
        </div>
    </div>
@endsection
