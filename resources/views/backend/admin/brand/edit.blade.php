@extends('master_admin')


@section('content')

    <div class="page-header">
        <h3 class="page-title">Edit Brand</h3>
     
      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-light">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('update.brand',$brands->id)}}" method="post" enctype="multipart/form-data">
                @csrf 

                <div class="form-group">
                  <label >Brand Name</label>
                  <input type="text" class="form-control" name="brand_name" value="{{ $brands->brand_name }}">

                  <span style="color: red;">
                    @error('brand_name')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
                <div class="form-group">
                  <label class="form-label" >Meta Tag</label><br>
                  <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput" value="{{ $brands->meta_tag}}">
  
                  <span style="color: red;">
                      @error('meta_tag')
                          {{$message}}
                      @enderror
                      </span>
              </div>

                  <div class="form-group">
                  <label class="form-label" >Meta Description</label><br>
                   <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{$brands->meta_description}}</textarea>
                  <span style="color: red;">
                      @error('meta_description')
                          {{$message}}
                      @enderror
                      </span>
              </div>

                <div class="form-group mb-3">
                    <label class="form-label">Brand Logo</label>
                    <input type="file" name="brand_logo" class="form-control" id="logo" accept="image/*">
          
                    <br>
                    <img id="logo-preview" src="{{ URL::to($brands->brand_logo) }}" alt="Brand Logo" style="max-width: 200px;" required>
        
                    <input type="hidden" name="old_logo" value="{{ $brands->brand_logo }}">   
          
                  </div>        
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

            </div>
          </div>
        </div>
    </div>
<script type="text/javascript">
    document.getElementById('logo').addEventListener('change', function (event) {
           const preview = document.getElementById('logo-preview');
           const file = event.target.files[0];

           if (file) {
               preview.src = URL.createObjectURL(file);
           } else {
               preview.src = '{{ URL::to($brands->brand_logo) }}';
           }
       });
 </script>

@endsection