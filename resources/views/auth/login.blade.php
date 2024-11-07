@extends('fontend_master')
@section('content')
    <section class="after-header p-tb-10">
        <div class="container">
            {{-- <ul class="breadcrumb">
                <li><a href="../index.html"><i class="fa fa-home" title="Home"></i></a></li>
                <li><a href="login.html">Account</a></li>
                <li><a href="login.html">Login</a></li>
            </ul> --}}
        </div>
    </section>
    <div class="container ac-layout before-login">
        <div class="panel m-auto">
            <div class="p-head">
                <h2 class="text-center">Account Login</h2>
            </div>
            <div class="p-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="input-username">E-Mail</label>
                        <input type="text" name="email" placeholder=" E-Mail" class="form-control"
                            value="{{ $email ?? old('email') }}" required />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label forgot_password" for="input-password">
                            <span>Password</span>
                            <span>
                                <a href="{{ url('/password/reset') }}">Forgotten Password?</a>
                            </span>
                        </label>
                        <input type="password" name="password" placeholder="Password" class="form-control" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>

                </form>
                <p class="no-account-text"><span>Don't have an account?</span></p>
                <a class="btn st-outline" href="{{ route('register') }}">Create Your Account</a>
            </div>
        </div>
    </div>
@endsection
