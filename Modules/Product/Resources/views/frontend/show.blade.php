@extends('frontend.layouts.page')
@section('content')
<section>
    <div class="container-fluid">
        <div class="d-flex flex-md-row-reverse">
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
                                   class="clickable" style="font-size: 20px !important;">{{$category->parentCategory->title}} </a>
                                <pre class="white-text" style="font-size: 20px !important;"> / </pre>
                            @endif
                            <a href="{{route('category',['category'=>$category->id])}}" style="font-size: 20px !important;"
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
            <div class="product-purchase" style="width: 20%;background-color: #1d1d1d;border-radius: 7px;padding: 1rem;">
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
                <div class="inferno-club-point text-right" style="direction: rtl;padding: .5rem 0;border-bottom: 1px solid gray">
                    <span style="text-align: right">  20  امتیاز اینفرنو کلاب</span>
                </div>
                <div class="purchase">
                    <p style="font-size: 24px;width: 100%;text-align: right">قیمت</p>
                    @if($product->discount > 0)
                    <div class="discount" style="font-size: 20px">
                        <span style="background-color: red;padding: 0 .5rem;border-radius: 12px">{{$product->discount}}</span>
                        <span style="text-decoration: line-through">{{$product->basePrice}}</span>
                    </div>
                    @endif
                    <span style="font-size: 24px">{{$product->price()}}</span>
                </div>
                <form action="">
                    <input type="submit" class="btn btn-lg form-control btn-outline-warning" value="افزودن به سبد خرید">
                </form>
            </div>
        </div>
        <div class="product-data">
            <div class="data-header d-flex flex-md-row-reverse">
                <ul style="list-style: none;direction: rtl" class="d-flex">
                    <li style="padding:0 .5rem">مشخصات</li>
                    <li style="padding:0 .5rem">دیدگاه کاربران</li>
                    <li style="padding:0 .5rem"> پرسش و پاسخ</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection


