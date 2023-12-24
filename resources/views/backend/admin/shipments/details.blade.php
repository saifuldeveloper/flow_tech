@extends('master_admin')


@section('content')

    <div class="page-header">
        <h3 class="page-title">Details Shipments</h3>
     
      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card bg-light">
            <div class="card-body">
          
              <div class="form-group">
                <label >Home Delivery</label>
                <input type="text" class="form-control" name="home_delivery" readonly value="{{$shipments->home_delivery}}" >

                <span style="color: red;">
                  @error('home_delivery')
                      {{$message}}
                  @enderror
                  </span>
                  
              </div>
              <div class="form-group">
                <label >Store Pickup</label>
                <input type="text" class="form-control" name="store_pickup" readonly value="{{$shipments->store_pickup}}" >

                <span style="color: red;">
                  @error('store_pickup')
                      {{$message}}
                  @enderror
                  </span>
                  
              </div>
              <div class="form-group">
                <label >Request Express</label>
                <input type="text" class="form-control" name="request_express" readonly value="{{$shipments->request_express}}" >

                <span style="color: red;">
                  @error('request_express')
                      {{$message}}
                  @enderror
                  </span>
                  
              </div>
            </div>
          </div>
        </div>


@endsection