<ul class="metismenu" id="menu">
    <li>
        <a href="{{route('admin.dashboard')}}" class="">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fadeIn animated bx bx-slider"></i>
            </div>
            <div class="menu-title">Index Slider</div>
        </a>
        <ul>
            {{-- <li> <a href="{{ route('add.indexslider')}}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
                 <li class="nav-item" style="margin-bottom: -10px;"> <a class="nav-link" href="">Add Slider</a></li>
            <li class="nav-item"> <a class="nav-link" href="">List Slider</a></li>
            </li> --}}

            {{-- <li> <a href="{{ route('add.slider')}}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
            </li> --}}
            <li> <a href="{{ route('list.slider')}}"><i class="bx bx-right-arrow-alt"></i>List Slider</a>
            </li>



            <li> <a href="{{ route('list.slider.twosite')}}"><i class="bx bx-right-arrow-alt"></i>List Two Slider</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fadeIn animated bx bx-slider"></i>
            </div>
            <div class="menu-title">Home Page Slider</div>
        </a>
        <ul>

            <li> <a href="{{ route('list.indexslider')}}"><i class="bx bx-right-arrow-alt"></i>List Slider</a>
            </li>
            <li> <a href="{{ route('list.slider.site')}}"><i class="bx bx-right-arrow-alt"></i>List One Slider</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fadeIn animated bx bx-slider"></i>
            </div>
            <div class="menu-title">Shipments</div>
        </a>
        <ul>
            <li> <a href="{{ route('list.shipments')}}"><i class="bx bx-right-arrow-alt"></i>View Shipments</a>
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
            <li> <a href="{{ route('add.category')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
            </li>
            <li> <a href="{{ route('list.category')}}"><i class="bx bx-right-arrow-alt"></i>List Category</a>
            </li>
        </ul>
    </li>
    <li>
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
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-diamond"></i>
            </div>
            <div class="menu-title">Brand</div>
        </a>
        <ul>
            <li> <a href="{{ route('add.brand')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
            </li>
            <li> <a href="{{ route('list.brand')}}"><i class="bx bx-right-arrow-alt"></i>List Brand</a>
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
            <li> <a href="{{ route('add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
            </li>
            <li> <a href="{{ route('list.product')}}"><i class="bx bx-right-arrow-alt"></i>List Product</a>
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
            <li> <a href="{{ route('add.blog')}}"><i class="bx bx-right-arrow-alt"></i>Add Blog</a>
            </li>
            <li> <a href="{{ route('list.blog')}}"><i class="bx bx-right-arrow-alt"></i>List Blog</a>
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
            <li> <a href="{{ route('page.combo')}}"><i class="bx bx-right-arrow-alt"></i>Add Combo</a>
            </li>
            <li> <a href="{{ route('list.combo')}}"><i class="bx bx-right-arrow-alt"></i>List Combo</a>
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
                <a href="{{ route('add.coupon')}}"><i class="bx bx-right-arrow-alt"></i>Add Cupon </a>
            </li>
            <li>
                <a href="{{ route('list.coupon')}}"><i class="bx bx-right-arrow-alt"></i>List Cupon</a>
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
            <li> <a href="{{ route('list.order')}}"><i class="bx bx-right-arrow-alt"></i>List Order</a>
            </li>
            <li> <a href="{{ route('list.track') }}"><i class="bx bx-right-arrow-alt"></i>Tracking Request</a>
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
            <li> <a href="{{ route('list.subscribe')}}"><i class="bx bx-right-arrow-alt"></i>Subscriber list </a>
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
            {{-- <li>
                <a href="{{ route('add.setting')}}"><i class="bx bx-right-arrow-alt"></i>Add Setting </a>
            </li> --}}
            <li>
                <a href="{{ route('list.setting')}}"><i class="bx bx-right-arrow-alt"></i>Update Setting </a>
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
