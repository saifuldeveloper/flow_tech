@extends('master_admin')





@section('content')
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            /* width: 714px!important; */
            /* height: 65px; */
            /* padding-bottom: 2px!important; */
            margin-top: -13px !important;
            margin-left: -17px !important;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Details Sub Category</h3>

        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card bg-light">
                    <div class="card-body">


                        <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control " name="category_id" disabled>

                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Sub Category Name</label>
                            <input type="text" name="subcategory_name" class="form-control"
                                value="{{ $subcat->subcategory_name }}" readonly>

                            <span style="color: red;">
                                @error('subcategory_name')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="form-group">
                            <label class="form-label">Sub Category Slug</label><br>
                            <input type="text" name="subcategory_slug" class="form-control"
                                value="{{ $subcat->subcategory_slug }}">

                            <span style="color: red;">
                                @error('subcategory_slug')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Tag</label><br>
                            <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput"
                                readonly value="{{ $subcat->meta_tag }}">

                            <span style="color: red;">
                                @error('meta_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Meta Description</label><br>
                            <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $subcat->meta_description }}</textarea>

                            <span style="color: red;">
                                @error('meta_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <center>
                            <div class="form-group">
                                <label class="form-label">Sub-Category Image</label>
                                <br>

                                <img id="logo-preview" src="{{ URL::to($subcat->subcategory_img) }}" alt="Brand Logo"
                                    style="max-width: 400px;" required>

                            </div>
                        </center>





                    </div>
                </div>
            </div>

        </div>

        <script>
            $(".select2").select2();
        </script>
        <script type="text/javascript">
            function getImagePreview(event)
          {
            var image=URL.createObjectURL(event.target.files[0]);
            var imagediv= document.getElementById('preview');
            var newimg=document.createElement('img');
            imagediv.innerHTML='';
            newimg.src=image;
            newimg.width="150";
            newimg.height="150";
            imagediv.appendChild(newimg);
          }
          </script>
    @endsection
