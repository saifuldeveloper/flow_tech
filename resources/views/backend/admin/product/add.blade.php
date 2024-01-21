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
        <h3 class="page-title">Add Product</h3>

      </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <form class="forms-sample" action="{{ route('store.product')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Product Name</label>
                            <input type="text" class="form-control" name="product_name" required>

                            <span style="color: red;">
                              @error('product_name')
                                  {{$message}}
                              @enderror
                              </span>

                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- <label >Product Code</label> --}}
                            <label >SKU</label>
                            <input type="text" class="form-control" name="product_code" required>

                            <span style="color: red;">
                              @error('product_code')
                                  {{$message}}
                              @enderror
                              </span>

                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Quantity</label>
                            <input type="text" class="form-control" name="product_quantity" required>

                            <span style="color: red;">
                              @error('product_quantity')
                                  {{$message}}
                              @enderror
                              </span>

                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Discount Price</label>
                            <input type="text" class="form-control" name="discount_price" >

                            <span style="color: red;">
                              @error('discount_price')
                                  {{$message}}
                              @enderror
                              </span>

                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Category</label>
                            <select  class="form-control select2"   name="category_id" required>
                              @foreach($category as $row)
                              <option value="{{ $row->id }}"> {{ $row->category_name }}  </option>
                              @endforeach

                               </select>

                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Sub Category</label>
                            <select  class="form-control select2"   name="subcategory_id" required>
                                @foreach($subCategory as $row)
                                <option value="{{ $row->id }}"> {{ $row->subcategory_name }}  </option>
                                @endforeach

                               </select>

                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Child Category</label>
                            <select  class="form-control select2"   name="childcategory_id" required>

                                @foreach($childCategory as $row)
                                <option value="{{ $row->id }}"> {{ $row->childcategory_name }}  </option>
                                @endforeach
                               </select>

                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Brand</label>
                            <select  class="form-control select2"   name="brand_id" required>

                                @foreach($brand  as $br)
                                <option value="{{ $br->id }}"> {{ $br->brand_name }}  </option>
                                @endforeach

                               </select>

                          </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label >Product Availability</label>
                          <select  class="form-control" name="availability" required>
                           <option value="" disabled selected >-------------Select Availability ------------ </option>
                           <option value="In Stock" >In Stock</option>
                           <option value="Pre Order" >Pre Order</option>
                           <option value="Up Coming" >Up Coming</option>
                          </select>

                        </div>
                  </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Meta tag</label><br>
                                <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput" required>

                                <span style="color: red;">
                                    @error('meta_tag')
                                        {{$message}}
                                    @enderror
                                </span>

                            </div>
                        </div>


                    {{-- <div class="col-md-4">
                        <div class="form-group">
                        <label >Product Size</label><br>
                        <input type="text" name="product_size" class="form-control" id="size" data-role="tagsinput" required>

                        <span style="color: red;">
                            @error('product_size')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div> --}}

                    {{-- <div class="col-md-4">
                        <div class="form-group">
                        <label >Product Color</label><br>
                        <input type="text" name="product_color" class="form-control" id="size" data-role="tagsinput" required>

                        <span style="color: red;">
                            @error('product_color')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div> --}}

                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Selling Price</label><br>
                        <input type="text" name="selling_price" class="form-control" required>

                        <span style="color: red;">
                            @error('selling_price')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Product Slug</label><br>
                            <input type="text" name="product_slug" value="{{ old('product_slug') ? old('product_slug') : '' }}" class="form-control" required onkeyup="this.value = slugify(this.value)">

                            <span style="color: red;">
                                @error('product_slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    {{--
    Catalouge
    Drivers
    Firmware
    Manual
 --}}
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Catalouge</label><br>
                        <input type="file" name="catalouge" class="form-control" accept=".pdf">

                        <span style="color: red;">
                            @error('catalouge')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Drivers</label><br>
                        <input type="file" name="drivers" class="form-control" accept=".pdf">

                        <span style="color: red;">
                            @error('drivers')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Firmware Link*</label><br>
                        <input type="text" name="firmware" class="form-control" >

                        <span style="color: red;">
                            @error('firmware')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Manual Link*</label><br>
                        <input type="text" name="manual" class="form-control" >

                        <span style="color: red;">
                            @error('manual')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>

                    {{-- <div class="col-md-4">
                        <div class="form-group">
                        <label>Product Slug</label><br>
                        <input type="{{Str::slug(text)}}"  name="slug" class="form-control" required>

                        <span style="color: red;">
                            @error('slug')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" >Meta Description</label><br>
                             <textarea class="form-control" name="meta_description" id="" cols="30" rows="5"></textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{$message}}
                                @enderror
                                </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label >Key Features</label><br>

                        <textarea class="form-control" id="summernote" cols="15" rows="15" name="product_details" required> </textarea>


                        <span style="color: red;">
                            @error('product_details')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label >What is the Price Section</label><br>

                        <textarea class="form-control" id="summernote2" cols="15" rows="15" name="what_is_the" required> </textarea>


                        <span style="color: red;">
                            @error('what_is_the')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label >Specification</label><br>

                        <textarea class="form-control" id="summernote3" cols="15" rows="15" name="specification" required> </textarea>


                        <span style="color: red;">
                            @error('specification')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label >long Description</label><br>

                        <textarea class="form-control" id="summernote4" cols="15" rows="15" name="long_description" required> </textarea>


                        <span style="color: red;">
                            @error('long_description')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label >Video Link</label><br>
                        <input type="text" name="video_link" class="form-control" >

                        <span style="color: red;">
                            @error('video_link')
                                {{$message}}
                            @enderror
                            </span>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label class="form-label">Product Banner</label><br>
                            <input type="file"  name="product_banner" class="form-control " id="upload_file" onchange="getImagePreview7(event)" required >

                            <br>
                            <span class="custom-file-control "></span>

                            <div id="preview_product_banner"></div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Product Banner Tag</label>
                            <input type="text" class="form-control" name="product_banner_tag" required>

                            <span style="color: red;">
                              @error('product_banner_tag')
                                  {{$message}}
                              @enderror
                              </span>

                          </div>
                    </div>
                    <hr>

                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label class="form-label">Image One ( Main Thumbnali):</label><br>


                            <input type="file"  name="image_one" class="form-control " id="upload_file" onchange="getImagePreview(event)" required>

                            <br>
                            <span class="custom-file-control "></span>

                            <div id="preview"></div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Image One Tag</label>
                            <input type="text" class="form-control" name="image_one_tag" required>

                            <span style="color: red;">
                              @error('image_one_tag')
                                  {{$message}}
                              @enderror
                              </span>

                          </div>
                    </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Image Two:</label><br>
                    <input type="file"  name="image_two" class="form-control" id="upload_file" onchange="getImagePreview1(event)" >

                    <span class="custom-file-control"></span>
                    <div id="preview1"></div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >Image Two Tag</label>
                    <input type="text" class="form-control" name="image_two_tag" required>

                    <span style="color: red;">
                      @error('image_two_tag')
                          {{$message}}
                      @enderror
                      </span>

                  </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Image Three:</label><br>
                    <input type="file"  name="image_three" class="form-control" id="upload_file" onchange="getImagePreview3(event)"   >

                    <span class="custom-file-control"></span>
                    <div id="preview3"></div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >Image Three Tag</label>
                    <input type="text" class="form-control" name="image_three_tag" required>

                    <span style="color: red;">
                      @error('image_three_tag')
                          {{$message}}
                      @enderror
                      </span>

                  </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Image Four:</label><br>
                    <input type="file"  name="image_four" class="form-control" id="upload_file" onchange="getImagePreview4(event)"   >

                    <span class="custom-file-control"></span>
                    <div id="preview4"></div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >Image Four Tag</label>
                    <input type="text" class="form-control" name="image_four_tag" required>

                    <span style="color: red;">
                      @error('image_four_tag')
                          {{$message}}
                      @enderror
                      </span>

                  </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Image Five:</label><br>
                    <input type="file"  name="image_five" class="form-control" id="upload_file" onchange="getImagePreview5(event)"   >

                    <span class="custom-file-control"></span>
                    <div id="preview5"></div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >Image Five Tag</label>
                    <input type="text" class="form-control" name="image_five_tag" required>

                    <span style="color: red;">
                      @error('image_five_tag')
                          {{$message}}
                      @enderror
                      </span>

                  </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Image Six:</label><br>
                    <input type="file"  name="image_six" class="form-control" id="upload_file" onchange="getImagePreview6(event)"   >

                    <span class="custom-file-control"></span>
                    <div id="preview6"></div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >Image Six Tag</label>
                    <input type="text" class="form-control" name="image_six_tag" required>

                    <span style="color: red;">
                      @error('image_six_tag')
                          {{$message}}
                      @enderror
                      </span>

                  </div>
            </div>


            <div class="col-md-3 mt-3 mb-3">
                <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1">
                    <span>Latest Offers</span>
                </div>

                {{-- <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="hot_deal" value="1">
                        <span>Hot Deal</span>
                </div> --}}

                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="best_rated" value="1">
                        <span>Best Seller Products</span>
                </div>

                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="trend" value="1">
                        <span>Fetured Product</span>
                </div>


{{--
                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="mid_slider" value="1">
                        <span>Mid Slider</span>
                </div> --}}

                {{-- <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="hot_new" value="1">
                        <span>Hot New</span>
                </div> --}}
{{--
                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="buyone_getone" value="1">
                        <span>Buyone Getone</span>
                </div> --}}


                </div> {{-- end Row  --}}








                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a  class="btn btn-light" href="">Cancel</a>
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
   $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if (category_id) {

          $.ajax({
            url: "{{ url('get/subcategory/') }}/"+category_id,
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
    $(document).ready(function(){
   $('select[name="subcategory_id"]').on('change',function(){
        var subcategory_id = $(this).val();
        if (subcategory_id) {

          $.ajax({
            url: "{{ url('get/childcategory/') }}/"+subcategory_id,
            type:"GET",
            dataType:"json",
            success:function(data) {

                console.log(data);
            var d =$('select[name="childcategory_id"]').empty();
            $.each(data, function(key, value){

            $('select[name="childcategory_id"]').append('<option value="'+ value.id + '">' + value.childcategory_name + '</option>');

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

<script type="text/javascript">
  function getImagePreview3(event)
{
  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview3');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="150";
  newimg.height="150";
  imagediv.appendChild(newimg);
}
</script>

<script type="text/javascript">
  function getImagePreview4(event)
{
  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview4');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="150";
  newimg.height="150";
  imagediv.appendChild(newimg);
}
</script>

<script type="text/javascript">
  function getImagePreview5(event)
{
  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview5');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="150";
  newimg.height="150";
  imagediv.appendChild(newimg);
}
</script>
<script type="text/javascript">
  function getImagePreview6(event)
{
  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview6');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="150";
  newimg.height="150";
  imagediv.appendChild(newimg);
}
</script>


<script type="text/javascript">
    function getImagePreview7(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview_product_banner');
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

<script>
    $('#summernote2').summernote({

      tabsize: 2,
      height: 100
    });
  </script>
<script>
    $('#summernote3').summernote({

      tabsize: 2,
      height: 100
    });
  </script>
<script>
    $('#summernote4').summernote({

      tabsize: 2,
      height: 100
    });
  </script>
  <script>
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }

    document.addEventListener('DOMContentLoaded', function() {
        const slugInput = document.querySelector('input[name="product_slug"]');
        slugInput.addEventListener('keyup', function() {
            this.value = slugify(this.value);
        });
    });
</script>
@endsection
