@extends('frontend.layouts.mobile.mobilePage')
@section('css')
    <link rel="stylesheet" href="{{asset('css/mobile/shop.css')}}">
@endsection
@section('content')
    <section class="products-section pd-v-3">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 product">
                        <a href="{{route('product.show',['product'=>$product->id])}}">
                            <img src="{{$product->thumbnail}}" class="c-product-img" alt="">
                        </a>

                        <div class="c-product-info">
                            <img src="{{asset('images/mobile/save.png')}}" alt="">
                            <h3>
                                <a href="{{route('product.show',['product'=>$product->id])}}"
                                   class="product-tile-title">{{$product->title}}</a>
                            </h3>
                            @if((is_null(Cart::count($product))) || (Cart::count($product) < $product->inventory))
                                <form action="{{route('cart.add',['id'=>$product->id])}}" method="post"
                                      id="add-to-cart-{{$product->id}}">
                                    @csrf
                                    <input type="hidden" name="type" value="product">
                                    <img src="{{asset('images/mobile/add-to-cart.png')}}" class="add-to-cart-btn" alt=""
                                         onclick='document.getElementById("add-to-cart-{{$product->id}}").submit()'>
                                </form>
                            @else
                                <img src="" alt="">
                            @endif


                        </div>
                        <h4 class="c-product-price">
                            {{$product->basePrice}} TM
                        </h4>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
@endsection
