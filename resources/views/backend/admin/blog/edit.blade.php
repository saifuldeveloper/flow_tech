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

  .bootstrap-tagsinput .tag {
background: rgb(6, 146, 221);
border: 1px solid black;
padding: 0 6px;
margin-right: 2px;
color: white;
border-radius: 4px;
}

  </style>



<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <div class="page-header">
        <h3 class="page-title">Edit Brand</h3>
     
      </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="row">
          <div class="card bg-light">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('update.blog',$blog->id)}}" method="post" enctype="multipart/form-data">
                @csrf 

                <div class="col-md-6">
                  <div class="form-group">
                    <label >Post Autor Name </label>
                    <input type="text" class="form-control" name="autor_name" value="{{$blog->autor_name}}" >
  
                    <span style="color: red;">
                      @error('autor_name')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-label" >Meta Tag</label><br>
                    <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput" value="{{$blog->meta_tag}}">
    
                    <span style="color: red;">
                        @error('meta_tag')
                            {{$message}}
                        @enderror
                        </span>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-label" >Meta Description</label><br>
                     <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{$blog->meta_description}}</textarea>
    
                    <span style="color: red;">
                        @error('meta_description')
                            {{$message}}
                        @enderror
                        </span>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-label" >Short Description</label><br>
                     <textarea class="form-control" name="short_description" id="" cols="20" rows="10">{{$blog->short_description}}</textarea>
    
                    <span style="color: red;">
                        @error('short_description')
                            {{$message}}
                        @enderror
                        </span>
                  </div>
                  </div>
  
                  <div class="col-md-12">
  
                  <div class="form-group">
                    <label >long Description</label><br>
               
                    <textarea class="form-control" id="summernote" cols="15" rows="15" name="long_description" required> {{$blog->long_description}}</textarea>
               
                    <span style="color: red;">
                        @error('long_description')
                            {{$message}}
                        @enderror
                        </span>
    
                    </div>
                    </div>

                <div class="form-group mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="logo" accept="image/*">
          
                    <br>
                    <img id="logo-preview" src="{{ URL::to($blog->image) }}" alt="Brand Logo" style="max-width: 200px;" required>
        
                    <input type="hidden" name="old_logo" value="{{ $blog->image }}">   
          
                  </div>        
                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

            </div>
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
@endsection