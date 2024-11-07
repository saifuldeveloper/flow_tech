<!-- footer start -->
@php

    $setting = DB::table('settings')->first();

@endphp
<footer>
    <div class="container">
        <div class="main-footer">

            <div class="footer-block contact-us">
                <h4>Support</h4>

                <a href="tel:16793" class="helpline-btn footer-big-btn">
                    <div class="ic"><i class="fa fa-phone"></i></div>

                    <p>10AM - 7PM</p>
                    <h5>{{ $setting->phone }}</h5>
                </a>

                <a href="{{ $setting->google_maps }}" target="_blank" class="store-locator-btn footer-big-btn">
                    <div class="ic m-t-10"><i class="fa-solid fa-location-dot"></i></div>
                    <p>Store Locator</p>
                    <h5>Find Our Stores</h5>
                </a>
                @if (session('success'))
                    <div class="alert alert-success" style="colo:white">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('subscribe.store') }}" method="post">
                    @csrf
                    <div style="display: flex">
                        <input type="emial" name="email" placeholder="subscriber">
                        <button type="submit" class="btn btn-primary" style="height: 42px;">Subscribe</button>
                    </div>
                </form>
            </div>

            <div class="footer-block about-us">
                <h4>Pages</h4>
                <ul>
                    <li><a href="{{ Route('aboutUs') }}">About Us</a></li>
                    <li><a href="{{ Route('policy') }}">Privacy Policy</a></li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="{{ Route('brand.all') }}">Brand</a>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="{{ Route('contact') }}">Contact Us</a>
                    </li>
                    <li><a href="{{ Route('condition') }}">Terms and Conditions</a></li>
                    <li><a href="{{ route('page.onlineService') }}">Online Service</a></li>
                    <li><a href="{{ Route('emi') }}">Warrenty Policy</a></li>
                    <li><a href="{{ Route('refundAndReturn') }}">Payment and refund Policy</a></li>
                    <li><a href="{{ route('digitalCommerce') }}">ডিজিটাল কমার্স নির্দেশিকা </a></li>
                    <li><a href="{{ Route('delivery') }}">Online Delivery</a></li>
                    <li><a href="{{ route('deliveryReturnPage') }}">Delivery and Return Policy </a></li>
                    <li><a href="{{ Route('allblog') }}">Blog</a></li>
                </ul>

            </div>
            <div class="footer-block org-info">
                <h4>Stay Connected</h4>
                <p><b class="store-name">{{ $setting->shopname }}</b><br />Head Office:{{ $setting->address }}</p>
                <p><b>Email:</b><br /><a href="" style="color: #fff" target="_blank">{{ $setting->email }}</a>
                </p>
            </div>
        </div>

        <div class="row footer-two">
            <div class="col-md-3 social-footer">
                <div class="app-links">
                    <span class="app-link-items">
                        <a class="app-link" href="" target="_blank" rel="noopener" title="Star Tech Android APP">
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
                    <a href="javascript:void(0)">
                        <img src="{{ asset('assets/fontend/image/footer-ipay.webp') }}" alt="ipay"
                            style="margin-right: 10px; width: 300px; height:30px; ">
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="payment">
                    <h4 style="margin-top:5px ;">Shipping System</h4>
                    <a href="javascript:void(0)">
                        <img style="width: 300px; height:30px;"
                            src="{{ asset('assets/fontend/image/footer-ipay.webp') }}" alt="ipay">
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="social-link" style="margin-left: 15px;">
                    <h4>Our Social Link</h4>
                    <a href="{{ $setting->facebook }}" target="_blank" rel="noopener" title="Facebook">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="{{ $setting->youtube }}" target="_blank" rel="noopener" title="Youtube">
                        <i class="fa-brands fa-youtube"></i>

                    </a>
                    <a href="{{ $setting->linkedIn }}" target="_blank" rel="noopener" title="Instagram">
                        <i class="fa-brands fa-instagram"></i>

                    </a>
                    <a href="{{ $setting->twitter }}" target="_blank" rel="noopener" title="Twitter">
                        <i class="fa-brands fa-twitter"></i>

                    </a>
                    <a href="{{ $setting->linkedIn }}" target="_blank" rel="noopener" title="Linkedin">
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
<!-- footer en -->
