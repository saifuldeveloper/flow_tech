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
        <h3 class="page-title">Edit Sub Category</h3>

      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-light">
            <div class="card-body">

              <form class="forms-sample" action="{{ route('update.subcategory',$subcat->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group ">
                  <label >Category Name</label>
                  <select  class="form-control "name="category_id" >

                    @foreach($category as $row)
                    <option value="{{ $row->id }}"> {{ $row->category_name }}  </option>
                    @endforeach

                     </select>

                </div>

                <div class="form-group mb-3">
                    <label >Sub Category Name</label>
                    <input type="text" name="subcategory_name"  class="form-control" value="{{ $subcat->subcategory_name }}">

                    <span style="color: red;">
                        @error('subcategory_name')
                            {{$message}}
                        @enderror
                        </span>

                </div>
                <div class="form-group">
                    <label >Sub Category Slug</label>
                    <input type="text" class="form-control" name="subcategory_slug" value="{{ $subcat->subcategory_slug }}" onkeyup="this.value = slugify(this.value)">

                    <span style="color: red;">
                      @error('subcategory_slug')
                          {{$message}}
                      @enderror
                      </span>

                </div>
                <div class="form-group">
                    <label class="form-label" >Meta Tag</label><br>
                    <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput" value="{{ $subcat->meta_tag }}">

                    <span style="color: red;">
                        @error('meta_tag')
                            {{$message}}
                        @enderror
                        </span>
                </div>

                    <div class="form-group">
                    <label class="form-label" >Meta Description</label><br>
                     <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $subcat->meta_description }}</textarea>

                    <span style="color: red;">
                        @error('meta_description')
                            {{$message}}
                        @enderror
                        </span>
                </div>

                  <div class="form-group mb-3">
                    <label class="form-label">Category Image</label>
                    <input type="file" name="subcategory_img" class="form-control" id="logo" accept="image/*">

                    <br>
                    <img id="logo-preview" src="{{ URL::to($subcat->subcategory_img) }}" alt="Brand Logo" style="max-width: 200px;" required>

                    <input type="hidden" name="old_logo" value="{{ $subcat->subcategory_img }}">

                  </div>




                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

            </div>
          </div>
        </div>

</div>

<script>
    $(".select2").select2();

  </script>
  <script type="text/javascript">
    document.getElementById('logo').addEventListener('change', function (event) {
           const preview = document.getElementById('logo-preview');
           const file = event.target.files[0];

           if (file) {
               preview.src = URL.createObjectURL(file);
           } else {
               preview.src = '{{ URL::to($subcat->subcategory_img) }}';
           }
       });
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
