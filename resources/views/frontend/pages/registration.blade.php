@extends('fontend_master')
@section('content')

<section class="after-header p-tb-10">
    <div class="container">
        <ul class="breadcrumb">
                        <li><a href="../index.html"><i class="material-icons" title="Home">home</i></a></li>
                        <li><a href="login.html">Account</a></li>
                        <li><a href="register.html">Register</a></li>
                    </ul>
    </div>
</section>
<div class="container ac-layout before-login">
    <div class="panel m-auto">
        <div class="p-head">
            <h2 class="text-center">Register Account</h2>
        </div>
        <div class="p-body">
                        <form action="" method="post" id="form-register" enctype="multipart/form-data">
                                <input type="hidden" id="input-token" name="token" value="" />
                <input type="hidden" name="step" value="1" />
                <div class="multiple-form-group">
                    <div class="form-group required">
                        <label for="input-firstname">First Name</label>
                        <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" />
                                            </div>
                    <div class="form-group required">
                        <label for="input-lastname">Last Name</label>
                        <input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="form-control" />
                                            </div>
                </div>

                <div class="form-group required">
                    <label for="input-email">E-Mail</label>
                    <input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control" />
                                    </div>
                <div class="form-group required">
                    <label for="input-telephone">Telephone</label>
                    <input type="tel" name="telephone" value="" placeholder="Telephone" id="input-telephone" class="form-control" />
                                    </div>
                                <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="6LdMc2UeAAAAAFdL7ez158dH-tnsTyYHOCiBYud4" data-callback='onSubmit' data-action='submit'>Continue</button>
                                <p class="no-account-text"><span>Already have an account?</span></p>
                <p>If you already have an account with us, please login at the <a href="login.html">login page</a>.</p>
            </form>
        </div>
    </div>
</div>
@endsection
