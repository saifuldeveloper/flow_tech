{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('fontend_master')
@section('content')
<section class="after-header p-tb-10">
    <div class="container">
        <ul class="breadcrumb">
                        <li><a href="../index.html"><i class="material-icons" title="Home">home</i></a></li>
                        <li><a href="login.html">Account</a></li>
                        <li><a href="login.html">Login</a></li>
                    </ul>
    </div>
</section>
<div class="container ac-layout before-login">
    <div class="panel m-auto">
                        <div class="p-head"> <h2 class="text-center">Account Login</h2></div>
        <div class="p-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                                <div class="form-group">
                    <label class="control-label" for="input-username">E-Mail</label>
                    <input type="text" name="email" placeholder=" E-Mail" class="form-control" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-password">Password</label>
                    <input type="password" name="password"  placeholder="Password" class="form-control" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>

            </form>
            <p class="no-account-text"><span>Don't have an account?</span></p>
            <a class="btn st-outline" href="register.html">Create Your Account</a>
        </div>
    </div>
</div>

@endsection