@include('frontend.layouts.head')
    @yield('css')
</head>
<body>
@include('frontend.layouts.topNav')
@yield('content')
@yield('scripts')
@include('frontend.layouts.footer')


