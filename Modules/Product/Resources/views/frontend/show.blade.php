@extends('frontend.layouts.page')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="d-flex flex-md-row-reverse pb-5">
                <div class="product-gallery " style="width: 35%">
                    <div class="d-flex flex-md-row-reverse">
                        <div class="product-action-bar">
                            <ul style="list-style: none;margin: 0!important; padding:0 1rem!important;">
                                <li style="padding: .5rem 0">
                                    <a href="">
                                        <img src="{{asset('images/heart.png')}}" alt="" style="width: 28px">
                                    </a>
                                </li>
                                <li style="padding: .5rem 0">
                                    <a href="">
                                        <img src="{{asset('images/share.png')}}" alt="" style="width: 28px">
                                    </a>
                                </li>
                                <li style="padding: .5rem 0">
                                    <a href="">
                                        <img src="{{asset('images/bell.png')}}" alt="" style="width: 28px">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="preview" style="padding: .5rem">
                            <img src="{{$product->thumbnail}}" class="responsive-image" alt="">
                        </div>
                    </div>

                </div>
                <div class="product-info-section px-3" style="width: 45%">
                    <div class="product-information" style="border-bottom: 1px solid #ffffff;text-align: right">
                        @if(isset($category))
                            <div class="product-categories-breadcrumb d-flex flex-md-row-reverse">
                                @if(isset($category->parentCategory))
                                    <a href="{{route('category',['category'=>$category->parentCategory->id])}}"
                                       class="clickable"
                                       style="font-size: 20px !important;">{{$category->parentCategory->title}} </a>
                                    <pre class="white-text" style="font-size: 20px !important;"> / </pre>
                                @endif
                                <a href="{{route('category',['category'=>$category->id])}}"
                                   style="font-size: 20px !important;"
                                   class="clickable"> {{$category->title}}</a>
                            </div>
                        @endif
                        <h1>
                            {{$product->title}}
                        </h1>
                        <span>bush</span>
                    </div>
                    <div class="attributes text-right" style="padding: 1rem .5rem">
                        <span style="font-size: 18px;font-weight: 600">ویژگی های کالا</span>
                        <ul style="list-style: none">
                            <li style="padding: .25rem 0">ویژگی</li>
                            <li style="padding: .25rem 0">ویژگی</li>
                            <li style="padding: .25rem 0">ویژگی</li>
                            <li style="padding: .25rem 0">ویژگی</li>
                        </ul>
                    </div>
                </div>
                <div class="product-purchase"
                     style="width: 20%;background-color: #1d1d1d;border-radius: 7px;padding: 1rem;position:relative;">
                    <div class="market-info text-right" style="border-bottom: 1px solid gray;padding: .5rem 0">
                        <span>فروشنده </span>
                        <div class="market">
                            <h6>inferno</h6>
                            <span style="">100% رضایت خرید </span>
                        </div>
                    </div>
                    <div class="guarantee text-right" style="padding: .5rem 0;border-bottom: 1px solid gray">
                        <span>گارانتی و سلامت فیزیکی کالا</span>
                    </div>
                    <div class="inventory text-right" style="padding: .5rem 0; border-bottom: 1px solid gray">
                        <span>موجود در انبار اینفرنو</span>
                    </div>
                    <div class="inferno-club-point text-right"
                         style="direction: rtl;padding: .5rem 0;border-bottom: 1px solid gray">
                        <span style="text-align: right">  20  امتیاز اینفرنو کلاب</span>
                    </div>
                    <div class="purchase">
                        <p style="font-size: 24px;width: 100%;text-align: right">قیمت</p>
                        @if($product->discount > 0)
                            <div class="discount" style="font-size: 20px">
                                <span
                                    style="background-color: red;padding: 0 .5rem;border-radius: 12px">{{$product->discount}}</span>
                                <span style="text-decoration: line-through">{{$product->basePrice}}</span>
                            </div>
                        @endif
                        <span style="font-size: 24px">{{$product->price()}}</span>
                    </div>
                    <form action="{{route('cart.add',['id'=>$product->id])}}" method="post" style="position: absolute;bottom: 0;width: 100%;right: 0;left: 0;" class="text-center pb-5 px-5">
                        @csrf
                        <input type="hidden" name="type" value="product">
                        @if($product->inventory - Cart::count($product) > 0)
                            <input type="submit" class="btn btn-lg  btn-outline-warning" style="width: 100%;"
                                   value="افزودن به سبد خرید">
                        @else
                            <input type="submit" class="btn btn-lg  btn-outline-secondary" style="min-width: 100%" disabled
                                   value="ناموجود">
                        @endif

                    </form>
                </div>
            </div>
            @if($product->review !== null)
                <div class="product-data text-right px-5 pt-3" style="border-top: 1px solid gray;direction: rtl">
                    <div style="border-bottom: 1px solid red;max-width:fit-content;direction: rtl">
                        <span style="padding: 1rem 0;font-size: 24px"> نقد و بررسی کالا</span>
                        <span style="display: block">{{$product->title}}</span>
                    </div>
                    <div class="px-5 py-4 ">
                        <h4 class="pl-5">نقد و بررسی</h4>
                        <p>
                            {!! $product->review !!}
                        </p>
                    </div>
                </div>
            @endif

            @if($product->specifications !==null)
                <div class="product-data text-right px-5 pt-3" style="border-top: 1px solid gray;direction: rtl">
                    <div style="border-bottom: 1px solid red;max-width:fit-content;direction: rtl">
                        <span style="padding: 1rem 0;font-size: 24px"> مشخصات کالا</span>
                        <span style="display: block">{{$product->title}}</span>
                    </div>
                    <div class="px-5 py-4 d-flex ">
                        <h4 class="pl-5">مشخصات</h4>
                        <ul style="list-style: none;margin: 0;padding: 0;flex-grow: 1">
                            @foreach($product->specifications() as $specification)

                                <li style="width: 100%;" class="d-flex  py-2">
                                    <div class="param_key" style="width: 25%">
                                    <span class="px-2 ">
                                {{$specification[0]}}
                                    </span>
                                    </div>
                                    <div class="oaram_value" style="width: 75%">
                                    <span class="px-2">
                                {{$specification[1]}}
                                    </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if(!$comments->isEmpty() )
                <div class="product-data text-right px-5 pt-3" style="border-top: 1px solid gray;direction: rtl">
                    <div style="border-bottom: 1px solid red;max-width:fit-content;direction: rtl">
                        <span style="padding: 1rem 0;font-size: 24px">دیدگاه کاربران</span>
                        <span style="display: block">{{$product->title}}</span>
                    </div>
                    <div class="px-5 py-4 d-flex ">
                        <ul style="list-style: none;margin: 0;padding: 0;flex-grow: 1">
                            @foreach($comments as $comment)
                                <li>
                                    <div class="comment pt-3 pb-2" style="border-bottom: 1px solid gray">
                                        <div class="comment-header d-flex"
                                             style="border-bottom: 3px solid gray;max-width: fit-content">
                                            <p class="px-1">{{$comment->user->name}}</p>
                                            <p class="px-1">4 مهر 1400</p>
                                        </div>
                                        <div class="comment-body px-3 py-3">
                                            {{$comment->comment}}
                                        </div>
                                        <div class="comment-footer d-flex" style="direction: ltr">
                                            <div class="d-flex">
                                                <a href="" style="padding: 0 .25rem">
                                                    <img src="{{asset('images/mobile/report.png')}}" alt="">
                                                </a>
                                                <a href="" style="padding: 0 .25rem">
                                                    <img src="{{asset('images/mobile/18-heart.png')}}" alt="">
                                                </a>
                                            </div>
                                            <span>آیا این دیدگاه برایتن مفید بود؟</span>
                                        </div>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection


