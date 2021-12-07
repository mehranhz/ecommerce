@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
    <script src="{{asset('js/ckeditor-4/ckeditor.js')}}"></script>

@stop
@section('content')
    <main class="" style="min-height: 100vh">
        @yield('page')
    </main>
@endsection
@yield('script')

