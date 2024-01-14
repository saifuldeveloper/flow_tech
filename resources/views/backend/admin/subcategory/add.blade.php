@extends('master_admin')





@section('content')

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        /* width: 714px!important; */
        /* height: 65px; */
        /* padding-bottom: 2px!important; */
        margin-top: -13px!important;
        margin-left: -17px!important;
    }
    </style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Add Sub Category</h3>

      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-light">
            <div class="card-body">


            <form class="forms-sample" action="{{ route('store.subcategory')}}" method="post" enctype="multipart/form-data">
                    @csrf

                <div class="form-group">
                  <label >Category Name</label>
                  <select  class="form-control  select2" name="category_id" >

                    @foreach($category as $row)
                    <option value="{{ $row->id }}"> {{ $row->category_name }}  </option>
                    @endforeach

                     </select>

                </div>

                <div class="form-group mb-3">
                    <label >Sub Category Name</label>
                    <input type="text" name="subcategory_name"  class="form-control" >

                    <span style="color: red;">
                        @error('subcategory_name')
                            {{$message}}
                        @enderror
                        </span>
                </div>
                <div class="form-group">
                    <label>Sub Category Slug</label><br>
                    <input type="text" name="subcategory_slug" value="{{ old('subcategory_slug') ? old('subcategory_slug') : '' }}"
                        class="form-control" required onkeyup="this.value = slugify(this.value)">

                    <span style="color: red;">
                        @error('subcategory_slug')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                  <div class="form-group">
                    <label class="form-label" >Meta Tag</label><br>
                    <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput">

                    <span style="color: red;">
                        @error('meta_tag')
                            {{$message}}
                        @enderror
                        </span>
                </div>

                    <div class="form-group">
                    <label class="form-label" >Meta Description</label><br>
                     <textarea class="form-control" name="meta_description" id="" cols="30" rows="10"></textarea>

                    <span style="color: red;">
                        @error('meta_description')
                            {{$message}}
                        @enderror
                        </span>
                </div>


                  <div class="form-group">
                    <label class="form-label">Sub-Category Image</label>
                    <input type="file" name="subcategory_img" class="form-control" id="upload_file" onchange="getImagePreview(event)" required>

                    <span class="custom-file-control "></span>
                            <br>
                            <div id="preview"></div>

                  </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

            </div>
          </div>
        </div>
</div>
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
        const slugInput = document.querySelector('input[name="subcategory_slug"]');
        slugInput.addEventListener('keyup', function() {
            this.value = slugify(this.value);
        });
    });
</script>

@endsection
