@include('frontend.layouts.head')
<link rel="stylesheet" href="{{asset('css/mobile/mobile.css')}}">
@yield('css')
</head>
<body>
@include('frontend.layouts.mobile.mobileTopBar')
@yield('content')
@include('frontend.layouts.mobile.bottomNav')
@yield('scripts')
@include('frontend.layouts.footer')
@yield('scripts')
</body>
</html>
