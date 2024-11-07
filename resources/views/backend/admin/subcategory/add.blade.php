@extends('master_admin')
@section('title', 'Flowtech BD | Add Subcategory')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')

    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Add Sub Category</h3>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('store.subcategory') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mt-2">
                                <label>Category Name</label>
                                <select class="form-control  select2" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group mb-3 mt-2">
                                <label>Sub Category Name</label>
                                <input type="text" name="subcategory_name" class="form-control">

                                <span style="color: red;">
                                    @error('subcategory_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group mt-2">
                                <label>Sub Category Slug</label><br>
                                <input type="text" name="subcategory_slug"
                                    value="{{ old('subcategory_slug') ? old('subcategory_slug') : '' }}"
                                    class="form-control slug" required onkeyup="this.value = slugify(this.value)">

                                <span style="color: red;">
                                    @error('subcategory_slug')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group mt-2">
                                <label class="form-label">Meta Tag</label><br>
                                <input type="text" name="meta_tag" class="form-control" id="size"
                                    data-role="tagsinput">

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
                                <label class="form-label">Subcategory Footer Text</label><br>
                                <textarea class="form-control" name="subcategory_footer_text" id="summernote2" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group mt-2">
                                <label class="form-label">Banner</label>
                                <input type="file" name="subcategory_banner" class="form-control" id="upload_file"
                                    onchange="getImagePreview7(event)" required>

                                <span class="custom-file-control "></span>
                                <br>
                                <div id="preview_banner"></div>

                            </div>


                            <div class="form-group mt-2">
                                <label class="form-label">Image</label>
                                <input type="file" name="subcategory_img" class="form-control" id="upload_file"
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
        </div>
    @endsection

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript">
            function getImagePreview7(event) {
                var image = URL.createObjectURL(event.target.files[0]);
                var imagediv = document.getElementById('preview_banner');
                var newimg = document.createElement('img');
                imagediv.innerHTML = '';
                newimg.src = image;
                newimg.width = "150";
                newimg.height = "150";
                imagediv.appendChild(newimg);
            }
        </script>

        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select a Category",
                    allowClear: true
                });

                $('#summernote2').summernote({
                    tabsize: 2,
                    height: 250
                });
            });
        </script>
    @endpush
