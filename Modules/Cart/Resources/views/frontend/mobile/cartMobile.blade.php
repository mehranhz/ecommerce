@extends('frontend.layouts.mobile.mobilePage')
@section('css')
    <link rel="stylesheet" href="{{asset('css/mobile/cart.css')}}">
@endsection
@section('content')
    <section class="cart-section">
        <div class="container pd-v-3">
            @foreach(Cart::all() as $item)
                @php
                    $type = Cart::itemType($item);
                    $product = $item[$type];
                @endphp

                <div class="cart-item">
                    <div class="row">
                        <div class="col-7">
                            <img src="{{$item['Product']->thumbnail}}" class="responsive-image" alt="">
                        </div>

                        <div class="col-5">
                            <div class="cart-item-detail">
                                <span class="item-title">{{$product->title}}</span>

                                <div class="item-market">
                                    <img src="{{asset('images/mobile/store.png')}}" alt="">
                                    <span style="font-size: 14px;padding:0 .5rem">Inferno</span>
                                </div>
                                <div class="item-market">
                                    <img src="{{asset('images/mobile/truck.png')}}" alt="">
                                    <span style="font-size: 14px;padding:0 .5rem">ارسال توسط اینفرنو</span>
                                </div>
                                @if(strtolower($type)=='variety')
                                    @foreach($product->specifications() as $specification)
                                        <span style="color: grey">{{$specification[0]}}-{{$specification[1]}}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>

                    <div class="col-12">
                        <div class="cart-item-footer">
                            <div class="quantity-control">
                                <div class="quantity-control-btn">
                                    <form action="{{route('cart.add',['id'=>$product->id])}}" method="post"
                                          id="add-to-cart-{{$product->id}}">
                                        @csrf
                                        <input type="hidden" name="type" value="{{$type}}">
                                        @if($product->inventory > $item['quantity'])
                                            <img src="{{asset('images/mobile/plus.png')}}" class="add-to-cart-btn"
                                                 alt=""
                                                 onclick='document.getElementById("add-to-cart-{{$product->id}}").submit()'>
                                        @else
                                        @endif
                                    </form>
                                </div>
                                <span class="quantity-control-btn">{{$item['quantity']}}</span>
                                <div class="quantity-control-btn">
                                    @if($item['quantity']==1)
                                        <form method="post" action="{{route('cart.remove.item',['item'=>$item['id']])}}"
                                              id="remove-from-cart-{{$product->id}}">
                                            @method('DELETE')
                                            @csrf
                                            <img src="{{asset('images/mobile/trash-can.png')}}"
                                                 onclick='document.getElementById("remove-from-cart-{{$product->id}}").submit()'
                                                 alt="">
                                        </form>
                                    @else
                                        <form method="post" id="minus-item-{{$product->id}}"
                                              action="{{route('cart.add',['id'=>$product->id])}}">
                                            <input type="hidden" name="type" value="{{$type}}">
                                            <input type="hidden" name="number" value="{{-1}}">
                                            @csrf
                                            <img src="{{asset('images/mobile/minus.png')}}"
                                                 onclick='document.getElementById("minus-item-{{$product->id}}").submit()'
                                                 alt="">
                                        </form>
                                    @endif

                                </div>
                            </div>

                            <div class="cart-item-price-wrap">
                                @if($product->discount > 0)
                                    <span class="cart-item-discount">
                                        تخفیف {{($product->basePrice/100) * $product->discount}}</span>
                                @endif
                                <span
                                    class="cart-item-price">{{($product->basePrice - (($product->basePrice/100)*$product->discount)) * $item['quantity']}}</span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

            @if(Cart::all()->count()>0)
                <div class="cart-approve-section">
                    <div class="cart-approve-wrap">
                        <form action="{{route('order.register')}}" method="post">
                            @csrf
                            <input type="submit" class="btn cart-approve-btn" value="تکمیل فرایند خرید">
                        </form>
                    </div>
                    <div class="cart-price-wrap">
                        <span>مبلغ قابل پرداخت</span>
                        <span class="cart-price">{{Cart::price()}}</span>
                    </div>
                </div>

            @else
                <h2 class="text-center"> سبدخرید شما خالی است </h2>
            @endif
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function changeQuantity(event, id, cartName = null) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            //
            $.ajax({
                type: 'POST',
                url: '/cart/quantity/change',
                data: JSON.stringify({
                    id: id,
                    quantity: event.target.value,
                    // cart : cartName,
                    _method: 'patch'
                }),
                success: function (res) {
                    console.log(res)
                    location.reload();
                }
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endsection
