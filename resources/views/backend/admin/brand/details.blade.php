@extends('master_admin')


@section('content')
    <div class="page-header">
        <h3 class="page-title">Details Brand</h3>
     
      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-light">
            <div class="card-body">
                <div class="form-group">
                  <label >Brand Name</label>
                  <input type="text" class="form-control" name="brand_name" value="{{ $brands->brand_name }}" readonly>

                  <span style="color: red;">
                    @error('brand_name')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
                <div class="form-group">
                  <label class="form-label" >Meta Tag</label><br>
                  <input type="text" name="meta_tag" class="form-control" id="size" readonly data-role="tagsinput" value="{{ $brands->meta_tag}}">
  
                  <span style="color: red;">
                      @error('meta_tag')
                          {{$message}}
                      @enderror
                      </span>
              </div>

                  <div class="form-group">
                  <label class="form-label" >Meta Description</label><br>
                   <textarea class="form-control" name="meta_description" readonly id="" cols="30" rows="10">{{$brands->meta_description}}</textarea>
                  <span style="color: red;">
                      @error('meta_description')
                          {{$message}}
                      @enderror
                      </span>
              </div>

                <center>    <div class="form-group">
                    <label class="form-label">Brand Logo</label>
                    <br>
  
                    <img id="logo-preview" src="{{ URL::to($brands->brand_logo) }}" alt="Brand Logo" style="max-width: 400px;" required>
          
                  </div> </center>
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