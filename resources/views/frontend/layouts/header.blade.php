<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Inferno</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>
<body>

<header>
    <div class="top-nav">
        <div class="rtl-row">
            <div class="" style="">
                <img class="dm-icon d-md-none" src="{{asset('images/send.png')}}" alt="">
                <h3 style="color: yellow" class="d-none d-md-block">Inferno Knives</h3>
            </div>

            <div class="">
                <input class="search-bar" type="text" placeholder="جستجوی محصول">
            </div>
            <div class="">
                <ul style="display: flex">
                    <li>
                        <div style="position:relative;">

                            @if(Cart::all()->count()>0)
                                <a href="{{route('cart.index')}}">
                                    <img src="images/cart.png" alt="">

                                    <div
                                        style="width: 20px;height: 20px;background: red;display: flex;justify-content: center;align-items: center;border-radius: 50%;position: absolute;bottom: -3px;right: -4px">
                                        <span style="color: white;font-size: 14px">{{Cart::all()->count()}}</span>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </li>
                    <li>
                        <img src="{{asset('images/user.png')}}" style="width: 24px" alt="">
                    </li>
                </ul>
            </div>
        </div>


    </div>
    <div class="spacer d-none d-md-block">
        &nbsp;
    </div>
    <div class="dnav d-none d-md-flex" style="margin-top: 3rem !important;">
        <ul>
            <li><a href="{{route('shop')}}">فروشگاه</a></li>
            <li><a href="">گالری</a></li>
            <li><a href="">مطالب</a></li>
            <li><a href="">بیوگرافی</a></li>
        </ul>
    </div>
</header>
