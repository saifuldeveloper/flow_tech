@extends('fontend_master')
@section('meta_title', 'Flow Tech BD | Online Service')
@section('content')
    @php
        $setting = DB::table('settings')->first();

    @endphp
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">

                <li><a href="{{ route('page.onlineService') }}">Online Service</a></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="m-home seo-content m-html">
            <p>{!! $setting->computer_laptop_gameingPc !!}</p>
        </div>
    </div>
@endsection
