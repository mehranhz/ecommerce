<header>
    @include('frontend.layouts.topBar')
    <div class="row d-nav"  id="d-nav" >
        <ul style="display: flex;flex-direction: row-reverse;list-style: none;margin: 0!important;">
            <li style="padding: 0 1rem;margin: 0">
                <a href="{{route('shop')}}" class="clickable">دسته بندی ها</a>
            </li>
            <li style="padding: 0 1rem;margin: 0">
                <a href="{{route('shop')}}" class="clickable">فروشگاه</a>
            </li>
        </ul>
    </div>
</header>
