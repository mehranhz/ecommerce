<nav class="bottom-nav d-block d-md-none">
    <div>
        <ul class="navigation-bar">
            <ul class="nav-menu right-menu">
                <li><a class="navigation-link" href="{{route('shop')}}">فروشگاه</a></li>
                <li><a class="navigation-link" href="">گالری</a></li>
            </ul>
            <li class="bottom-logo">
                <a href="/">
                    <img src="{{asset('images/logo.png')}}" style="width: 64px;" alt="">
                </a>
            </li>
            <ul class="nav-menu left-menu">
                <li><a class="navigation-link" href="">مطالب</a></li>
                <li><a class="navigation-link" href="">بیوگرافی</a></li>
            </ul>
        </ul>
    </div>
</nav>
@yield('scripts')
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
