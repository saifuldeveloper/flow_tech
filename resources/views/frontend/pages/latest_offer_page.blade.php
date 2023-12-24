@extends('fontend_master')

@section('content')


{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    <div class="bg-gray content p-tb-30">
      
        <!-- slider section end -->

        <div class="container">
           
            <div class="container">
                <!-- category start -->
               
                
                <!-- category End -->
               
                <!-- product start -->
                <div class="m-product m-home" id="module-481">

                    <h2 class="m-header">Latest Offers</h2>
                   
                    <div class="p-items-wrap">
                        <!-- product item start -->
                        @foreach ($product as $product )
                        <div class="p-item">
                            <div class="p-item-inner">
                                <div class="p-item-img"><a href="{{url('product/details/'.$product->id.'/'.$product->product_name)}}"><img src="{{ asset($product->image_one) }}"
                                            alt="{{$product->product_name}}" width="228" height="228"></a>
                                </div>
                                <div class="p-item-details">
                                    <h4 class="p-item-name"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_name)}}">{{$product->product_name}}</a>
                                    </h4>
                                    <div class="p-item-price">
                                        {{-- <span>{{$product->selling_price}}</span> --}}
                                        <span>{{$product->selling_price}}৳</span>  
                                        <span class="price-old">{{$product->discount_price}}৳</span>   
                                    </div>
                                    <div class="actions">
                                        <a href="" data-id="{{ $product->id}}" class="addcart btn submit-btn " id="button-cart"
                                            style="width: 100%; margin: 5px 0px; background-color: crimson; border: none;">Add
                                            To Cart</a>
                                        <a href="{{route('user.checkout')}}" data-id="{{$product->id}}"  class="buynow btn submit-btn" id="button-cart" style="width: 100%;">Buy
                                            Now</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- product item end -->


                    </div>
                </div>


                <!-- product end -->

              
            </div>
        </div>
        <!-- top reated product section end -->

    </div>
    <!-- product end -->
    
<script type="text/javascript">
    
    $(document).ready(function(){
      $('.addcart').on('click', function(){
        event.preventDefault();
         var id = $(this).data('id');
        // alert(id);

         if (id) {
             $.ajax({
                 url: " {{ url('/add/to/cart/') }}/" + id,
                 type:"GET",
                 dataType:"json",
                 success:function(data){

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "center",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                        });
                        Toast.fire({
                        icon: "success",
                        title: "Add Card Successfully"
                        });
    
              if ($.isEmptyObject(data.error)) {
 
                 Toast.fire({
                   icon: 'success',
                   title: data.success
                 })

              
              }
              else{
                  Toast.fire({
                   icon: 'error',
                   title: data.error
                 })

          
              }
  
 
                 },
             });
 
         }else{
             alert('danger');
         }

      });

      // buy now

      $('.buynow').on('click', function(){
         var id = $(this).data('id');
        // alert(id);

         if (id) {
             $.ajax({
                 url: " {{ url('/add/to/cart/') }}/" + id,
                 type:"GET",
                 dataType:"json",
                 success:function(data){
    
              if ($.isEmptyObject(data.error)) {
 
                 Toast.fire({
                   icon: 'success',
                   title: data.success
                 })

              
              }
              else{
                  Toast.fire({
                   icon: 'error',
                   title: data.error
                 })

          
              }
  
 
                 },
             });
 
         }else{
             alert('danger');
         }

      });
 
    });
 
 
 </script>

@endsection
