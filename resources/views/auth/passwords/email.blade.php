@extends('fontend_master')
@section('content')
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home" title="Home"></i></a></li>
                <li><a href="{{ url('/login') }}">Account</a></li>
                <li>Email</li>
            </ul>
        </div>
    </section>
    <div class="container ac-layout before-login">
        <div class="panel m-auto">
            <div class="p-head">
                <h2 class="text-center"> Email Address </h2>
            </div>
            <div class="p-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="input-username">Email Address</label>
                        <input type="text" name="email" placeholder="Email Address" class="form-control" required
                            value="{{ old('email') }}" />
                        @error('email')
                            <span style="color:red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Send Password Reset Link</button>

                </form>

                <a class="btn st-outline mt-2" href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </div>
@endsection
