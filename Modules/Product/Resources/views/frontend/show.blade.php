@extends('frontend.layouts.page')
@section('content')
<section style="text-align: right;background-color: #0c0c0ce8;padding-top: 3rem;min-height: 100vh">
    <div class="container">
        <div class="row pd-v-3">
            <div class="col-xl-3">

            </div>
            <div class="col-xl-5 " style="direction: rtl">
                <div style="display: flex;width: fit-content">
                    <a href="" style="color:#fed332;font-size: 18px">چاقو</a>
                    <pre style="color: white;font-size: 20px"> / </pre>
                    <a href="" style="color:#fed332;font-size: 18px">چاقو کمپ</a>
                </div>
                <h3 style="color: #ffffff;" class="d-none d-sm-block">{{$product->title}}</h3>
                <hr style="background-color: white">
                <div class="d-flex" style="align-items: center!important;padding: 1rem">
                    <img src="{{asset('images/like.png')}}" style="width: 24px" alt="">
                    <a style="color: white;padding: 0 1rem"> 99% از خریداران خرید این محصول را پیشنهاد داده اند</a>
                </div>
                <div style="display: flex;">
                    <div class="stars" style="display: flex;align-items: center;direction: ltr;padding: 0 1rem">
                        <img src="{{asset('images/star.png')}}" style="width: 20px;margin: 0 .5rem" alt="">
                        <span style="color: #ffffff">4.2(150)</span>
                    </div>
                    <a href="" style="color:#fed332;padding: 0 .5rem">12 دیدگاه </a>
                    <span style="color: white"> - </span>
                    <a href="" style="color:#fed332;padding: 0 .5rem">10 پرسش و پاسخ </a>
                </div>
                <div class="vrieties">

                        @php
                            $keys=[]
                        @endphp
                        @foreach($varieties as $variety)
                            @foreach($variety->specifications() as $specification)
                                @php
                                if (array_key_exists($specification[0],$keys)){
                                    array_push($keys[$specification[0]],$specification[1]);
                                }else{
                                     $keys[$specification[0]] =[$specification[1],];
                                }

                                @endphp
                            @endforeach
                        @endforeach
                    <div style="display: flex">

                            @foreach($keys as $title=>$key)
                            <div style="padding: 2rem">
                                <h3 style="color: white">{{$title}} :</h3>

                                <select name="" id="" style="width: 120px;border-radius:10px;background-color: #fed332;outline: none;border: 1px solid #fed332">
                                    @foreach($key as $value)
                                        <option value="" style="border-radius: 10px">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endforeach

                    </div>
                    <ul style="color: white;list-style: none">

                    </ul>
                </div>
            </div>
            <div class="float-right col-12 c-l-md-4 col-lg-4 col-xl-4 d-xl-flex"
                 style="direction: rtl;float: right !important;">
                <div class="product-title">
                    <h3 style="color: #ffffff;padding: 1rem" class="d-md-none">{{$product->title}}</h3>
                </div>
                <div class="icons"
                     style="padding: 1rem;display: flex;flex-direction: row-reverse;justify-content: space-between">
                    <div class="product-icons"
                         style="display:flex;flex-direction: column;align-items: center;justify-content: flex-start">
                        <a href="">
                            <img src="{{asset('images/share.png')}}" style="width: 24px;margin-bottom: 1.5rem" alt="">
                        </a>
                        <a href="">
                            <img src="{{asset('images/ribbon1.png')}}" style="width: 24px" alt="">
                        </a>
                    </div>
                    <div class="stars d-xl-none" style="display: flex;align-items: center">
                        <img src="{{asset('images/star.png')}}" style="width: 20px" alt="">
                        <span style="color: #ffffff">4.2(150)</span>
                    </div>

                </div>
                <img src="{{$product->thumbnail}}" alt="" style="width: 400px" class="product-img">
                <div class="price_info d-xl-none">
                    <h3 style="color: #ffffff">
                        {{$product->basePrice}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


