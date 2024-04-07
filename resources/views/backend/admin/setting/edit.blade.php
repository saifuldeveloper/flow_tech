@extends('master_admin')


@section('content')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Update Setting</h3>
     
      </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('update.setting',$setting->id)}}" method="post" enctype="multipart/form-data"> 
                @csrf 

                <div class="form-group mb-3">
                  <label class="form-label">Home Page Active:</label><br>
                  <select class="form-control" name="homepage_active" id="homepage_active">
                    <option value="1" {{ $setting->homepage_active == 1 ? 'selected' : '' }}>Page One</option>
                    <option value="2" {{ $setting->homepage_active == 2 ? 'selected' : '' }}>Page two</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Logo:</label><br>
  
                  <input type="file" name="logo" class="form-control" id="logo" accept="image/*">
                  <br>
  
                  <img id="logo-preview" src="{{ URL::to($setting->logo) }}"  style="max-width: 200px;" >
  
                  <div id="preview"></div>
  
                  <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
      
              </div>
                <div class="form-group">
                    <label class="form-label">Shop Name</label>
                    <input type="text" name="shopname" class="form-control" value="{{ $setting->shopname }}">
          
                    <span style="color: red;">
                      @error('shopname')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
          
                    <span style="color: red;">
                      @error('email')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>

                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}">
          
                    <span style="color: red;">
                      @error('phone')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>
                <div class="form-group">
                  <label class="form-label">Hotline Number</label>
                  <input type="text" name="hotlinephone" class="form-control" value="{{$setting->hotlinephone}}" >
        
                  <span style="color: red;">
                    @error('hotlinephone')
                        {{$message}}
                    @enderror
                    </span>
        
                </div>

                <div class="form-group">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $setting->address }}">
          
                    <span style="color: red;">
                      @error('address')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>
                <div class="form-group">
                    <label class="form-label">Short Message After Slider</label>
                    <input type="text" name="message" class="form-control" value="{{ $setting->message}}">
          
                    <span style="color: red;">
                      @error('message')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>

                <div class="form-group">
                    <label class="form-label">Shipping Charge</label>
                    <input type="text" name="shipping_charge" class="form-control" value="{{ $setting->shipping_charge }}">
          
                    <span style="color: red;">
                      @error('shipping_charge')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>

                <div class="form-group">
                    <label class="form-label">Facebook Link</label>
                    <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
          
                    <span style="color: red;">
                      @error('facebook')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>

                <div class="form-group">
                    <label class="form-label">Twitter Link</label>
                    <input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
          
                    <span style="color: red;">
                      @error('twitter')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>

                <div class="form-group">
                    <label class="form-label">Youtube Link</label>
                    <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}">
          
                    <span style="color: red;">
                      @error('youtube')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>

                <div class="form-group">
                    <label class="form-label">LinkedIn Link</label>
                    <input type="text" name="linkedIn" class="form-control" value="{{ $setting->linkedIn }}">
          
                    <span style="color: red;">
                      @error('linkedIn')
                          {{$message}}
                      @enderror
                      </span>
                    
                </div>
                <div class="mb-3">
                  <label class="form-label">Instagram link</label>
                  <input type="text" name="instagram" class="form-control"value="{{ $setting->instagram }}" >
        
                  <span style="color: red;">
                    @error('instagram')
                        {{$message}}
                    @enderror
                    </span>
        
                </div>

               <div class="mb-3">
                  <label class="form-label">Google Maps link </label>
                  <input type="text" name="google_maps" class="form-control" value="{{ $setting->google_maps }}" >
        
                  <span style="color: red;">
                    @error('google_maps')
                        {{$message}}
                    @enderror
                </span>
        
                </div>
                {{-- <div class="mb-3">
                  <label class="form-label">First Header</label>
                  <textarea class="form-control" name="computer_laptop_gameingPc"  id="summernote" cols="15" rows="15"  required>{!!$setting->computer_laptop_gameingPc!!} </textarea>
                  <span style="color: red;">
                    @error('computer_laptop_gameingPc')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">Second Header</label>
                  <textarea class="form-control" name="Best_laptop"  id="summernote1" cols="15" rows="15"  required>{!!$setting->Best_laptop!!} </textarea>
                  <span style="color: red;">
                    @error('Best_laptop')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">Third Header</label>
                  <textarea class="form-control" name="Best_desktop"  id="summernote2" cols="15" rows="15"  required>{!!$setting->Best_desktop!!} </textarea>
                  <span style="color: red;">
                    @error('Best_desktop')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}

                {{-- <div class="mb-3 bg-success">
                  <label class="form-label text-white font-weight-bold">This Section is Our Page Setting Area</label>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">Emi Page</label>
                  <textarea class="form-control summernote2" name="emipage"  id="" cols="15" rows="15"  required>{!!$setting->emipage!!}</textarea>
                  <span style="color: red;">
                    @error('emipage')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">Privacy Policy Page</label>
                  <textarea class="form-control summernote2" name="policypage"  id="" cols="15" rows="15"  required> {!!$setting->policypage!!}</textarea>
                  <span style="color: red;">
                    @error('policypage')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">Contact Page</label>
                  <textarea class="form-control summernote2" name="contactpage"  id="" cols="15" rows="15"  required>{!!$setting->contactpage!!} </textarea>
                  <span style="color: red;">
                    @error('contactpage')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">About Page</label>
                  <textarea class="form-control summernote2" name="aboutpage"  id="" cols="15" rows="15"  required>{!!$setting->aboutpage!!} </textarea>
                  <span style="color: red;">
                    @error('aboutpage')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">Terms and Condition Page</label>
                  <textarea class="form-control summernote2" name="conditionpage"  id="" cols="15" rows="15"  required> {!!$setting->conditionpage!!}</textarea>
                  <span style="color: red;">
                    @error('conditionpage')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">Refund and Return Policy Page</label>
                  <textarea class="form-control summernote2" name="refundpage"  id="" cols="15" rows="15"  required>{!!$setting->refundpage!!} </textarea>
                  <span style="color: red;">
                    @error('refundpage')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                {{-- <div class="mb-3">
                  <label class="form-label">Delivery Page</label>
                  <textarea class="form-control summernote2" name="delivery"  id="" cols="15" rows="15"  required> {!!$setting->delivery!!}</textarea>
                  <span style="color: red;">
                    @error('delivery')
                        {{$message}}
                    @enderror
                    </span>
                </div> --}}
                <button type="submit" class="btn btn-primary mr-2">Update</button>
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
               preview.src = '{{ URL::to($setting->logo) }}';
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