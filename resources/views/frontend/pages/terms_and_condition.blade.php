@extends('fontend_master')
@section('content')
@php
$setting = DB::table('settings')->first();

@endphp
<section class="after-header p-tb-10">
    <div class="container">
      <ul class="breadcrumb">
             
              <li><a href="about_us.html">About Us</a></li>
            </ul>
        </div>
  </section>
  
  <div class="container">
      <div class="m-home seo-content m-html"> 
        <p>{!!$setting->conditionpage!!}</p>
          </div>
      </div>
@endsection