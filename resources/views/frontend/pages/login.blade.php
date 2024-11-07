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
            <div class="p-head">
                <h2 class="text-center">Account Login</h2>
            </div>
            <div class="p-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label" for="input-username">Phone / E-Mail</label>
                        <input type="text" name="username" value="" placeholder="Phone / E-Mail"
                            id="input-username" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="input-password">Password</label>
                        <a class="forgot-password" href="forgotten.html">Forgotten Password?</a>
                        <input type="password" name="password" value="" placeholder="Password" id="input-password"
                            class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>

                </form>
                <p class="no-account-text"><span>Don't have an account?</span></p>
                <a class="btn st-outline" href="register.html">Create Your Account</a>
            </div>
        </div>
    </div>
@endsection
