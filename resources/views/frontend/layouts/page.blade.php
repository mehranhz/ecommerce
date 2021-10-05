@include('frontend.layouts.head')
    @yield('css')
</head>
<body >
@include('frontend.layouts.topNav')
<main style="padding-top: 8rem">
    @yield('content')
</main>
@yield('scripts')
@include('frontend.layouts.footer')


