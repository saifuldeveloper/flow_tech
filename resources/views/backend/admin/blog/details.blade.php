@extends('master_admin')


@section('content')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <div class="page-header">
        <h3 class="page-title">Details Brand</h3>

    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="form-group">
                        <label>Autor Name</label>
                        <input type="text" class="form-control" name="brand_name" value="{{ $blog->autor_name }}"
                            readonly>
                        <span style="color: red;">
                            @error('brand_name')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div class="form-group">
                        <label>meta_title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $blog->meta_title }}"
                            readonly>
                        <span style="color: red;">
                            @error('meta_title')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Tag</label><br>
                        <input type="text" name="meta_tag" class="form-control" id="size" readonly
                            data-role="tagsinput" value="{{ $blog->meta_tag }}">

                        <span style="color: red;">
                            @error('meta_tag')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Meta Description</label><br>
                        <textarea class="form-control" name="meta_description" readonly id="" cols="30" rows="10">{{ $blog->meta_description }}</textarea>
                        <span style="color: red;">
                            @error('meta_description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Short Description</label><br>
                        <textarea class="form-control" name="short_description" readonly id="" cols="30" rows="10">{{ $blog->short_description }}</textarea>
                        <span style="color: red;">
                            @error('short_description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>long Description</label><br>

                        <textarea class="form-control" id="summernote" readonly cols="30" rows="30" name="long_description" required> {{ $blog->long_description }}</textarea>

                        <span style="color: red;">
                            @error('long_description')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div class="form-group">
                        <label class="form-label">Keyword</label><br>
                        <input type="text" name="keyword" class="form-control" id="keyword" readonly
                            data-role="tagsinput" value="{{ $blog->keyword }}">

                        <span style="color: red;">
                            @error('keyword')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Schema Markup</label><br>

                        <textarea class="form-control" id="summernote2" readonly cols="30" rows="30" name="schema_markup" required> {{ $blog->schema_markup }}</textarea>

                        <span style="color: red;">
                            @error('schema_markup')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <center>
                        <div class="form-group">
                            <label class="form-label">Brand Logo</label>
                            <br>
                            <img id="logo-preview" src="{{ URL::to($blog->image) }}" alt="Brand Logo"
                                style="max-width: 400px;" required>

                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

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
    </script>
    <script>
        $('#summernote2').summernote({

            tabsize: 2,
            height: 100
        });
    </script>
@endsection
