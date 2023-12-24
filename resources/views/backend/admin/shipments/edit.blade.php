@extends('master_admin')


@section('content')


    <div class="page-header">
        <h3 class="page-title">Edit Shipments</h3>
     
      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-light">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('update.shipments',$shipments->id)}}" method="post" enctype="multipart/form-data"> 
                @csrf 

            
                <div class="form-group">
                  <label >Home Delivery</label>
                  <input type="number" class="form-control" name="home_delivery"  value="{{$shipments->home_delivery}}" >
  
                  <span style="color: red;">
                    @error('home_delivery')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
                <div class="form-group">
                  <label >Store Pickup</label>
                  <input type="number" class="form-control" name="store_pickup"  value="{{$shipments->store_pickup}}" >
  
                  <span style="color: red;">
                    @error('store_pickup')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
                <div class="form-group">
                  <label >Request Express</label>
                  <input type="number" class="form-control" name="request_express"  value="{{$shipments->request_express}}" >
  
                  <span style="color: red;">
                    @error('request_express')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>
                <button type="submit" class="btn btn-primary mr-2 mt-2">Update</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

            </div>
          </div>
        </div>

@endsection