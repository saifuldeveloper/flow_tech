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
                    <h6 class="underline">First Product </h6>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >First Product Name: </label>
                            <strong>{{ $combo->first_product_name }}</strong>
                              
                          </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >First Discount Price: </label>
                            <strong>{{ $combo->first_discount_price }}</strong>
                              
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >First Selling Price: </label>
                            <strong>{{ $combo->first_selling_price }}</strong>
                              
                          </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3 ">
                          <label class="form-label">Image One ( Main Thumbnali):</label><br>
      
                          <label class="custom-file">
     
                              <img src="{{ URL::to($combo->image_one) }}" style="height: 80px; width: 80px;">
                              </label>
          
                      </div>
                  </div>
                    <hr>
                    <h6 class="underline">Second Product </h6>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Second Product Name: </label>
                            <strong>{{ $combo->second_product_name }}</strong>
                              
                          </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Second Discount Price: </label>
                            <strong>{{ $combo->second_discount_price }}</strong>
                              
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Second Selling Price: </label>
                            <strong>{{ $combo->second_selling_price }}</strong>
                              
                          </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                          <label class="form-label">Image Two:</label><br>
                          <label class="custom-file">
                              <img src="{{ URL::to($combo->image_two) }}" style="height: 80px; width: 80px;">
                               </label>
          
                      </div>
                  </div>
                    <hr>
                    <h6 class="underline">Third Product </h6>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >First Product Name: </label>
                            <strong>{{ $combo->first_product_name }}</strong>
                              
                          </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >First Discount Price: </label>
                            <strong>{{ $combo->thrid_discount_price }}</strong>
                              
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >First Selling Price: </label>
                            <strong>{{ $combo->thrid_selling_price }}</strong>
                              
                          </div>
                    </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Image Three:</label><br>
                    <label class="custom-file">
                        <img src="{{ URL::to($combo->image_three) }}" style="height: 80px; width: 80px;">
                 
                         </label>
                </div>
            </div>


    

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