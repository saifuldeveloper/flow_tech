<!DOCTYPE html>
<html dir="ltr" lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('meta_title', 'Flow Tech - The Power Of Technology')</title>
    <meta name="description" content="@yield('meta_description', 'Default Description')">
    <meta name="keywords" content="@yield('meta_keywords', 'Default Keywords')">
    @yield('meta')

    {{-- <script src="{{asset('assets/fontend/js/jquery.min.js')}}"></script> --}}

    <link href="{{ asset('assets/fontend/image/logo1.png') }}" rel="icon" />

    <link rel="preload" href="catalog/view/theme/starship/fonts/MaterialIcons-Regular.woff2" as="font"
        crossorigin>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/fontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontend/css/all.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="{{ asset('assets/fontend/js/custom.js') }}"></script>

    {{-- <script async src="{{asset('assets/fontend/js/site.min.26.js')}}" type="text/javascript"></script> --}}
    {{-- <script src="{{asset('assets/fontend/js/site.min.26.js')}}"></script> --}}

</head>


<body class="common-home">

    @include('frontend.layout.header')

    @yield('content')

    @yield('metaschema')
    @include('frontend.layout.footer')

    <!-- footer en -->
    <div class="overlay"></div>

    <script src="{{ asset('assets/fontend/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/fontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/fontend/js/custom.js') }}"></script>
    <script src="{{ asset('assets/fontend/js/site.min.26.js') }}"></script>
</body>

</html>
