@extends('master_admin')


@section('content')
    <div class="page-header">
        <h3 class="page-title">Details Category</h3>

    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">



                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="category_name" readonly
                            value="{{ $categories->category_name }}">

                        <span style="color: red;">
                            @error('category_name')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div class="form-group">
                        <label class="form-label">Category Slug</label><br>
                        <input type="text" name="category_slug" class="form-control"
                            value="{{ $categories->category_slug }}">

                        <span style="color: red;">
                            @error('category_slug')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Tag</label><br>
                        <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput"
                            readonly value="{{ $categories->meta_tag }}">

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
                    <div class="form-group">
                        <label class="form-label">Category Banner Image </label><br>
                        {{-- <input type="file"  name="category_banner_img" class="form-control " id="upload_file" onchange="getImagePreview7(event)" required > --}}

                        <br>
                        <img id="logo-preview" src="{{ URL::to($categories->category_banner_img) }}" alt="Brand Logo"
                                style="max-width: 400px;" required>


                    </div>
                    <div class="form-group">
                        <label class="form-label">Category Banner Text</label><br>
                        <textarea class="form-control" name="category_banner_text" id="summernote" cols="30" rows="10">
                            {{ $categories->category_banner_text }}
                        </textarea>

                        <span style="color: red;">
                            @error('category_banner_text')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category Footer Text</label><br>
                        <textarea class="form-control" name="category_footer_text" id="summernote2" cols="30" rows="10">
                            {{ $categories->category_footer_text }}
                        </textarea>

                        <span style="color: red;">
                            @error('category_footer_text')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <center>
                        <div class="form-group">
                            <label class="form-label">Category Image</label>
                            <br>

                            <img id="logo-preview" src="{{ URL::to($categories->category_img) }}" alt="Brand Logo"
                                style="max-width: 400px;" required>

                        </div>
                    </center>
                </div>
            </div>
        </div>
    @endsection
