@extends('master_admin')
@section('content')
    
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Details Slider</h6>
                <div class="mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" value="{{ $slider->title }}" readonly> 
        
                  <span style="color: red;">
                    @error('title')
                        {{$message}}
                    @enderror
                    </span>
                </div>
                <div class="mt-3">
                  <div class="form-group">
                    <label class="form-label" >Meta Tag</label><br>
                    <input type="text" name="meta_tag" class="form-control" id="size" data-role="tagsinput" value="{{ $slider->meta_tag}}">
    
                    <span style="color: red;">
                        @error('meta_tag')
                            {{$message}}
                        @enderror
                        </span>
                </div>

                <div class="mt-3">
                </div>
                  <div class="form-group">
                  <label class="form-label" >Meta Description</label><br>
                   <textarea class="form-control" name="meta_description" id="" cols="30" rows="10">{{ $slider->meta_description }}</textarea>
  
                  <span style="color: red;">
                      @error('meta_description')
                          {{$message}}
                      @enderror
                      </span>
              </div>
            </div>
                
                  <div class="mb-3">
                    <label class="form-label">Slider Image</label>
                    <br>
                
                    <img src="{{ URL::to($slider->slider_img) }}" style="height: 280px; width: 450px;">
                  </div>
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

@endsection