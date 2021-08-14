<div class="top-bar">
    <div class="rtl-row">
        <div class="col-2 top-bar-col" >
            <img class="top-bar-icon " src="{{asset('images/send.png')}}" alt="">
        </div>

        <div class="col-6 top-bar-col">
            <input class="search-bar" type="text" placeholder="جستجوی محصول">
        </div>
        <div class="col-4 top-bar-col">
            <ul>
                <li>
                    <div>

{{--                        @if(Cart::all()->count()>0)--}}
                            <a href="{{route('cart.index')}}">
                                <img src="{{asset('images/cart.png')}}" alt="" class="top-bar-icon">

{{--                                <div--}}
{{--                                    style="width: 20px;height: 20px;background: red;display: flex;justify-content: center;align-items: center;border-radius: 50%;position: absolute;bottom: -3px;right: -4px">--}}
{{--                                    <span style="color: white;font-size: 14px">{{Cart::all()->count()}}</span>--}}
{{--                                </div>--}}
                            </a>
{{--                        @endif--}}
                    </div>
                </li>
                <li>
                    <a href="{{auth()->user()? route('profile'):route('login')}}">
                        <img src="{{asset('images/user.png')}}" class="top-bar-icon">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
