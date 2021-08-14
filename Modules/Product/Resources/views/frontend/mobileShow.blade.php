@extends('frontend.layouts.mobilePage')
@section('css')
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
@endsection
@section('content')

    <section class="product-info-section">
        <div class="spacer"></div>
        <div class="container ">
            <div class="product-card">
               @if(isset($category))
                    <div class="product-categories-breadcrumb">
                        @if(isset($category->parentCategory))
                            <a href="{{route('category',['category'=>$category->parentCategory->id])}}" class="clickable">{{$category->parentCategory->title}}</a>
                            <pre class="white-text">/</pre>
                        @endif
                        <a href="{{route('category',['category'=>$category->id])}}" class="clickable">{{$category->title}}</a>
                    </div>
                    <hr style="background-color: white">
                @endif

                <h1 class="product-title">{{$product->title}}</h1>

                <img src="{{$product->thumbnail}}" alt="" class="responsive-image">
                <div class="product-icons-ribbon">
                    <div class="product-action-btns">
                        <a href="" class="action-btn">
                            <img src="{{asset('images/ribbon1.png')}}" alt="">
                        </a>
                        <a href="" class="action-btn">
                            <img src="{{asset('images/share.png')}}" alt="">
                        </a>
                        <a href="" class="action-btn">
                            <img src="{{asset('images/bell.png')}}" alt="">
                        </a>
                    </div>
                    <div class="product-stars">
                        <img src="{{asset('images/star.png')}}" alt="">
                        <span>4.2(150)</span>
                    </div>
                </div>
                <div class="product-recommendations action-btn" >
                    <img src="{{asset('images/like.png')}}"  alt="">
                    <a style=""> 99% از خریداران این محصول را پیشنهاد داده اند</a>
                </div>
            </div>

            <div class="product-card">
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
                    @foreach($keys as $title=>$key)
                        <div class="form-group variety-container">
                            <h4>{{$title}} :</h4>
                            <select class="form-control product-specifications-select" name="" id="">
                                @foreach($key as $value)
                                    <option value="">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>
                <div class="product-price-container">
                    @if($product->discount > 0)
                        <div class="product-discount">
                            <span class="product-discount">{{$product->discount}} %</span>
                            <span class="product-old-price">{{$product->basePrice}} تومان</span>
                        </div>
                    @endif
                    <div class="d-flex space-between">
                        <p class="product-price">{{$product->basePrice -(( $product->basePrice/100)*$product->discount)}}
                            تومان</p>
                        <form action="{{route('cart.add',['id'=>$product->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="product">
                            <input type="submit" value="افزودن به سبد خرید" class="btn btn-md clickable-btn">
                        </form>
                    </div>
                </div>
            </div>
            <div class="product-card">
                @if(count($product->specifications())>0)

                    <div class="product-review">
                        <div class="review-header">
                            <a href="" class="clickable"> بیشتر </a>
                            <h3>نقد و بررسی تخصصی</h3>
                        </div>
                        <div>
                            {!! \Illuminate\Support\Str::limit($product->review,250) !!}
                        </div>
                    </div>
                    <hr class="light-hr">
                    <div class="product-specifications">
                        <h3>مشخصات محصول</h3>
                        <table class="table table-striped table-dark table-bordered">
                            <tbody>
                            @foreach($product->specifications() as $specification)
                                <tr>
                                    <td>{{$specification[0]}}</td>
                                </tr>
                                <tr>
                                    <td>{{$specification[1]}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection


