@include('frontend.layouts.head')
<link rel="stylesheet" href="{{asset('css/mobile.css')}}">
@yield('css')
</head>
<body>
@include('frontend.layouts.topBar')
@yield('content')
@include('frontend.layouts.bottomNav')
@yield('scripts')
@include('frontend.layouts.footer')


