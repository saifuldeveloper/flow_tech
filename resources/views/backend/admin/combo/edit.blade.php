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
  
@php
 $category = Illuminate\Support\Facades\DB::table('categories')->get();
 $brand = Illuminate\Support\Facades\DB::table('brands')->get();
 $subcategory = Illuminate\Support\Facades\DB::table('sub_categories')->get();

@endphp

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Edit Product</h3>
     
      </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('update.combo.withoutimg',$combo->id)}}" method="post" enctype="multipart/form-data">
                @csrf 

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Relation Product</label>
                            <select class="form-select" aria-label="Default select example" name="product_id"  >
                                <option disabled selected>  --------------- Select Product Name ------------</option>
                                @foreach ($product as $product )
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                @endforeach
                              </select>
                            <span style="color: red;">
                              @error('product_name')
                                  {{$message}}
                              @enderror
                              </span>
                              
                          </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <hr class="bg-black mt-3">
                      <h4 class="mt-3">First Combo Product : </h4>
                      <div class="col-md-6 ">
                        <div class="form-group">
                            <label > First Product Name</label>
                            <input type="text" class="form-control" name="first_product_name" value="{{$combo->first_product_name}}" required>
          
                            <span style="color: red;">
                              @error('product_name')
                                  {{$message}}
                              @enderror
                              </span>
                              
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Discount Price</label>
                            <input type="text" class="form-control" name="first_discount_price" value="{{$combo->first_discount_price}}" >
          
                            <span style="color: red;">
                              @error('discount_price')
                                  {{$message}}
                              @enderror
                              </span>
                              
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Selling Price</label><br>
                        <input type="text" name="first_selling_price" class="form-control" value="{{$combo->first_selling_price}}" required>
        
                        <span style="color: red;">
                            @error('selling_price')
                                {{$message}}
                            @enderror
                            </span>
        
                        </div>
                    </div>

                    <hr class="bg-black mt-3">
                    <h4 class="mt-3">Second Combo Product : </h4>
                    <div class="col-md-6 ">
                      <div class="form-group">
                          <label > Second Product Name</label>
                          <input type="text" class="form-control" name="second_product_name" value="{{$combo->second_product_name}}" required>
        
                          <span style="color: red;">
                            @error('product_name')
                                {{$message}}
                            @enderror
                            </span>
                            
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label >Discount Price</label>
                          <input type="text" class="form-control" name="second_discount_price" value="{{$combo->second_discount_price}}" >
        
                          <span style="color: red;">
                            @error('second_discount_price')
                                {{$message}}
                            @enderror
                            </span>
                            
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label>Selling Price</label><br>
                      <input type="text" name="second_selling_price" class="form-control" value="{{$combo->second_selling_price}}" required>
      
                      <span style="color: red;">
                          @error('second_selling_price')
                              {{$message}}
                          @enderror
                          </span>
      
                      </div>
                  </div>
 
            <hr class="bg-black mt-3">
            <h4 class="mt-3">Third Combo Product : </h4>
            <div class="col-md-6 ">
              <div class="form-group">
                  <label > Third Product Name</label>
                  <input type="text" class="form-control" name="third_product_name" value="{{$combo->third_product_name}}" required>

                  <span style="color: red;">
                    @error('third_product_name')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label >  Discount Price</label>
                  <input type="text" class="form-control" name="thrid_discount_price" value="{{$combo->thrid_discount_price}}" >

                  <span style="color: red;">
                    @error('thrid_discount_price')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
              <label>Selling Price</label><br>
              <input type="text" name="thrid_selling_price" class="form-control" value="{{$combo->thrid_selling_price}}" required>

              <span style="color: red;">
                  @error('thrid_selling_price')
                      {{$message}}
                  @enderror
                  </span>

              </div>
          </div>

                </div> {{-- end Row  --}}
              
                <button type="submit" class="btn btn-primary mr-2 mt-3">Submit without image</button>
                <a  class="btn btn-danger mt-3" href="">Cancel</a>
              </form>

              <hr>



              <form action="{{ route('update.combo.withimg',$combo->id)}}"  enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mt-5">

                    <div class="col-md-4">
                        <div class="mb-3 ">
                            <label class="form-label">Image One ( Main Thumbnali):</label><br>
                
                            
                            <input type="file" name="image_one" class="form-control" id="logo" accept="image/*" required>
                            <br>
            
                            <img id="logo-preview" src="{{ URL::to($combo->image_one) }}" alt="Brand Logo" style="max-width: 200px;" >
            
                            <div id="preview"></div>
            
                            <input type="hidden" name="old_one" value="{{ $combo->image_one }}">
                
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Image Two:</label><br>

                             <input type="file" name="image_two" class="form-control" id="logo2" accept="image/*">
                            <br>

                            <img id="logo-preview2" src="{{ URL::to($combo->image_two) }}" alt="Brand Logo" style="max-width: 200px;" >

                            <div id="preview2"></div>

                            <input type="hidden" name="old_two" value="{{ $combo->image_two }}">
                
                        </div>
                    </div>
                
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Image Three:</label><br>


                             <input type="file" name="image_three" class="form-control" id="logo3" accept="image/*">
                                <br>

                                <img id="logo-preview3" src="{{ URL::to($combo->image_three) }}" alt="Brand Logo" style="max-width: 200px;" >

                                <div id="preview3"></div>

                                <input type="hidden" name="old_three" value="{{ $combo->image_three }}">
                
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <button type="submit" class="btn btn-primary">Update Image</button>
                                <a  class="btn btn-light" href="">Cancel</a>
                        </div>
                
                
                </div>  {{-- End Row  --}}

             </form>

            </div>
          </div>
        </div>

</div>  {{-- End Row  --}}



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
     document.getElementById('logo').addEventListener('change', function (event) {
            const preview = document.getElementById('logo-preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
            } else {
                preview.src = '{{ URL::to($combo->image_one) }}';
            }
        });
  </script>

<script type="text/javascript">
    document.getElementById('logo2').addEventListener('change', function (event) {
           const preview = document.getElementById('logo-preview2');
           const file = event.target.files[0];

           if (file) {
               preview.src = URL.createObjectURL(file);
           } else {
               preview.src = '{{ URL::to($combo->image_two) }}';
           }
       });
 </script>

<script type="text/javascript">
    document.getElementById('logo3').addEventListener('change', function (event) {
           const preview = document.getElementById('logo-preview3');
           const file = event.target.files[0];

           if (file) {
               preview.src = URL.createObjectURL(file);
           } else {
               preview.src = '{{ URL::to($combo->image_three) }}';
           }
       });
</script>

<script>
    $('#summernote').summernote({

      tabsize: 2,
      height: 100
    });
  </script>
@endsection