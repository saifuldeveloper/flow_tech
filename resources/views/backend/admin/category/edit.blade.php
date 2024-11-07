@extends('master_admin')
@section('title', 'Flowtech BD | Edit Category')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')


    <div class="page-header">
        <h3 class="page-title">Edit Category</h3>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('update.category', $categories->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category_name"
                                value="{{ $categories->category_name }}">

                            <span style="color: red;">
                                @error('category_name')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="form-group">
                            <label>Category Slug</label>
                            <input type="text" class="form-control slug" name="category_slug"
                                value="{{ $categories->category_slug }}" onkeyup="this.value = slugify(this.value)">

                            <span style="color: red;">
                                @error('category_slug')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" class="form-control" name="meta_title"
                                value="{{ $categories->meta_title }}">

                            <span style="color: red;">
                                @error('meta_title')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Tag</label><br>
                            <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput"
                                value="{{ $categories->meta_tag }}">

                            <span style="color: red;">
                                @error('meta_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Description</label><br>
                            <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $categories->meta_description }}</textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group mb-3">
                            <label class="form-label">Category Banner Image</label>
                            <input type="file" name="category_banner_img" class="form-control"
                                onchange="previewImage('banner')" id="logo1" accept="image/*">

                            <br>
                            <img id="banner_preview" src="{{ URL::to($categories->category_banner_img) }}" alt="Banner"
                                style="max-width: 200px;" required>

                            <input type="hidden" name="old_logo1" value="{{ $categories->category_banner_img }}">

                        </div>
                        {{-- <div class="form-group">
                    <label class="form-label">Category Banner Image </label><br>


                    <input type="file" name="category_banner_img" class="form-control"
                        id="product_banner_logo" accept="image/*" >
                    <br>

                    <img id="product_banner_logo-preview"
                        src="{{ URL::to($categories->category_banner_img) }}" alt="Banner Image"
                        style="max-width: 200px;">

                    <div id="product_banner_logo_preview"></div>

                    <input type="hidden" name="old_logo1"
                        value="{{ $categories->category_banner_img }}">

                </div> --}}

                        <div class="form-group">
                            <label class="form-label">Category Banner Text</label><br>
                            <textarea class="form-control" name="category_banner_text" id="summernote" cols="30" rows="10">{{ $categories->category_banner_text }}</textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category Footer Text</label><br>
                            <textarea class="form-control" name="category_footer_text" id="summernote2" cols="30" rows="10">{{ $categories->category_footer_text }}</textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Keyword</label><br>
                            <input type="text" name="keyword" class="form-control" id="size" data-role="tagsinput"
                                value="{{ $categories->keyword }}">

                            <span style="color: red;">
                                @error('keyword')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Schema Markup</label><br>

                            <textarea class="form-control" id="summernote3" cols="15" rows="15" name="schema_markup" required> {{ $categories->schema_markup }}</textarea>

                            <span style="color: red;">
                                @error('schema_markup')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                        <div class="form-group mt-3">
                            <label class="ckbox">
                                <input type="checkbox" name="featured_category" value="1"
                                    {{ $categories->featured_category == '1' ? 'checked' : '' }}>
                                <span>Featured Category</span>
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <label class="form-label">Category Image</label>
                            <input type="file" name="category_img" class="form-control"
                                onchange="previewImage('logo')" id="logo" accept="image/*">

                            <br>
                            <img id="logo-preview" src="{{ URL::to($categories->category_img) }}" alt="Brand Logo"
                                style="max-width: 200px;" required>

                            <input type="hidden" name="old_logo" value="{{ $categories->category_img }}">

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
        <script>
            function previewImage(item) {
                const img_preview = document.getElementById('logo-preview');
                const banner_preview = document.getElementById('banner_preview');
                const file = event.target.files[0];

                if (file) {
                    if (item == 'banner') {
                        banner_preview.src = URL.createObjectURL(file);
                    } else {
                        img_preview.src = URL.createObjectURL(file);
                    }
                } else {
                    if (item == 'banner') {
                        banner_preview.src = '{{ URL::to($categories->category_banner_img) }}';
                    } else {
                        img_preview.src = '{{ URL::to($categories->category_img) }}';
                    }
                }

            }
        </script>
        <script>
            $(".select2").select2({
                placeholder: "Select a Category",
                allowClear: true
            });
        </script>

        <script>
            $('#summernote').summernote({
                tabsize: 2,
                height: 100
            });

            $('#summernote2').summernote({
                tabsize: 2,
                height: 100
            });

            $('#summernote3').summernote({
                tabsize: 2,
                height: 100
            });
        </script>
    @endpush
