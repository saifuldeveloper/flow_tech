@extends('master_admin')


@section('content')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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

                        <div class="form-group">
                            <label>Category Slug</label><br>
                            <input type="text" name="category_slug" value="{{ old('category_slug') ? old('category_slug') : '' }}"
                                class="form-control" required onkeyup="this.value = slugify(this.value)">

                            <span style="color: red;">
                                @error('category_slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Tag</label><br>
                            <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput">

                            <span style="color: red;">
                                @error('meta_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
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
                        <div class="form-group">
                            <label class="form-label">Category Banner Image </label><br>
                            <input type="file"  name="category_banner_img" class="form-control " id="upload_file" onchange="getImagePreview7(event)" required >

                            <br>
                            <span class="custom-file-control "></span>

                            <div id="preview_product_banner"></div>

                        </div>
                        <div class="form-group">
                            <label class="form-label">Category Banner Text</label><br>
                            <textarea class="form-control" name="category_banner_text" id="summernote" cols="30" rows="10"></textarea>

                            <span style="color: red;">
                                @error('category_banner_text')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category Footer Text</label><br>
                            <textarea class="form-control" name="category_footer_text" id="summernote2" cols="30" rows="10"></textarea>

                            <span style="color: red;">
                                @error('category_footer_text')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>



                        <div class="form-group">
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

        <script type="text/javascript">
            function getImagePreview(event) {
                var image = URL.createObjectURL(event.target.files[0]);
                var imagediv = document.getElementById('preview');
                var newimg = document.createElement('img');
                imagediv.innerHTML = '';
                newimg.src = image;
                newimg.width = "150";
                newimg.height = "150";
                imagediv.appendChild(newimg);
            }
        </script>
        <script>
            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-') // Replace spaces with -
                    .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                    .replace(/\-\-+/g, '-') // Replace multiple - with single -
                    .replace(/^-+/, '') // Trim - from start of text
                    .replace(/-+$/, ''); // Trim - from end of text
            }

            document.addEventListener('DOMContentLoaded', function() {
                const slugInput = document.querySelector('input[name="category_slug"]');
                slugInput.addEventListener('keyup', function() {
                    this.value = slugify(this.value);
                });
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
    @endsection
