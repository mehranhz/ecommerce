@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<main class="" style="min-height: 100vh">
@yield('page')
</main>
@yield('script')
@include('admin.layouts.footer')
