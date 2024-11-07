@extends('master_admin')
@section('title', 'Flowtech BD | Edit Subcategory')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('content')

    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Sub Category</h3>

        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('update.subcategory', $subcat->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mt-2">
                                <label>Category Name</label>
                                <select class="form-control select2" name="category_id" required>

                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="form-group mt-2">
                                <label>Sub Category Name</label>
                                <input type="text" name="subcategory_name" class="form-control"
                                    value="{{ $subcat->subcategory_name }}" required>

                                <span style="color: red;">
                                    @error('subcategory_name')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="form-group mt-2">
                                <label>Sub Category Slug</label>
                                <input type="text" class="form-control slug" name="subcategory_slug"
                                    value="{{ $subcat->subcategory_slug }}" onkeyup="this.value = slugify(this.value)"
                                    required>

                                <span style="color: red;">
                                    @error('subcategory_slug')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="form-group mt-2">
                                <label class="form-label">Meta Tag</label><br>
                                <input type="text" name="meta_tag" class="form-control" id="size"
                                    data-role="tagsinput" value="{{ $subcat->meta_tag }}">

                                <span style="color: red;">
                                    @error('meta_tag')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group mt-2">
                                <label class="form-label">Meta Description</label><br>
                                <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $subcat->meta_description }}</textarea>

                                <span style="color: red;">
                                    @error('meta_description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group mt-3">
                                <label class="form-label">Subcategory Footer Text</label><br>
                                <textarea class="form-control" name="subcategory_footer_text" id="summernote2" cols="30" rows="10">{{ $subcat->subcate_footer_text }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Banner Img</label>
                                <input type="file" name="banner_img" class="form-control"
                                    onchange="previewImage('banner')" id="banner_img" accept="image/*">

                                <br>
                                <img id="banner-preview" src="{{ URL::to($subcat->subcategory_banner) }}" alt=" banner"
                                    style="max-width: 200px;" required>

                                <input type="hidden" name="old_banner_img" value="{{ $subcat->subcategory_banner }}">

                            </div>

                            <div class="form-group mt-2">
                                <label class="form-label">Image</label>
                                <input type="file" name="subcategory_img" class="form-control"
                                    onchange="previewImage('logo')" id="logo" accept="image/*">

                                <br>
                                <img id="logo-preview" src="{{ URL::to($subcat->subcategory_img) }}" alt="Brand Logo"
                                    style="max-width: 200px;" required>

                                <input type="hidden" name="old_logo" value="{{ $subcat->subcategory_img }}">

                            </div>


                            <button type="submit" class="btn btn-primary mr-2 mt-2">Update</button>
                            <a class="btn btn-light" href="">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    @endsection
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $(".select2").select2({
                placeholder: "Select a Category",
                allowClear: true
            });
            $('#summernote2').summernote({
                tabsize: 2,
                height: 250
            });
        </script>

        <script>
            function previewImage(item) {
                const img_preview = document.getElementById('logo-preview');
                const banner_preview = document.getElementById('banner-preview');
                const file = event.target.files[0];

                if (file) {
                    if (item == 'banner') {
                        banner_preview.src = URL.createObjectURL(file);
                    } else {
                        img_preview.src = URL.createObjectURL(file);
                    }
                } else {
                    if (item == 'banner') {
                        img_preview.src = '{{ URL::to($subcat->subcategory_banner) }}';
                    } else {
                        banner_preview.src = '{{ URL::to($subcat->subcategory_img) }}';
                    }
                }

            }
        </script>
    @endpush
