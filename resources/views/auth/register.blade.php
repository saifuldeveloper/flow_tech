{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
                        <li><a href="index.html"><i class="material-icons" title="Home"></i>Home</a></li>
                        <li><a href="login.html">Account</a></li>
                        <li><a href="{{Route('register')}}">Register</a></li>
                    </ul>
    </div>
</section>
<div class="container ac-layout before-login">
    <div class="panel m-auto">
        <div class="p-head">
            <h2 class="text-center">Register Account</h2>
        </div>
        <div class="p-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                 {{-- <input type="hidden" id="input-token" name="token" value="" />
                <input type="hidden" name="step" value="1" /> --}}
                <div class="form-group">
                    <div class="form-group required">
                        <label for="input-firstname"> Name</label>
                        <input type="text" name="name" value="" placeholder="First Name" id="input-firstname" class="form-control" />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   </div>
                </div>

                <div class="form-group required">
                    <label for="input-email">E-Mail</label>
                    <input type="email"  name="email" value="{{ old('email') }}" placeholder="Input E-Mail" id="input-email" class="form-control" />
               </div>
                
                <div class="form-group required">
                    <label for="input-password">Password</label>
                    <input type="password"   placeholder="Input Password"  name="password" class="form-control" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
               </div>
                <div class="form-group required">
                    <label for="input-password">Confirm Password</label>
                    <input type="password"  placeholder="Input confirm " name="password_confirmation" class="form-control" />
               </div>
                
                                <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="6LdMc2UeAAAAAFdL7ez158dH-tnsTyYHOCiBYud4" data-callback='onSubmit' data-action='submit'>Continue</button>
                                <p class="no-account-text"><span>Already have an account?</span></p>
                <p>If you already have an account with us, please login at the <a href="{{Route('login')}}">login page</a>.</p>
            </form>
        </div>
    </div>
</div>
@endsection
