@extends('fontend_master')
@section('content')


    <body class="account-edit">

        <section class="after-header p-tb-10">
            <div class="container">
                <ul class="breadcrumb">
                        <li><a href="{{route('home')}}"><i class="fa fa-home" title="Home"></i></a></li>
                        <li><a href="{{route('account.order.list')}}">Account</a></li>
                        <li><a href="{{route('account.edit')}}">Edit Information</a></li>
                </ul>
            </div>
        </section>
        <div class="container alert-container">
        </div>
        <div class="container ac-layout">
            <div class="ac-header">
                <div class="left">
                    <span class="avatar"><img
                            src="https://www.gravatar.com/avatar/4823de601222ef12c9f16ae825938b8a?s=70&d=mp&r=g"
                            width="80" height="80" alt="rr"></span>
                    <div class="name">
                        <p>Hello,</p>
                        @if (Auth::user())

                        <p class="user">{{ Illuminate\Support\Str::of(Auth::user()->name) }} </p>
                        @endif
                    </div>
                </div>

            </div>
            <ul class="navbar-nav ac-navbar">
                <li class="nav-item"><a href="{{route('account.order.list')}}" class="nav-link"><span class="material-icons"></span>Orders</a>
                </li>
                <li class="nav-item"><a href="{{route('account.edit')}}" class="nav-link"><span class="material-icons"></span>Edit
                        Account</a></li>

            </ul>
            <div class="ac-title"><a href=""><span class="material-icons">arrow_back</span></a>
                <h1>My Account Information</h1>
            </div>
            {{-- <form action="{{ route('user.update.password', Auth::user()->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal"> --}}

                <div class="multiple-form-group">
                    <div class="form-group required">
                        <label >Name </label>
                        <input type="text" name="firstname" value="{{Auth::user()->name}}" placeholder="First Name"
                            class="form-control" />
                    </div>
                </div>

                <div class="form-group required">
                    <label >E-Mail</label>
                    <input type="email" name="email" value="{{Auth::user()->email}}" placeholder="E-Mail"
                        class="form-control" />
                </div>

                {{-- <div class="form-group required">
                    <label >Old Password</label>
                    <input type="password" name="old_password"  placeholder="Old  Password" class="form-control" />
                </div> --}}
                {{-- <div class="form-group required">
                    <label >Password</label>
                    <input type="password" name="password"  placeholder="Password" readonly
                        id="" class="form-control" />
                </div>
                <div class="form-group required">
                    <label >Confirm Password</label>
                    <input type="password" name="confirm_password"  placeholder="Confirm  Password"
                    class="form-control" />
                </div> --}}

                {{-- <button type="submit" class="btn btn-primary">Continue</button>
            </form> --}}
        </div>




        <!-- footer start -->
        <footer>
            <div class="container">
                <div class="main-footer">

                    <div class="footer-block contact-us">
                        <h4>Support</h4>

                        <a href="tel:16793" class="helpline-btn footer-big-btn">
                            <div class="ic"><i class="fa fa-phone"></i></div>

                            <p>10AM - 7PM</p>
                            <h5>16793</h5>
                        </a>

                        <a href="" class="store-locator-btn footer-big-btn">
                            <div class="ic m-t-10"><i class="fa-solid fa-location-dot"></i></div>
                            <p>Store Locator</p>
                            <h5>Find Our Stores</h5>
                        </a>
                    </div>

                    <div class="footer-block about-us">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="">EMI Terms</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Online Delivery</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Terms and Conditions</a></li>
                            <li><a href="">Refund and Return Policy</a></li>
                            <li><a href="">Star Point Policy</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Brands</a></li>
                            <li><a href="" style="color: #fff" target="_blank" rel="noopener">Online Service
                                    Support</a></li>
                            <li><a href="" style="color: #fff" target="_blank" rel="noopener">Complain /
                                    Advice</a></li>
                        </ul>
                    </div>
                    <div class="footer-block org-info">
                        <h4>Stay Connected</h4>
                        <p><b class="store-name">Sherazi Tech Ltd</b><br />Head Office: 28 Kazi Nazrul Islam Ave,Navana
                            Zohura Square, Dhaka 1000</p>
                        <p><b>Email:</b><br /><a href="" style="color: #fff"
                                target="_blank">info@sheraziit.com</a> </p>
                    </div>
                </div>

                <div class="row footer-two">
                    <div class="col-md-3 social-footer">
                        <div class="app-links">
                            <span class="app-link-items">
                                <a class="app-link" href="" target="_blank" rel="noopener"
                                    title="Star Tech Android APP">
                                    <span class="icon-sprite playstore"></span>
                                    <span class="app-link-text">
                                        <span class="app-store">Google Play</span>
                                    </span>
                                </a>

                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="payment">
                            <h4 style="margin-top:5px ;">Payment System</h4>
                            <a href="">
                                <img src="image/footer-ipay.webp" alt="" width="300px;"
                                    style="margin-right: 10px; ">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="payment">
                            <h4 style="margin-top:5px ;">Shipping System</h4>
                            <a href="">
                                <img src="image/footer-ipay.webp" alt="" width="300px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="social-link" style="margin-left: 15px;">
                            <h4>Our Social Link</h4>
                            <a href="" target="_blank" rel="noopener" title="Facebook">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="" target="_blank" rel="noopener" title="Youtube">
                                <i class="fa-brands fa-youtube"></i>

                            </a>
                            <a href="" target="_blank" rel="noopener" title="Instagram">
                                <i class="fa-brands fa-instagram"></i>

                            </a>
                            <a href="" target="_blank" rel="noopener" title="Twitter">
                                <i class="fa-brands fa-twitter"></i>

                            </a>
                            <a href="" target="_blank" rel="noopener" title="Linkedin">
                                <i class="fa-brands fa-linkedin"></i>

                            </a>
                        </div>
                    </div>
                </div>


                <div class="row sub-footer">
                    <div class="col-md-6 copyright-info">
                        <p>© 2023 Sherazi Tech Ltd | All rights reserved</p>
                    </div>
                    <div class="col-md-6 powered-by">
                        <p>Powered By: Sherazi Tech</p>
                    </div>
                </div>
            </div>
        </footer>

    </body>

    </html>
@endsection
