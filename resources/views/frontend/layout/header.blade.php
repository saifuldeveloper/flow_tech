    <!-- header start -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        #search_suggestion {
            display: none;
            transition: height 0.5s ease-in-out;
            overflow: hidden;
        }
    </style>
    @php
        $setting = DB::table('settings')->first();
        $totalQuantity = Cart::count();
    @endphp
    <style>
        .cart {
            position: relative;
            display: block;
            width: 28px;
            height: 28px;
            height: auto;
            overflow: hidden;

            .fa-cart-shopping {
                position: relative;
                top: 4px;
                z-index: 1;
                font-size: 27px;
                color: white;
            }

            .count {
                position: absolute;
                top: 0;
                right: 0;
                z-index: 999;
                font-size: 11px;
                border-radius: 50%;
                background: #d60b28;
                width: 16px;
                height: 16px;
                line-height: 16px;
                display: block;
                text-align: center;
                color: white;
                font-family: 'Roboto', sans-serif;
                font-weight: bold;
            }
        }

        /*----search --*/

        .search_product {
            position: relative;
        }

        #search_suggestion {
            position: absolute;
            display: none;
            top: 100%;
    
            /* height: 300px; */
            /* left: 0; */
            right: 0PX;
            z-index: 1000;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: 0;
            overflow-y: auto;
            border-radius: 5px;
        }

        .product_card {
            display: flex;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .product_thumb {
            width: 60px;
            height: 60px;
            margin-right: 10px;
            border-radius: 5px;
        }

        .product_thumb img {
            width: 100%;
            height: 100%;
        }

        .product_card_body {
            display: flex;
            flex-direction: column;
        }

        .product_card_body .product_title {
            font-size: 16px;
            margin-bottom: 5px;
        }
    </style>

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
                    <a class="brand" href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" title=""
                            style="height: 50px; width: 140px;" alt=" "></a>
                    <div class="mbl-right h-desk">
                        <div class="ac search-toggler" style="color:#fff"><i class="fa fa-search"></i></div>

                    </div>
                </div>
                <div class="ht-item search" id="search">
                    <form  action="{{ route('product.search') }}" method="get">
                        @csrf
                        <input type="hidden" name="not_ajax" value="not_ajax">
                        <input class="search_product" id="search_product" type="search" name="search"
                            placeholder="Search..." />
                        <button type="submit" class=""><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <div id="search_suggestion">

                    </div>

                </div>
                <div class="ht-item q-actions">
                    <div class="ac">
                        <a class="ic" href="{{ url('/') }}"><i class="fa-solid fa-home"></i></a>
                        <div class="ac-content">
                            <a href="tel:+88{{ $setting->hotlinephone }}">
                                <h5>Hotline</h5>
                            </a>
                            <p><a href="tel:+88{{ $setting->hotlinephone }}">{{ $setting->hotlinephone }}</a> </p>

                        </div>
                    </div>
                    <a href="{{ route('latest.offer.page') }}" class="ac h-offer-icon">
                        <div class="ic"><i class="fa-solid fa-gift"></i></div>
                        <div class="ac-content">
                            <h5>Offers</h5>
                            <p>Latest Offers</p>

                        </div>
                    </a>
                    <div class="ac">
                        <a class="ic" href="{{ route('login') }}"><i class="fa fa-user"></i></a>
                        <div class="ac-content">
                            <a href="{{ route('login') }}">
                                <h5>Account</h5>
                            </a>
                            <p>
                                @if (Auth::check())
                                    <a href="{{ route('account') }}">Dashboard</a>
                                @else
                                    <a href="{{ route('register') }}">Register</a>
                                @endif

                                or {!! Auth::user()
                                    ? '<a href="' .
                                        route('logout') .
                                        '" onclick="event.preventDefault(); document.getElementById(\'logout-form\').submit();">Logout</a>'
                                    : '<a href="' . route('login') . '">Login</a>' !!}
                            </p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="ac">
                        <div class="cart">
                            <span class="count  totalCartDisplay" id="totalCartDisplay">{{ $totalQuantity }}</span>
                            <!--   <span class="count">1</span> -->
                            {{-- <i class="fa-solid fa-cart-shopping">shopping_cart</i> --}}
                            <a class=""; href="{{ Route('show.cart') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>

                        <div class="">
                            <a href="{{ Route('show.cart') }}">
                                <h5>Cart</h5>
                            </a>
                            <p><a href="{{ Route('show.cart') }}">Cart Page </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $category = DB::table('categories')->limit(15)->get();
        @endphp
        <!-- navbar start -->
        <nav class="navbar" id="main-nav">
            <div class="container">
                <ul class="navbar-nav">
                    {{-- <li class="nav-item has-child c-1">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="{{ Route('allcategory') }}">Category</a>
                        <ul class="drop-down drop-menu-1">
                            @foreach ($category as $category)
                                <li class="nav-item has-child">
                                    <a class="nav-link"
                                        href="{{ route('category.view', ['category_slug' => $category->category_slug]) }}">{{ $category->category_name }}</a>
                                    @php
                                        $id = $category->id;
                                        $subcategory = DB::table('sub_categories')->where('category_id', $id)->get();
                                    @endphp
                                    @if ($subcategory)
                                        <ul class="drop-down drop-menu-2">
                                            @foreach ($subcategory as $subcategory)
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ route('subcategory.view', ['subcategory_slug' => $subcategory->subcategory_slug]) }}">{{ $subcategory->subcategory_name }}</a>
                                                    @php
                                                        $id = $subcategory->id;
                                                        $childcategory = DB::table('chlild_categories')
                                                            ->where('sub_category_id', $id)
                                                            ->get();
                                                    @endphp
                                                    @if ($childcategory)
                                                        <ul class="drop-down drop-menu-2">
                                                            @foreach ($childcategory as $childcategory)
                                                                <li class="nav-item">
                                                                    <a class="nav-link"
                                                                        href="{{ route('childcategory.view', ['childcategory_slug' => $childcategory->childcategory_slug]) }}">{{ $childcategory->childcategory_name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="{{ Route('allProduct.show') }}">Shop</a>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="{{ Route('contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item has-child c-1">
                        <a class="nav-link" href="{{ Route('aboutUs') }}">About</a>
                    </li> --}}
                    @foreach ($category as $category)
                                <li class="nav-item has-child">
                                    <a class="nav-link"
                                        href="{{ route('category.view', ['category_slug' => $category->category_slug]) }}">{{ $category->category_name }}</a>
                                    @php
                                        $id = $category->id;
                                        $subcategory = DB::table('sub_categories')->where('category_id', $id)->get();
                                    @endphp
                                    @if ($subcategory)
                                        <ul class="drop-down drop-menu-2">
                                            @foreach ($subcategory as $subcategory)
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ route('subcategory.view', ['subcategory_slug' => $subcategory->subcategory_slug]) }}">{{ $subcategory->subcategory_name }}</a>
                                                    @php
                                                        $id = $subcategory->id;
                                                        $childcategory = DB::table('chlild_categories')
                                                            ->where('sub_category_id', $id)
                                                            ->get();
                                                    @endphp
                                                    @if ($childcategory)
                                                        <ul class="drop-down drop-menu-2">
                                                            @foreach ($childcategory as $childcategory)
                                                                <li class="nav-item">
                                                                    <a class="nav-link"
                                                                        href="{{ route('childcategory.view', ['childcategory_slug' => $childcategory->childcategory_slug]) }}">{{ $childcategory->childcategory_name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                </ul>
            </div>
        </nav>
        <!-- navbar end -->

    </header>
    {{-- popup banner --}}
    {{-- @include('frontend.pages.popup') --}}





    <script>
        document.getElementById("search_product").addEventListener("keyup", function() {
            let searchText = this.value;

            if (searchText !== "") {
                let suggestionBox = document.getElementById("search_suggestion");
                suggestionBox.style.display = "block";
                // suggestionBox.style.height = suggestionBox.scrollHeight + "px";

                fetch("{{ route('product.search') }}?search=" + searchText)
                    .then(response => response.json())
                    .then(res => {
                        console.log(res);
                        suggestionBox.innerHTML = "";
                        let row = "";
                        res.forEach(function(value) {
                            console.log(value);
                            row += '<div class="product_card">' +
                                '<a class="product_thumb" href="/product/' + value.product_slug + '">' +
                                '<img class="lazy" alt="Product" src="/' + value.image_one + '" alt="' +
                                value.product_name + '"></a>' +
                                '<div class="product_card_body">' +
                                '<h3 class="product_title"><a href="/product/' + value.product_slug + '">' +
                                value.product_name + '</a></h3>' +
                                '</div>' +
                                '</div>';
                        });
                        suggestionBox.innerHTML = row;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                let suggestionBox = document.getElementById("search_suggestion");
                suggestionBox.style.height = "0";
                suggestionBox.addEventListener("transitionend", function() {
                    suggestionBox.style.display = "none";
                }, {
                    once: true
                });
            }
        });
    </script>
