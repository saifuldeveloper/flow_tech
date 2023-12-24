@extends('master_admin')
@section('content')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
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

    <div class="page-header">
        <h3 class="page-title">Edit Slider</h3>
     
      </div>
    <div class="row ">
        <div class="col-md-6 grid-margin stretch-card ">
          <div class="card bg-light">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('update.indexslider',$indexslider->id)}}" method="post" enctype="multipart/form-data">
                @csrf 

                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $indexslider->title }}">
          
                    <span style="color: red;">
                      @error('title')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>
                  <div class="form-group">
                  <label class="form-label" >Meta Tag</label><br>
                  <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput"  value="{{ $indexslider->meta_tag}}">
  
                  <span style="color: red;">
                      @error('meta_tag')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="form-group">
                  <label class="form-label" >Meta Description</label><br>
                   <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $indexslider->meta_description }}</textarea>
  
                  <span style="color: red;">
                      @error('meta_description')
                          {{$message}}
                      @enderror
                      </span>
              </div>

                <div class="form-group">
                    <label class="form-label">Logo:</label><br>
                    <input type="file" name="slider_img" class="form-control" id="logo" accept="image/*">
                    <br>
    
                    <img id="logo-preview" src="{{ URL::to($indexslider->slider_img) }}"  style="max-width: 200px;" >
    
                    <div id="preview"></div>
    
                    <input type="hidden" name="old_logo" value="{{ $indexslider->slider_img }}">
          
                  </div>        
                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

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
               preview.src = '{{ URL::to($indexslider->slider_img) }}';
           }
       });
 </script>
@endsection