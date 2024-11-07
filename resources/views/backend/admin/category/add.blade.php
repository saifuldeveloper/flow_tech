@extends('master_admin')
@section('title', 'Flowtech BD | Add Category')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')

    <div class="page-header">
        <h3 class="page-title">Add Category</h3>

    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('store.category') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category_name">

                            <span style="color: red;">
                                @error('category_name')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>


                        <div class="form-group mt-3">
                            <label>Category Slug</label><br>
                            <input type="text" name="category_slug"
                                value="{{ old('category_slug') ? old('category_slug') : '' }}" class="form-control" required
                                onkeyup="this.value = slugify(this.value)">

                            <span style="color: red;">
                                @error('category_slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-3">
                            <label>Meta Title</label>
                            <input type="text" class="form-control" name="meta_title">

                            <span style="color: red;">
                                @error('meta_title')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Meta Tag</label><br>
                            <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput">

                            <span style="color: red;">
                                @error('meta_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-3">
                            <label class="form-label">Meta Description</label><br>
                            <textarea class="form-control" name="meta_description" id="" cols="30" rows="10"></textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        {{--
                        <div class="form-group">
                            <label class="form-label">Category Banner Image</label>
                            <input type="file" name="category_banner_img" class="form-control" id="upload_file"
                                onchange="getImagePreview(events)" required>

                            <span class="custom-file-control "></span>
                            <br>
                            <div id="previewone"></div>

                        </div> --}}
                        <div class="form-group mt-3">
                            <label class="form-label">Category Banner Image </label><br>
                            <input type="file" name="category_banner_img" class="form-control " id="upload_file"
                                onchange="getImagePreview7(event)" required>

                            <br>
                            <span class="custom-file-control "></span>

                            <div id="preview_product_banner"></div>

                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label">Category Banner Text</label><br>
                            <textarea class="form-control" name="category_banner_text" id="summernote" cols="30" rows="10"></textarea>

                            <span style="color: red;">
                                @error('category_banner_text')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label">Category Footer Text</label><br>
                            <textarea class="form-control" name="category_footer_text" id="summernote2" cols="30" rows="10"></textarea>

                            <span style="color: red;">
                                @error('category_footer_text')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label">Keyword</label><br>
                            <input type="text" name="keyword" class="form-control" id="keyword" data-role="tagsinput">

                            <span style="color: red;">
                                @error('keyword')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mt-3">
                            <label>Schema Markup</label><br>

                            <textarea class="form-control" id="summernote3" cols="15" rows="15" name="schema_markup" required> </textarea>

                            <span style="color: red;">
                                @error('schema_markup')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>


                        <div class="form-group mt-3">
                            <label class="ckbox">
                                <input type="checkbox" name="featured_category" value="1">
                                <span>Featured Category</span>
                        </div>



                        <div class="form-group mt-2">
                            <label class="form-label">Category Image</label>
                            <input type="file" name="category_img" class="form-control" id="upload_file"
                                onchange="getImagePreview(event)" required>

                            <span class="custom-file-control "></span>
                            <br>
                            <div id="preview"></div>

                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light" href="">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
