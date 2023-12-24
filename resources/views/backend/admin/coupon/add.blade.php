@extends('master_admin')


@section('content')

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Add Coupon</h3>
     
      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
          
              <form class="forms-sample" action="{{ route('store.coupon')}}" method="post" > 
                @csrf 

                <div class="form-group">
                  <label >Coupon Name</label>
                  <label class="form-label">Coupon Name</label>
                  <input type="text" name="coupon" class="form-control" >
        
                  <span style="color: red;">
                    @error('coupon')
                        {{$message}}
                    @enderror
                    </span>
                    
                </div>

              
                <div class="form-group mb-3">
                    <label class="form-label">Discount %</label>
                    <input type="text" name="discount" class="form-control" >
          
                    <span style="color: red;">
                      @error('discount')
                          {{$message}}
                      @enderror
                      </span>
        
                </div>
        

              
               
              
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a  class="btn btn-light" href="">Cancel</a>
              </form>

            </div>
          </div>
        </div>

</div>




@endsection