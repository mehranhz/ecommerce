<aside>

    <div class="sidebar-user">
        <div class="sidebar-profile-img">
            <img src="/img/mehran.jpg" alt="">
        </div>
        <div class="sidebar-profile-info">
            <ul>Mehran Hosseinzadeh</ul>
            <ul>Manager</ul>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="sidebar-item">
            <a href="{{route('admin.fileManager')}}" class="sidebar-item-title">فایل منیجر</a>
        </li>
        @foreach(Module::collections() as $module)
            @if(View::exists("{$module->getLowerName()}::admin.sidebar-item"))
                @include("{$module->getLowerName()}::admin.sidebar-item")
            @endif
        @endforeach
    </ul>


    <div class="sidebar-dropdown">
        <div class="sidebar-item">
            <a href="" class="sidebar-item-title">ماژول ها</a>
            <a href="" class="dd-link">...</a>
        </div>

        <div class="sidebar-dropdown-content">
            <ul>
                @foreach(Module::collections() as $module)
                    @if(View::exists("{$module->getLowerName()}::admin.setting"))
                        @include("{$module->getLowerName()}::admin.setting")
                    @endif
                @endforeach
            </ul>

        </div>


    </div>

</aside>
