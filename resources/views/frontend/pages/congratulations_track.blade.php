@extends('fontend_master')
@section('content')
<style>
    h1 {
         color: #FF6600;
         font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
         font-weight: 900;
         font-size: 40px;
         /* font-size: 20px; */
         margin-bottom: 10px;
       }
       p {
         color: #404F5E;
         font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
         font-size:20px;
         /* font-size:10px; */
         margin: 0;
       }
     /* i {
       color: #9ABC66;
       font-size: 100px;
       line-height: 200px;
       margin-left:-15px;
     } */
     .card {
       background: white;
       padding: 60px;
       border-radius: 4px;
       box-shadow: 0 2px 3px #C8D0D8;
       display: inline-block;
       margin: 0 auto;
     }
</style>

<div class="container">
   <center>
       <div class="card">
           <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
             <i class="fa fa-smile" style="color: #FF6600;
             font-size: 100px;
             line-height: 200px;
             margin-left:-15px;"></i>
           </div>
             <h1>Thank YOU</h1>
             <p>We received your Tracking request;<br/> we'll be in touch shortly!</p>
           </div>
   </center>
</div>
@endsection
