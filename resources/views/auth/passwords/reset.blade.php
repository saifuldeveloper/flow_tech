@extends('fontend_master')
@section('content')
    <section class="after-header p-tb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="../index.html"><i class="fa fa-home" title="Home"></i></a></li>
                <li><a href="login.html">Account</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </div>
    </section>
    <div class="container ac-layout before-login">
        <div class="panel m-auto">
            <div class="p-head">
                <h2 class="text-center"> Password Reset </h2>
            </div>
            <div class="p-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="email" class="control-label" for="input-username">Email Address</label>
                        <input id="email" type="text" name="email" placeholder="Email Address"
                            class="form-control" />
                        @error('email')
                            <span style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label" for="input-password">
                            <span>Password</span>

                        </label>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control" />
                        @error('password')
                            <span style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="control-label" for="input-password">
                            <span>Confirm Password</span>

                        </label>
                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Password"
                            class="form-control" placeholder="Confirm Password"
                            @error('password_confirmation')
                            <span style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>


                        <button type="submit" class="btn btn-primary">Reset Password</button>

                </form>
                <p class="no-account-text"><span>Don't have an account?</span></p>
                <a class="btn st-outline" href="{{ route('register') }}">Create Your Account</a>
            </div>
        </div>
    </div>
@endsection
