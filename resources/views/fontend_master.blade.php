<!DOCTYPE html>
<html dir="ltr" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    @php
        $setting = DB::table('settings')->first();
    @endphp
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('meta_title', 'Flow Tech - The Power Of Technology')</title>
    <meta name="description" content="@yield('meta_description', 'Default Description')">
    <meta name="keywords" content="@yield('meta_keywords', 'Default Keywords')">
    @yield('meta')

    {{-- <script src="{{asset('assets/fontend/js/jquery.min.js')}}"></script> --}}
    <link rel="icon" href="{{ asset('assets/images/icons/favicon.png') }}" type="image/png" />
    <link rel="preload" href="catalog/view/theme/starship/fonts/MaterialIcons-Regular.woff2" as="font"
        crossorigin>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/fontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontend/css/all.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="{{ asset('assets/fontend/js/custom.js') }}"></script>

    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id={{ @$setting->google_analytics }}"></script>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ $setting->google_analytics }}');
    </script>

    <!-- Facebook Pixel Base Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $setting->facebook_pixel }}');
        fbq('track', 'PageView');
    </script>

    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ $setting->facebook_pixel }}&ev=PageView&noscript=1" />
    </noscript> --}}

    @stack('css')

    <style>
        .float {
            position: fixed;
            width: 50px;
            height: 50px;
            line-height: 50px;
            bottom: 65px;
            right: 20px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 26px;
            box-shadow: 2px 2px 3px #999;
            z-index: 99999 !important;

        }

        .float:hover {
            background-color: #25d366;
            color: #FFF;
        }

        .float_left {
            position: fixed;
            width: 50px;
            height: 50px;
            line-height: 50px;
            bottom: 128px;
            right: 20px;
            background-color: #1877f2;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 26px;
            box-shadow: 2px 2px 3px #999;
            z-index: 99999 !important;

        }

        .float_left:hover {
            background-color: #1877f2;
            color: #FFF;
        }

        .my-float {}
    </style>

    {{-- <script async src="{{asset('assets/fontend/js/site.min.26.js')}}" type="text/javascript"></script> --}}
    {{-- <script src="{{asset('assets/fontend/js/site.min.26.js')}}"></script> --}}

</head>

<body class="common-home">

    @include('frontend.layout.header')

    @yield('content')

    @yield('metaschema')


    <div>
        <a href="https://wa.me/8801611482988" class="float" target="_blank">
            <i class="fab fa-whatsapp my-float"></i>
        </a>
    </div>

    <div>
        <a href="https://m.me/275064276356369" class="float_left" target="_blank">
            <i class="fab fa-facebook-messenger my-float"></i>
        </a>
    </div>

    @include('frontend.layout.footer')

    <!-- footer en -->
    <div class="overlay"></div>

    <script src="{{ asset('assets/fontend/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/fontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/fontend/js/custom.js') }}"></script>
    <script src="{{ asset('assets/fontend/js/site.min.26.js') }}"></script>
    @stack('js')


</body>

</html>
