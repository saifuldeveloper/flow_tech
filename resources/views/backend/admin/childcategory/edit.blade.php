@extends('master_admin')
@section('title', 'Flow Tech BD | Edit Child Category')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-header">
        <h3 class="page-title">Edit Child Category</h3>

    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('update.childcategory', $childCategories->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mt-2">
                            <label>Category Name</label>
                            <select class="form-control select2" name="category_id" id="category_id" required>
                                @foreach ($categories as $row)
                                    <option value="{{ $row->id }}"
                                        {{ $childCategories->category_id == $row->id ? 'selected' : '' }}>
                                        {{ $row->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label>Subcategory Name</label>
                            <select class="form-control" name="sub_category_id" id="sub_category_id" required>
                                @foreach ($subcategories as $row)
                                    <option value="{{ $row->id }}"
                                        {{ $childCategories->sub_category_id == $row->id ? 'selected' : '' }}>
                                        {{ $row->subcategory_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group mt-2">
                            <label>Child Category Name</label>
                            <input type="text" class="form-control" name="childcategory_name"
                                value="{{ $childCategories->childcategory_name }}">
                            <span style="color: red;">
                                @error('childcategory_name')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                        <div class="form-group mt-2">
                            <label>Child Category Slug</label>
                            <input type="text" class="form-control" name="childcategory_slug"
                                value="{{ $childCategories->childcategory_slug }}"
                                onkeyup="this.value = slugify(this.value)">

                            <span style="color: red;">
                                @error('childcategory_slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group mt-2">
                            <label class="form-label">Meta Tag</label><br>
                            <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput"
                                value="{{ $childCategories->meta_tag }}">

                            <span style="color: red;">
                                @error('meta_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-label">Meta Description</label><br>
                            <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $childCategories->meta_description }}</textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label"> Footer Text</label><br>
                            <textarea class="form-control" name="child_footer_text" id="summernote2" cols="30" rows="10">{{ $childCategories->child_footer_text }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Banner Img</label>
                            <input type="file" name="banner_img" class="form-control" id="banner_img" accept="image/*">

                            <br>
                            <img id="banner-preview" src="{{ URL::to($childCategories->childcategory_banner) }}"
                                alt=" banner" style="max-width: 200px;" required>

                            <input type="hidden" name="old_banner_img"
                                value="{{ $childCategories->childcategory_banner }}">

                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="childcategory_img" class="form-control" id="logo"
                                accept="image/*">

                            <br>
                            <img id="logo-preview" src="{{ URL::to($childCategories->childcategory_img) }}"
                                alt="Brand Logo" style="max-width: 200px;" required>

                            <input type="hidden" name="old_logo" value="{{ $childCategories->childcategory_img }}">

                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a class="btn btn-light" href="">Cancel</a>
                    </form>

                </div>
            </div>
        </div>




    @endsection

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript">
            document.getElementById('logo').addEventListener('change', function(event) {
                const preview = document.getElementById('logo-preview');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($childCategories->childcategory_img) }}';
                }
            });
        </script>

        <script>
            $('#summernote2').summernote({
                tabsize: 2,
                height: 250
            });
        </script>

        <script type="text/javascript">
            document.getElementById('banner_img').addEventListener('change', function(event) {
                const preview = document.getElementById('banner-preview');
                const file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = '{{ URL::to($childCategories->childcategory_banner) }}';
                }
            });
        </script>

        <script>
            jQuery(document).ready(function($) {
                jQuery('#category_id').change(function() {
                    var categoryID = $(this).val();
                    if (categoryID) {
                        $.ajax({
                            url: '/get/subcategory/' + categoryID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {

                                $('select[name="sub_category_id"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="sub_category_id"]').append(
                                        '<option value="' +
                                        value.id + '">' + value.subcategory_name +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="sub_category_id"]').empty();
                    }
                });
            });
        </script>
    @endpush
