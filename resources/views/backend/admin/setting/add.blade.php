@extends('master_admin')

@section('content')

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">

            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Setting</h6>

                <form action="{{ route('store.setting')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="mb-3">
                      <label class="form-label">Logo</label>
                  
                      <input type="file"  name="logo" class="form-control " id="upload_file" onchange="getImagePreview(event)" required>
                      <br>
                      <span class="custom-file-control "></span>
                      
                      <div id="preview"></div>
                      
                    </div>
        
                <div class="mb-3">
                  <label class="form-label">Shop Name</label>
                  <input type="text" name="shopname" class="form-control" >
        
                  <span style="color: red;">
                    @error('shopname')
                        {{$message}}
                    @enderror
                    </span>
        
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" >
          
                    <span style="color: red;">
                      @error('email')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>

                  <div class="mb-3">
                    <label class="form-label"> Support Phone number</label>
                    <input type="text" name="phone" class="form-control" >
          
                    <span style="color: red;">
                      @error('phone')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Hotline Number</label>
                    <input type="text" name="hotlinephone" class="form-control" >
          
                    <span style="color: red;">
                      @error('hotlinephone')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" >
          
                    <span style="color: red;">
                      @error('address')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Short Message After Slider</label>
                    <input type="text" name="message" class="form-control" >
          
                    <span style="color: red;">
                      @error('message')
                          {{$message}}
                      @enderror
                      </span>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Google Maps link </label>
                    <input type="text" name="google_maps" class="form-control" >
          
                    <span style="color: red;">
                      @error('google_maps')
                          {{$message}}
                      @enderror
                      </span>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Shipping Charge</label>
                    <input type="text" name="shipping_charge" class="form-control" >
          
                    <span style="color: red;">
                      @error('shipping_charge')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Facebook Link</label>
                    <input type="text" name="facebook" class="form-control" >
          
                    <span style="color: red;">
                      @error('facebook')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Twitter Link</label>
                    <input type="text" name="twitter" class="form-control" >
          
                    <span style="color: red;">
                      @error('twitter')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Youtube Link</label>
                    <input type="text" name="youtube" class="form-control" >
          
                    <span style="color: red;">
                      @error('youtube')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>

                  <div class="mb-3">
                    <label class="form-label">LinkedIn Link</label>
                    <input type="text" name="linkedIn" class="form-control" >
          
                    <span style="color: red;">
                      @error('linkedIn')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Instagram link</label>
                    <input type="text" name="instagram" class="form-control" >
          
                    <span style="color: red;">
                      @error('instagram')
                          {{$message}}
                      @enderror
                      </span>
          
                  </div>
                  <div class="mb-3">
                    <label class="form-label">First Header</label>
                    <textarea class="form-control" name="computer_laptop_gameingPc"  id="summernote" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('computer_laptop_gameingPc')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Second Header</label>
                    <textarea class="form-control" name="Best_laptop"  id="summernote1" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('Best_laptop')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label"> Third Header</label>
                    <textarea class="form-control summernote2" name="Best_desktop"  id="" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('Best_desktop')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3 bg-success">
                    <label class="form-label text-white font-weight-bold">This Section is Our Page Setting Area</label>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Emi Page</label>
                    <textarea class="form-control summernote2" name="Best_desktop"  id="" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('emipage')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Privacy Policy Page</label>
                    <textarea class="form-control summernote2" name="policypage"  id="" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('policypage')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Contact Page</label>
                    <textarea class="form-control summernote2" name="contactpage"  id="" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('contactpage')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">About Page</label>
                    <textarea class="form-control summernote2" name="aboutpage"  id="" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('aboutpage')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Terms and Condition Page</label>
                    <textarea class="form-control summernote2" name="conditionpage"  id="" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('conditionpage')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Refund and Return Policy Page</label>
                    <textarea class="form-control summernote2" name="refundpage"  id="" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('refundpage')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Delivery Page</label>
                    <textarea class="form-control summernote2" name="delivery"  id="" cols="15" rows="15"  required> </textarea>
                    <span style="color: red;">
                      @error('delivery')
                          {{$message}}
                      @enderror
                      </span>
                  </div>
                 
        
                <button type="submit" class="btn btn-info">Submit</button>
                <a  class="btn btn-secondary" href="">Cancel</a>
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
  $('#summernote').summernote({

    tabsize: 2,
    height: 100
  });
</script>
<script>
  $('#summernote1').summernote({

    tabsize: 2,
    height: 100
  });
</script>
<script>
  $('.summernote2').summernote({

    tabsize: 2,
    height: 100
  });
</script>

@endsection