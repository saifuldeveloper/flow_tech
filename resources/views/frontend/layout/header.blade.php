    <!-- header start -->
    @php
         $setting = DB::table('settings')->first();
    @endphp
    <header id="header">
        <div class="top">
            <div class="container">
                <div class="ht-item logo">
                    <div class="mbl-nav-top h-desk">
                        <div id="nav-toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <a class="brand" href="{{url('/')}}"> <img src="{{asset($setting->logo)}}" title="" width="" height="" alt=" "></a>
                    <div class="mbl-right h-desk" >
                        <div class="ac search-toggler" style=""><i class="material-icons"></i></div>

                    </div>
                </div>
                <div class="ht-item search"  id="search">
                    <form method="post" action="{{ route('product.search') }}">
                        @csrf
                    <input class="search_product" id="search_product" type="text" name="search" placeholder="Search"  />
                    <button type="submit" class=""><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                </div>

                <div class="ht-item q-actions">

                    <div class="ac">

                        <a class="ic" href="{{url('/')}}"><i class="fa-solid fa-home"></i></a>
                        <div class="ac-content">
                            <a href="tel:+88{{$setting->hotlinephone}}"><h5>Hotline</h5></a>
                            <p><a href="tel:+88{{$setting->hotlinephone}}">{{$setting->hotlinephone}}</a>  </p>

                        </div>
                     </div>


                    <a href="{{ route('latest.offer.page')}}" class="ac h-offer-icon">
                        <div class="ic"><i class="fa-solid fa-gift"></i></div>
                        <div class="ac-content">
                            <h5>Offers</h5>
                            <p>Latest Offers</p>

                        </div>
                    </a>



                    <div class="ac">

                        <a class="ic" href="login.html"><i class="fa-solid fa-user"></i></a>
                        <div class="ac-content">
                            <a href="login.html"><h5>Account</h5></a>

                           <p>

                            @if(Auth::check())
                            <a href="{{ route('user.dashboard') }}">Dashboard</a>

                            @else
                            <a href="{{ route('register') }}">Register</a>
                            @endif




                            or {!! Auth::user() ? '<a href="' . route('logout') . '" onclick="event.preventDefault(); document.getElementById(\'logout-form\').submit();">Logout</a>' : '<a href="' . route('login') . '">Login</a>' !!}</p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                     </div>
                     <div class="ac">
                        <a class="ic" href="{{Route('show.cart')}}"><i class="fa-solid fa-cart-shopping"></i></a>

                  <div class="ac-content">
                <a href="{{Route('show.cart')}}"><h5>Cart</h5></a>
                <p><a href="{{Route('show.cart')}}">Cart Page </a> </p>
                   </div>
                      </div>

                </div>
            </div>
        </div>
    @php
        $category= DB::table('categories')->get();
    @endphp
        <!-- navbar start -->
        <nav class="navbar" id="main-nav">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item has-child c-1">
                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                 </li>
                  <li class="nav-item has-child c-1">
                      <a class="nav-link" href="{{Route('allcategory')}}">Category</a>
                      <ul class="drop-down drop-menu-1">
                        @foreach ($category as $category )
                        <li class="nav-item has-child">
                            <a class="nav-link" href="{{url('category/product/details/'.$category->id)}}">{{$category->category_name}}</a>
                            @php
                              $id=$category->id;
                                $subcategory = DB::table('sub_categories')->where('category_id',$id)->get();
                            @endphp
                            @if ($subcategory)
                            <ul class="drop-down drop-menu-2">
                                @foreach ($subcategory as $subcategory )
                                <li class="nav-item"><a class="nav-link" href="">{{$subcategory->subcategory_name}}</a></li>
                                @endforeach
                             </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item has-child c-1">
                    <a class="nav-link" href="{{Route('allProduct.show')}}">Shop</a>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="{{Route('contact')}}">Contact Us</a>
                        </li>
                        <li class="nav-item has-child c-1">
                            <a class="nav-link" href="{{Route('aboutUs')}}">About</a>
                            </li>



            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    </header>

    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "product-list",
            success: function(response) {
                console.log(response);
                startAutoComplete(response);

            }

        });
        function startAutoComplete(availableTags){

            $("#search_product").autocomplete({
                source: availableTags
            });
        }
    </script>
