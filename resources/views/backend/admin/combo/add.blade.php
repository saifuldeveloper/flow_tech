@extends('master_admin')


@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <h3 class="page-title">Add Product</h3>
     
      </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('add.combo')}}" method="post" enctype="multipart/form-data">
                @csrf 

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                        <label >Relation Product</label>
                        <select class="form-select" aria-label="Default select example" name="product_id">
                            <option disabled selected>-------------------- Select Product Name -----------</option>
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
                 <div class="col-md-12">
                   <div class="row">
                    <div class="col-md-6">
                      <hr class="bg-black mt-3">
                      <h4 class="mt-3"> Add Combo Product : </h4>
                      <Button class="btn btn-primary mb-3" id="click">Add more</Button> <span class="fw-bold text-danger text-center">You Must be added only 3 Item <span class="text-success">*</span></span>
                    </div>
                   </div>
                 </div>
                <div class="col-md-12">
                     <div class="row">
                      <div id="tripleSystem">

                      </div>
                     </div>
                </div>
              
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary mr-2" id="submit" disabled>Submit</button>
                  <a  class="btn btn-light" href="" >Cancel</a>
                </div>
              </form>

            </div>
          </div>
        </div>

</div>


<script>
    $(".select2").select2();
  
  </script>

<script type="text/javascript">
    $(document).ready(function(){
      var count =0;
      $("#click").click(function () {

        if(count<=3){
// Create a new set of form fields dynamically
var newFields = $(`<h5>${count+1} . Combo Added Field</h5>`+
      '<div class="col-md-6">' +
      '<div class="form-group">' +
      '<label>Product Name</label>' +
      '<input type="text" class="form-control" name="first_product_name[]" required>' +
      '<span style="color: red;">' +
      '@error("product_name")' +
      '{{$message}}' +
      '@enderror' +
      '</span>' +
      '</div>' +
      '</div>' +
      '<div class="col-md-6">' +
      '<div class="form-group">' +
      '<label>Discount Price</label>' +
      '<input type="text" class="form-control" name="first_discount_price[]" required>' +
      '<span style="color: red;">' +
      '@error("product_name")' +
      '{{$message}}' +
      '@enderror' +
      '</span>' +
      '</div>' +
      '</div>' +
      '<div class="col-md-6">' +
      '<div class="form-group">' +
      '<label>Selling Price</label>' +
      '<input type="text" class="form-control" name="first_selling_price[]" required>' +
      '<span style="color: red;">' +
      '@error("product_name")' +
      '{{$message}}' +
      '@enderror' +
      '</span>' +
      '</div>' +
      '</div>' +
      '<div class="col-md-6 mb-4">' +
      '<div class="form-group">' +
      '<label>Product Name</label>' +
      '<input type="file"  name="image_one[]" class="form-control " id="upload_file" onchange="getImagePreview(event)" required>' +
      '<span style="color: red;">' +
      '@error("product_name")' +
      '{{$message}}' +
      '@enderror' +
      '</span>' +
      '</div>' +
      '</div>' +
      '</div>');

    // Append the new fields to #tripleSystem
    $("#tripleSystem").append(newFields);
    count++;
     if(count==3){
          $("#click").prop('disabled', true);
          $("#submit").prop('disabled', false);
        }
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