@extends('master_admin')


@section('content')

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">Details Coupon</h3>
     
      </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
          
           

                <div class="form-group">
                    <label class="form-label">Coupon Name</label>
                  <input type="text" name="coupon" class="form-control" readonly value="{{ $coupon->coupon }}">

                    
                </div>

               <div class="form-group">
                    <label class="form-label">Discount %</label>
                    <input type="text" name="discount" class="form-control" readonly value="{{ $coupon->discount }}">
  
               </div>

              
          

            </div>
          </div>
        </div>

</div>

@endsection