@extends('master_admin')


@section('content')

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        /* width: 714px!important; */
        /* height: 65px; */
        /* padding-bottom: 2px!important; */
        margin-top: -13px!important;
        margin-left: -17px!important;
    }

    .bootstrap-tagsinput .tag {
  background: rgb(6, 146, 221);
  border: 1px solid black;
  padding: 0 6px;
  margin-right: 2px;
  color: white;
  border-radius: 4px;
}

    </style>



<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Details Product</h3>
     
      </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
          
            

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Product Name: </label>
                            <strong>{{ $product->product_name }}</strong>
                              
                          </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Product Code: </label>
                            <strong>{{ $product->product_code }}</strong>
                              
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Quantity: </label>
                            <strong>{{ $product->product_quantity }}</strong>
                              
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Discount Price: </label>
                            <strong>{{ $product->discount_price }}</strong>
                              
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Category: </label>
                            {{ $product->category_name }}
                              
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Sub Category: </label>
                            <strong>{{ $product->subcategory_name }}</strong>
                              
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Brand: </label>
                            <strong>{{ $product->brand_name }}</strong>
                              
                          </div>
                    </div>

                    <div class="col-md-6"></div>

                    {{-- <div class="col-md-4">
                        <div class="form-group">
                        <label >Product Size: </label><br>
                        <strong>{{ $product->product_size }}</strong>
        
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                        <label >Product Color: </label><br>
                        <strong>{{ $product->product_color }}</strong>
        
                        </div>
                    </div> --}}

                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Selling Price: </label><br>
                        <strong>{{ $product->selling_price }}</strong>
        
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Product Availability </label><br>
                        <strong>{{ $product->availability }}</strong>
        
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label >Product Details: </label><br>
                   
                        <p>   {!! $product->product_details !!} </p>
        
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label >Video Link</label><br>
                        <strong>{{ $product->video_link }}</strong>
        
                        </div>
                    </div> 

                    <br><br>

                    <div class="col-md-4">
                        <div class="mb-3 ">
                            <label class="form-label">Image One ( Main Thumbnali):</label><br>
        
                            <label class="custom-file">
       
                                <img src="{{ URL::to($product->image_one) }}" style="height: 80px; width: 80px;">
                                </label>
            
                        </div>
                    </div>

                    
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Image Two:</label><br>
                    <label class="custom-file">
                        <img src="{{ URL::to($product->image_two) }}" style="height: 80px; width: 80px;">
                         </label>
    
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Image Three:</label><br>
                    <label class="custom-file">
                        <img src="{{ URL::to($product->image_three) }}" style="height: 80px; width: 80px;">
                 
                         </label>
                </div>
            </div>

            {{-- <div class="col-md-3 mt-5 mb-3">
                <label class="ckbox">
                    @if($product->main_slider == 1)
                    <span class="badge badge-success">Active</span>
           
                    @else
                  <span class="badge badge-danger">Inactive</span>
                    @endif 
                    <span>Main Slider</span>
                </div>

                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        @if($product->hot_deal == 1)
                        <span class="badge badge-success">Active</span>
               
                        @else
                      <span class="badge badge-danger">Inactive</span>
                        @endif 
                        <span>Hot Deal</span>
                </div> --}}
    
                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        @if($product->best_rated == 1)
                        <span class="badge badge-success">Active</span>
               
                        @else
                      <span class="badge badge-danger">Inactive</span>
                        @endif 
                        <span>Best Seller Products</span>
                </div>
    
                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <label class="ckbox">
                            @if($product->trend == 1)
                     <span class="badge badge-success">Active</span>
            
                     @else
                   <span class="badge badge-danger">Inactive</span>
                     @endif 
                        <span>Fetured Product</span>
                </div>
    
               
    
                {{-- <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        @if($product->mid_slider == 1)
                <span class="badge badge-success">Active</span>
       
                @else
              <span class="badge badge-danger">Inactive</span>
                @endif 
                        <span>Mid Slider</span>
                </div>
    
                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        @if($product->hot_new == 1)
                        <span class="badge badge-success">Active</span>
               
                        @else
                      <span class="badge badge-danger">Inactive</span>
                        @endif 
                        <span>Hot New</span>
                </div>
    
                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        @if($product->buyone_getone == 1)
                        <span class="badge badge-success">Active</span>
               
                        @else
                      <span class="badge badge-danger">Inactive</span>
                        @endif 
                        <span>Buyone Getone</span>
                </div>
     --}}

                </div> {{-- end Row  --}}

            

                 

              
               
              

            </div>
          </div>
        </div>

</div>


<script>
    $(".select2").select2();
  
  </script>

<script type="text/javascript">
    $(document).ready(function(){
   $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if (category_id) {
          
          $.ajax({
            url: "{{ url('/get/subcategory/') }}/"+category_id,
            type:"GET",
            dataType:"json",
            success:function(data) { 
            var d =$('select[name="subcategory_id"]').empty();
            $.each(data, function(key, value){
            
            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

            });
            },
          });

        }else{
          alert('danger');
        }

          });
    });

</script>
  

  <script type="text/javascript">
    function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="150";
    newimg.height="150";
    imagediv.appendChild(newimg);
  }
  </script>

<script type="text/javascript">
  function getImagePreview1(event)
{
  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview1');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="150";
  newimg.height="150";
  imagediv.appendChild(newimg);
}
</script>

<script type="text/javascript">
  function getImagePreview2(event)
{
  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview2');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="150";
  newimg.height="150";
  imagediv.appendChild(newimg);
}
</script>

<script>
    $('#summernote').summernote({

      tabsize: 2,
      height: 100
    });
  </script>
@endsection