@extends('master_admin')
@section('title', 'Flow Tech BD | Edit Coupon')

@section('content')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Edit Coupon</h3>

        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('update.coupon', $coupon->id) }}" method="post">
                            @csrf

                            <div class="form-group mt-2">
                                <label class="form-label">Coupon Name</label>
                                <input type="text" name="coupon" class="form-control" value="{{ $coupon->coupon }}">

                                <span style="color: red;">
                                    @error('coupon')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-2">
                                <label class="form-label">Discount</label>
                                <input type="text" name="discount" class="form-control" value="{{ $coupon->discount }}">

                                <span style="color: red;">
                                    @error('discount')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <a class="btn btn-light" href="">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
