<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('admin.dashboard') }}" class="">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="fa-solid fa-images"></i>
            </div>
            <div class="menu-title"> Home-1 Hero</div>
        </a>
        <ul>
            {{-- <li> <a href="{{ route('add.indexslider')}}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
                 <li class="nav-item" style="margin-bottom: -10px;"> <a class="nav-link" href="">Add Slider</a></li>
            <li class="nav-item"> <a class="nav-link" href="">List Slider</a></li>
            </li> --}}

            {{-- <li> <a href="{{ route('add.slider')}}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
            </li> --}}
            <li> <a href="{{ route('list.slider') }}">
                    <i class="bx bx-right-arrow-alt"></i>
                    Hero Slider</a>
            </li>



            <li> <a href="{{ route('list.slider.twosite') }}"><i class="bx bx-right-arrow-alt"></i>Right Side Images</a>
            </li>
            <li> <a href="{{ route('list.popup') }}"><i class="bx bx-right-arrow-alt"></i>Pop up Banner</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-images"></i>
            </div>
            <div class="menu-title">Home-2 Hero </div>
        </a>
        <ul>

            <li> <a href="{{ route('list.indexslider') }}"><i class="bx bx-right-arrow-alt"></i>Hero Slider</a>
            </li>
            <li> <a href="{{ route('list.slider.site') }}"><i class="bx bx-right-arrow-alt"></i>Right Side Images</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-shipping-fast"></i>
            </div>
            <div class="menu-title">Shipments
            </div>
        </a>
        <ul>
            <li> <a href="{{ route('list.shipments') }}">
                    {{-- shipment icon --}}
                    <i class="bx bx-right-arrow-alt"></i>

                    View Shipments</a>
                {{-- <li class="nav-item" style="margin-bottom: -10px;"> <a class="nav-link" href="">Add Slider</a></li> --}}
                {{-- <li class="nav-item"> <a class="nav-link" href="">List Slider</a></li> --}}
            </li>

        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Category</div>
        </a>
        <ul>
            {{-- <li> <a href="{{ route('add.category')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
            </li> --}}
            <li> <a href="{{ route('list.category') }}"><i class="bx bx-right-arrow-alt"></i> Category</a>
            </li>
            <li> <a href="{{ route('list.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Sub Category</a>
            </li>
            <li> <a href="{{ route('list.childcategory') }}"><i class="bx bx-right-arrow-alt"></i>Child Category</a>
            </li>
        </ul>
    </li>
    {{-- <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-grip"></i>
            </div>
            <div class="menu-title">SubCategory</div>
        </a>
        <ul>

            <li> <a href="{{ route('add.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
            </li>
            <li> <a href="{{ route('list.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>List Category</a>
            </li>
        </ul>
    </li> --}}
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-diamond"></i>
            </div>
            <div class="menu-title">Brand</div>
        </a>
        <ul>
            <li> <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
            </li>
            <li> <a href="{{ route('list.brand') }}"><i class="bx bx-right-arrow-alt"></i>List Brand</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-producthunt"></i>
            </div>
            <div class="menu-title">Product</div>
        </a>
        <ul>
            <li> <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
            </li>
            <li> <a href="{{ route('list.product') }}"><i class="bx bx-right-arrow-alt"></i>List Product</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fas fa-blog"></i>
            </div>
            <div class="menu-title">Blog</div>
        </a>
        <ul>
            <li> <a href="{{ route('add.blog') }}"><i class="bx bx-right-arrow-alt"></i>Add Blog</a>
            </li>
            <li> <a href="{{ route('list.blog') }}"><i class="bx bx-right-arrow-alt"></i>List Blog</a>
            </li>
        </ul>
    </li>
    {{-- this is combo section --}}
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-regular fa-object-group"></i>
            </div>
            <div class="menu-title">Combo</div>
        </a>
        <ul>
            <li> <a href="{{ route('page.combo') }}"><i class="bx bx-right-arrow-alt"></i>Add Combo</a>
            </li>
            <li> <a href="{{ route('list.combo') }}"><i class="bx bx-right-arrow-alt"></i>List Combo</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-percent"></i>
            </div>
            <div class="menu-title"> Cupon </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Add Cupon </a>
            </li>
            <li>
                <a href="{{ route('list.coupon') }}"><i class="bx bx-right-arrow-alt"></i>List Cupon</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-cart-plus"></i>
            </div>
            <div class="menu-title">Order Management</div>
        </a>
        <ul>
            <li> <a href="{{ route('list.order') }}"><i class="bx bx-right-arrow-alt"></i>List Order</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-envelope"></i>
            </div>
            <div class="menu-title"> Subscriber List</div>
        </a>
        <ul>
            <li> <a href="{{ route('list.subscribe') }}"><i class="bx bx-right-arrow-alt"></i>Subscriber list </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="fa-solid fa-file-alt"></i>
            </div>
            <div class="menu-title"> Pages </div>
        </a>
        <ul>

            <li>
                <a href="{{ route('setting.refund.page') }}"><i class="bx bx-right-arrow-alt"></i>Refund and return
                    Policy </a>
            </li>
            <li>
                <a href="{{ route('oline.delivery.page') }}"><i class="bx bx-right-arrow-alt"></i>Online Delivery
                </a>
            </li>
            <li>
                <a href="{{ route('terms.condition.page') }}"><i class="bx bx-right-arrow-alt"></i>Terms and
                    condition </a>
            </li>
            <li>
                <a href="{{ route('aboutus.page') }}"><i class="bx bx-right-arrow-alt"></i>About Us </a>
            </li>
            <li>
                <a href="{{ route('contactus.page') }}"><i class="bx bx-right-arrow-alt"></i>Contact Us </a>
            </li>
            <li>
                <a href="{{ route('privacy.policy.page') }}"><i class="bx bx-right-arrow-alt"></i> Privacy Policy
                </a>
            </li>
            <li>
                <a href="{{ route('emi.page') }}"><i class="bx bx-right-arrow-alt"></i>EMI Page</a>
            </li>
            <li>
                <a href="{{ route('desktop.page') }}"><i class="bx bx-right-arrow-alt"></i> Delivery and Return
                    Policy</a>
            </li>
            <li>
                <a href="{{ route('laptop.page') }}"><i class="bx bx-right-arrow-alt"></i>ডিজিটাল কমার্স
                    নির্দশিকা</a>
            </li>
            <li>
                <a href="{{ route('online_serve') }}"><i class="bx bx-right-arrow-alt"></i>Online
                    Service</a>
            </li>

        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <div class="menu-title"> Setting </div>
        </a>
        <ul>

            <li>
                <a href="{{ route('edit.setting', 1) }}"><i class="bx bx-right-arrow-alt"></i>General Setting </a>
            </li>

        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="menu-title">Review </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('review.list') }}"><i class="bx bx-right-arrow-alt"></i>Review List </a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
                <i class="fa-solid fa-question"></i>
            </div>
            <div class="menu-title"> Q&A </div>
        </a>
        <ul>
            {{-- <li>
                <a href="{{ route('add.setting')}}"><i class="bx bx-right-arrow-alt"></i>Add Setting </a>
            </li> --}}
            <li>
                <a href="{{ route('list.question') }}"><i class="bx bx-right-arrow-alt"></i>Questions </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-users"></i>
            </div>
            <div class="menu-title"> Contact list </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('contact-us.list') }}"><i class="bx bx-right-arrow-alt"></i>list </a>
            </li>
        </ul>
    </li>

    {{-- <li class="menu-label">UI Elements</li>
    <li>
        <a href="widgets.html">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Widgets</div>
        </a>
    </li> --}}

</ul>
