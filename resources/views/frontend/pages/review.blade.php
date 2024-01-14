@extends('fontend_master')
@section('content')
<style>
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
    {{-- <section class="after-header p-tb-10">
    <div class="container">
        <ul class="breadcrumb">
                        <li><a href="../index.html"><i class="material-icons" title="Home">home</i></a></li>
                        <li><a href="login.html">Account</a></li>
                        <li><a href="login.html">Login</a></li>
                    </ul>
    </div>
</section> --}}
    <div class="container ac-layout before-login">
        <div class="panel m-auto">
            <div class="p-head">
                <h2 class="text-center">Write Review</h2>
            </div>
            <div class="p-body">
                <form action="{{ route('review.section') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @php
                    $product = DB::table('products')->where('id', $id)->first();
                    // dd($product);
                @endphp
                    <input type="hidden" name="product_id" value="{{$id}}" class="form-control" />
                    @if (Auth::check())
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" />
                    @else

                    @endif

                <div class="form-group">
                    <label class="control-label" for="input-username">Product</label>
                    <input type="text" name="product" value="{{ $product->product_name }}" class="form-control" />
                </div>
                    <div class="form-group">
                        <label class="control-label" >Your Review</label>
                        <textarea name="comments" id="" rows="3" placeholder="Your Review"></textarea>

                    </div>
                    <div class="form-group">
                        <label class="control-label">Rating <span class="text-danger">*</span></label>
                        <div class="rate">
                            <input type="radio" id="star5" name="ratting" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="ratting" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="ratting" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="ratting" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="ratting" value="1" />
                            <label for="star1" title="text">1 star</label>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="/" class="btn btn-primary">Back</a>

                </form>
            </div>
        </div>
    </div>
@endsection
