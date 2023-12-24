@extends('master_admin')


@section('content')

    <div class="page-header">
        <h3 class="page-title">Add Shipments</h3>
     
      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-light">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('store.shipments')}}" method="post" enctype="multipart/form-data"> 
                @csrf 
                <div class="form-group">
                  <label >Home Delivery</label>
                  <input type="number" class="form-control" name="home_delivery" >

                  <span style="color: red;">
                    @error('home_delivery')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
                <div class="form-group">
                  <label >Store Pickup</label>
                  <input type="number" class="form-control" name="store_pickup" >

                  <span style="color: red;">
                    @error('store_pickup')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
                <div class="form-group">
                  <label >Request Express</label>
                  <input type="number" class="form-control" name="request_express" >

                  <span style="color: red;">
                    @error('request_express')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
                <button type="submit" class="btn btn-primary mr-2 mt-2">Submit</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

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