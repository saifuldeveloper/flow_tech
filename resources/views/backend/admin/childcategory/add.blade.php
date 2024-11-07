@extends('master_admin')
@section('title', 'Flow Tech BD | Add Child Category')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-header">
        <h3 class="page-title">Add Child Category</h3>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('store.childcategory') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label>Category Name</label>
                            <select class="form-control  select2" name="category_id" required id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label>Subcategory Name</label>
                            <select class="form-control" name="sub_category_id" required id="subcategory_id">
                                <option value="">Select Subcategory </option>

                            </select>
                        </div>


                        <div class="form-group mt-2">
                            <label>Child Category Name</label>
                            <input type="text" class="form-control" name="childcategory_name" required>
                            <span style="color: red;">
                                @error('childcategory_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-2">
                            <label>Child Category Slug</label><br>
                            <input type="text" name="childcategory_slug"
                                value="{{ old('childcategory_slug') ? old('childcategory_slug') : '' }}"
                                class="form-control" required onkeyup="this.value = slugify(this.value)">

                            <span style="color: red;">
                                @error('childcategory_slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Meta Tag</label><br>
                            <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput">

                            <span style="color: red;">
                                @error('meta_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label">Meta Description</label><br>
                            <textarea class="form-control" name="meta_description" id="" cols="30" rows="10"></textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label"> Footer Text</label><br>
                            <textarea class="form-control" name="child_footer_text" id="summernote2" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label">Banner Image </label><br>
                            <input type="file" name="banner_img" class="form-control " id="upload_file"
                                onchange="getImagePreview7(event)" required>

                            <br>
                            <span class="custom-file-control "></span>

                            <div id="preview_product_banner"></div>

                        </div>

                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <input type="file" name="childcategory_img" class="form-control" id="upload_file"
                                onchange="getImagePreview(event)" required>
                            <span class="custom-file-control "></span>
                            <br>
                            <div id="preview"></div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
                        <a class="btn btn-light" href="">Cancel</a>
                    </form>

                </div>
            </div>
        </div>

    @endsection

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            jQuery(document).ready(function($) {
                $('.select2').select2({
                    placeholder: "Select a Category",
                    allowClear: true,
                });

                $('#summernote2').summernote({
                    tabsize: 2,
                    height: 250
                });

                $("#subcategory_id").select2({
                    placeholder: "Select a Subcategory",
                    allowClear: true,
                })

                $("#category_id").on("change", function() {
                    let category_id = $(this).val();

                    $.ajax({
                        url: "/admin/get/subcategory/" + category_id,
                        dataType: 'json',
                        method: 'get',
                        success: function(res) {
                            $("#subcategory_id").html(
                                '<option value="">Select Subcategory</option>');
                            let row = '';

                            $.each(res, function(key, value) {
                                row +=
                                    `<option value="${value.id}">${value.subcategory_name}</option>`;

                            });
                            $("#subcategory_id").html(row);
                        }
                    })
                });

            });
        </script>

        <script type="text/javascript">
            function getImagePreview7(event) {
                var image = URL.createObjectURL(event.target.files[0]);
                var imagediv = document.getElementById('preview_product_banner');
                var newimg = document.createElement('img');
                imagediv.innerHTML = '';
                newimg.src = image;
                newimg.width = "150";
                newimg.height = "150";
                imagediv.appendChild(newimg);
            }
        </script>
    @endpush
