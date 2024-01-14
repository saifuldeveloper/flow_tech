@extends('fontend_master')
@section('content')
    <div class="container ac-layout before-login">
        <div class="panel m-auto">
            <div class="p-head">
                <h2 class="text-center">Write Your Question</h2>
            </div>
            <div class="p-body">
                <form action="{{ route('question.section') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @php
                        $product = DB::table('products')->where('id', $id)->first();

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
                        <label class="control-label">Your Question  <span class="text-danger">*</span></label>
                        <textarea name="question" id="" rows="3" placeholder="Your Question"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="/" class="btn btn-primary">Back</a>

                </form>

            </div>
        </div>
    </div>
@endsection
