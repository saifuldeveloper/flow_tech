@extends('master_admin')
@section('title', 'Flow Tech BD | Edit Blog')
@push('css')
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="page-header">
        <h3 class="page-title">Edit Brand</h3>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="row">
                <div class="card bg-light">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('update.blog', $blog->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Post Autor Name </label>
                                    <input type="text" class="form-control" name="autor_name"
                                        value="{{ $blog->autor_name }}">

                                    <span style="color: red;">
                                        @error('autor_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ $blog->meta_title }}">

                                    <span style="color: red;">
                                        @error('meta_title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-group mt-3">
                                    <label>Slug</label><br>
                                    <input type="text" name="slug" value="{{ $blog->slug }}"
                                        class="form-control slug" required="" onkeyup="this.value = slugify(this.value)">

                                    <span style="color: red;">
                                        @error('slug')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Meta Tag</label><br>
                                    <input type="text" name="meta_tag" class="form-control" id="size"
                                        data-role="tagsinput" value="{{ $blog->meta_tag }}">

                                    <span style="color: red;">
                                        @error('meta_tag')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Meta Description</label><br>
                                    <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $blog->meta_description }}</textarea>

                                    <span style="color: red;">
                                        @error('meta_description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label class="form-label">Short Description</label><br>
                                    <textarea class="form-control" name="short_description" id="" cols="20" rows="10">{{ $blog->short_description }}</textarea>

                                    <span style="color: red;">
                                        @error('short_description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">

                                <div class="form-group">
                                    <label>long Description</label><br>

                                    <textarea class="form-control" id="summernote" cols="15" rows="15" name="long_description" required> {{ $blog->long_description }}</textarea>

                                    <span style="color: red;">
                                        @error('long_description')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                            </div>
                            <div class="col-md-6 mt-2">

                                <div class="form-group">
                                    <label class="form-label">Keyword</label><br>
                                    <input type="text" name="keyword" class="form-control" id="size"
                                        data-role="tagsinput" value="{{ $blog->keyword }}">

                                    <span style="color: red;">
                                        @error('keyword')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">

                                <div class="form-group">
                                    <label>Schema Markup</label><br>

                                    <textarea class="form-control" id="summernote2" cols="15" rows="15" name="schema_markup" required> {{ $blog->schema_markup }}</textarea>

                                    <span style="color: red;">
                                        @error('schema_markup')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                            </div>

                            <div class="form-group mb-3 mt-2">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="logo" accept="image/*">

                                <br>
                                <img id="logo-preview" src="{{ URL::to($blog->image) }}" alt="Brand Logo"
                                    style="max-width: 200px;" required>

                                <input type="hidden" name="old_logo" value="{{ $blog->image }}">

                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <a class="btn btn-light" href="">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script type="text/javascript">
        document.getElementById('logo').addEventListener('change', function(event) {
            const preview = document.getElementById('logo-preview');
            const file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
            } else {
                preview.src = '{{ URL::to($blog->image) }}';
            }
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
    </script>
@endpush
