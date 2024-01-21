@extends('master_admin')


@section('content')
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            /* width: 714px!important; */
            /* height: 65px; */
            /* padding-bottom: 2px!important; */
            margin-top: -13px !important;
            margin-left: -17px !important;
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



    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    @php
        $category = Illuminate\Support\Facades\DB::table('categories')->get();
        $brand = Illuminate\Support\Facades\DB::table('brands')->get();
        $subcategory = Illuminate\Support\Facades\DB::table('sub_categories')->get();
        $childcategory = Illuminate\Support\Facades\DB::table('chlild_categories')->get();

    @endphp

    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Product</h3>

        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('update.product.withoutimg', $product->id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="product_name" required
                                            value="{{ $product->product_name }}">

                                        <span style="color: red;">
                                            @error('product_name')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Code</label>
                                        <input type="text" class="form-control" name="product_code" required
                                            value="{{ $product->product_code }}">

                                        <span style="color: red;">
                                            @error('product_code')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" class="form-control" name="product_quantity" required
                                            value="{{ $product->product_quantity }}">

                                        <span style="color: red;">
                                            @error('product_quantity')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount Price</label>
                                        <input type="text" class="form-control" name="discount_price"
                                            value="{{ $product->discount_price }}">

                                        <span style="color: red;">
                                            @error('discount_price')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2" name="category_id" >

                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}" <?php if ($row->id == $product->category_id) {
                                                    echo 'selected';
                                                } ?>>
                                                    {{ $row->category_name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control select2" name="subcategory_id" >

                                            @foreach ($subcategory as $row)
                                                <option value="{{ $row->id }}" <?php if ($row->id == $product->subcategory_id) {
                                                    echo 'selected';
                                                } ?>>
                                                    {{ $row->subcategory_name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Child Category</label>
                                        <select class="form-control select2" name="childcategory_id" >

                                            @foreach ($childcategory as $row)
                                                <option value="{{ $row->id }}" <?php if ($row->id == $product->childcategory_id) {
                                                    echo 'selected';
                                                } ?>>
                                                    {{ $row->childcategory_name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="form-control select2" name="brand_id" >

                                            @foreach ($brand as $br)
                                                <option value="{{ $br->id }}" <?php if ($br->id == $product->brand_id) {
                                                    echo 'selected';
                                                } ?>>
                                                    {{ $br->brand_name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Availability</label>
                                        <select class="form-control" name="availability" required>
                                            @if ($product->availability)
                                                <option value="{{ $product->availability }}" selected disabled>
                                                    {{ $product->availability }}</option>
                                                <option value="In Stock">In Stock</option>
                                                <option value="Pre Order">Pre Order</option>
                                                <option value="Up Coming">Up Coming</option>
                                            @else
                                                <option value="In Stock">In Stock</option>
                                                <option value="Pre Order">Pre Order</option>
                                                <option value="Up Coming">Up Coming</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Meta tag</label><br>
                                        <input type="text" name="meta_tag" class="form-control" id="size"
                                            data-role="tagsinput" value="{{ $product->meta_tag }}" required>

                                        <span style="color: red;">
                                            @error('meta_tag')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                        <div class="form-group">
                        <label >Product Size</label><br>
                        <input type="text" name="product_size" class="form-control" id="size" data-role="tagsinput" required value="{{ $product->product_size }}">

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
                        <input type="text" name="product_color" class="form-control" id="size" data-role="tagsinput" required value="{{ $product->product_color }}">

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
                                        <input type="text" name="selling_price" class="form-control" required
                                            value="{{ $product->selling_price }}">

                                        <span style="color: red;">
                                            @error('selling_price')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Product Slug</label><br>
                                        <input type="text" name="product_slug" value="{{ $product->product_slug }}" class="form-control" required>

                                        <span style="color: red;">
                                            @error('product_slug')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Meta Description</label><br>
                                        <textarea class="form-control" name="meta_description" id="" cols="30" rows="5">{{ $product->meta_description }} </textarea>

                                        <span style="color: red;">
                                            @error('meta_description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Key Features</label><br>

                                        <textarea class="form-control" id="summernote" cols="15" rows="15" name="product_details" required>{{ $product->product_details }} </textarea>


                                        <span style="color: red;">
                                            @error('product_details')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>What is the Price Section</label><br>

                                        <textarea class="form-control" id="summernote2" cols="15" rows="15" name="what_is_the" required>{{ $product->what_is_the }} </textarea>


                                        <span style="color: red;">
                                            @error('what_is_the')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Specification</label><br>
                                        <textarea class="form-control" id="summernote4" cols="15" rows="15" name="specification" required>{{ $product->specification }} </textarea>
                                        <span style="color: red;">
                                            @error('specification')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>long Description</label><br>

                                        <textarea class="form-control" id="summernote3" cols="15" rows="15" name="long_description" required>{{ $product->long_description }} </textarea>


                                        <span style="color: red;">
                                            @error('long_description')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Video Link</label><br>
                                        <input type="text" name="video_link" class="form-control"
                                            value="{{ $product->video_link }}">

                                        <span style="color: red;">
                                            @error('video_link')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>

                                <br><br>


                                {{--
            <div class="col-md-3 mt-3 mb-3">
                <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1" <?php if ($product->main_slider == 1) {
                        echo 'checked';
                    } ?>>
                    <span>Main Slider</span>
                </div>

                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="hot_deal" value="1" <?php if ($product->hot_deal == 1) {
                            echo 'checked';
                        } ?>>
                        <span>Hot Deal</span>
                </div> --}}

                                {{-- <div class="col-md-3 mt-3 mb-3">
                <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1" <?php if ($product->main_slider == 1) {
                        echo 'checked';
                    } ?>>
                    <span>Latest Offers</span>
                </div>
            </div> --}}

                                <div class="col-md-3 mt-3 mb-3">
                                    <label class="ckbox">
                                        <input type="checkbox" name="main_slider" value="1" <?php if ($product->main_slider == 1) {
                                            echo 'checked';
                                        } ?>>
                                        <span>Latest Offers</span>
                                </div>

                                <div class="col-md-3 mt-3 mb-3">
                                    <label class="ckbox">
                                        <input type="checkbox" name="best_rated" value="1" <?php if ($product->best_rated == 1) {
                                            echo 'checked';
                                        } ?>>
                                        <span>Best Seller Products</span>
                                </div>

                                <div class="col-md-3 mt-3 mb-3">
                                    <label class="ckbox">
                                        <input type="checkbox" name="trend" value="1" <?php if ($product->trend == 1) {
                                            echo 'checked';
                                        } ?>>
                                        <span>Fetured Product</span>
                                </div>



                                {{-- <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="mid_slider" value="1" <?php if ($product->mid_slider == 1) {
                            echo 'checked';
                        } ?>>
                        <span>Mid Slider</span>
                </div>

                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="hot_new" value="1" <?php if ($product->hot_new == 1) {
                            echo 'checked';
                        } ?>>
                        <span>Hot New</span>
                </div>

                <div class="col-md-3 mt-3 mb-3">
                    <label class="ckbox">
                        <input type="checkbox" name="buyone_getone" value="1" <?php if ($product->buyone_getone == 1) {
                            echo 'checked';
                        } ?>>
                        <span>Buyone Getone</span>
                </div> --}}
                {{-- image tag updat --}}
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Product Banner Tag</label>
                        <input type="text" class="form-control" name="product_banner_tag" required
                            value="{{ $product->product_banner_tag }}">

                        <span style="color: red;">
                            @error('product_banner_tag')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Image One Tag</label>
                        <input type="text" class="form-control" name="image_one_tag" required
                            value="{{ $product->image_one_tag }}">

                        <span style="color: red;">
                            @error('image_one_tag')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Image Two Tag</label>
                        <input type="text" class="form-control" name="image_two_tag" required
                            value="{{ $product->image_two_tag }}">

                        <span style="color: red;">
                            @error('image_two_tag')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Image Three Tag</label>
                        <input type="text" class="form-control" name="image_three_tag" required
                            value="{{ $product->image_three_tag }}">

                        <span style="color: red;">
                            @error('image_three_tag')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Image Four Tag</label>
                        <input type="text" class="form-control" name="image_four_tag" required
                            value="{{ $product->image_four_tag }}">

                        <span style="color: red;">
                            @error('image_four_tag')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Image Five Tag</label>
                        <input type="text" class="form-control" name="image_five_tag" required
                            value="{{ $product->image_five_tag }}">

                        <span style="color: red;">
                            @error('image_five_tag')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Image Six Tag</label>
                        <input type="text" class="form-control" name="image_six_tag" required
                            value="{{ $product->image_six_tag }}">

                        <span style="color: red;">
                            @error('image_six_tag')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>





                            </div> {{-- end Row  --}}











                            <button type="submit" class="btn btn-primary mr-2">Update Without Image</button>
                            <a class="btn btn-light" href="">Cancel</a>
                        </form>

                        <hr>

                        <form action="{{ route('update.product.withimg', $product->id) }}" enctype="multipart/form-data"
                            method="post">
                            @csrf

                            <div class="row mt-5">

                                <div class="col-md-12">
                                    <div class="mb-3 ">
                                        <label class="form-label">Product Banner </label><br>


                                        <input type="file" name="product_banner" class="form-control"
                                            id="product_banner_logo" accept="image/*" >
                                        <br>

                                        <img id="product_banner_logo-preview"
                                            src="{{ URL::to($product->product_banner) }}" alt="Banner Image"
                                            style="max-width: 200px;">

                                        <div id="product_banner_logo_preview"></div>

                                        <input type="hidden" name="old_product_banner"
                                            value="{{ $product->product_banner }}">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 ">
                                        <label class="form-label">Image One ( Main Thumbnali):</label><br>


                                        <input type="file" name="image_one" class="form-control" id="logo"
                                            accept="image/*" required>
                                        <br>

                                        <img id="logo-preview" src="{{ URL::to($product->image_one) }}" alt="Brand Logo"
                                            style="max-width: 200px;">

                                        <div id="preview"></div>

                                        <input type="hidden" name="old_one" value="{{ $product->image_one }}">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Image Two:</label><br>

                                        <input type="file" name="image_two" class="form-control" id="logo2"
                                            accept="image/*">
                                        <br>

                                        <img id="logo-preview2" src="{{ URL::to($product->image_two) }}"
                                            alt="Brand Logo" style="max-width: 200px;">

                                        <div id="preview2"></div>

                                        <input type="hidden" name="old_two" value="{{ $product->image_two }}">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Image Three:</label><br>


                                        <input type="file" name="image_three" class="form-control" id="logo3"
                                            accept="image/*">
                                        <br>

                                        <img id="logo-preview3" src="{{ URL::to($product->image_three) }}"
                                            alt="Brand Logo" style="max-width: 200px;">

                                        <div id="preview3"></div>

                                        <input type="hidden" name="old_three" value="{{ $product->image_three }}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Image four:</label><br>


                                        <input type="file" name="image_four" class="form-control" id="logo4"
                                            accept="image/*">
                                        <br>

                                        <img id="logo-preview4" src="{{ URL::to($product->image_four) }}"
                                            alt="Brand Logo" style="max-width: 200px;">

                                        <div id="preview4"></div>

                                        <input type="hidden" name="old_four" value="{{ $product->image_four }}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Image Five:</label><br>


                                        <input type="file" name="image_five" class="form-control" id="logo5"
                                            accept="image/*">
                                        <br>

                                        <img id="logo-preview5" src="{{ URL::to($product->image_five) }}"
                                            alt="Brand Logo" style="max-width: 200px;">

                                        <div id="preview5"></div>

                                        <input type="hidden" name="old_five" value="{{ $product->image_five }}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Image six:</label><br>


                                        <input type="file" name="image_six" class="form-control" id="logo6"
                                            accept="image/*">
                                        <br>

                                        <img id="logo-preview6" src="{{ URL::to($product->image_six) }}"
                                            alt="Brand Logo" style="max-width: 200px;">

                                        <div id="preview6"></div>

                                        <input type="hidden" name="old_six" value="{{ $product->image_six }}">

                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary">Update Image</button>
                                    <a class="btn btn-light" href="">Cancel</a>
                                </div>


                            </div> {{-- End Row  --}}

                        </form>

                    </div>
                </div>
            </div>

        </div> {{-- End Row  --}}



        <script>
            $(".select2").select2();
        </script>

        {{-- <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="category_id"]').on('change', function() {
                    var category_id = $(this).val();
                    if (category_id) {

                        $.ajax({
                            url: "{{ url('/get/subcategory/') }}/" + category_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                var d = $('select[name="subcategory_id"]').empty();
                                $.each(data, function(key, value) {

                                    $('select[name="subcategory_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .subcategory_name + '</option>');

                                });
                            },
                        });

                    } else {
                        alert('danger');
                    }

                });
            });
        </script> --}}
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


{{-- <div class="col-md-4">
    <div class="mb-3 ">
        <label class="form-label">Product Banner </label><br>


        <input type="file" name="product_banner" class="form-control" id="product_banner_logo" accept="image/*" required>
        <br>

        <img id="product_banner_logo_preview" src="{{ URL::to($product->product_banner) }}" alt="Banner Image" style="max-width: 200px;" >

        <div id="preview"></div>

        <input type="hidden" name="old_product_banner" value="{{ $product->product_banner }}">

    </div>
</div> --}}
        <script type="text/javascript">
            document.getElementById('product_banner_logo').addEventListener('change', function(event) {
                const preview = document.getElementById('product_banner_logo_preview');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($product->product_banner) }}';
                }
            });
        </script>

        <script type="text/javascript">
            document.getElementById('logo').addEventListener('change', function(event) {
                const preview = document.getElementById('logo-preview');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($product->image_one) }}';
                }
            });
        </script>

        <script type="text/javascript">
            document.getElementById('logo2').addEventListener('change', function(event) {
                const preview = document.getElementById('logo-preview2');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($product->image_two) }}';
                }
            });
        </script>

        <script type="text/javascript">
            document.getElementById('logo3').addEventListener('change', function(event) {
                const preview = document.getElementById('logo-preview3');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($product->image_three) }}';
                }
            });
        </script>
        <script type="text/javascript">
            document.getElementById('logo4').addEventListener('change', function(event) {
                const preview = document.getElementById('logo-preview4');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($product->image_four) }}';
                }
            });
        </script>
        <script type="text/javascript">
            document.getElementById('logo5').addEventListener('change', function(event) {
                const preview = document.getElementById('logo-preview5');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($product->image_five) }}';
                }
            });
        </script>
        <script type="text/javascript">
            document.getElementById('logo6').addEventListener('change', function(event) {
                const preview = document.getElementById('logo-preview6');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($product->image_six) }}';
                }
            });
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
