@extends('frontend.layouts.mobilePage')
@section('content')
    <section class="cart-section" style="min-height: 100vh ;padding-bottom: 5rem">
        <div class="container pd-v-3">
            @foreach(Cart::all() as $item)
                @php

                    $type = isset($item['Variety'])?'Variety':'Product';
                    $product = $item[$type];
                @endphp
            <div style="padding: 1rem 0 ;background-color: black;border-radius:5px;margin: .5rem 0;box-shadow: 0px 0px 6px 2px #1f1f1f;
 ">
                <div class="row" >
                    <div class="col-7">
                        <img src="{{$item['thumbnail']}}" class="responsive-image" alt="">


                    </div>
                    <div class="col-5" style="text-align: right">
                        <div style="display: flex;flex-direction: column;height: 100%">
                            <h4 style="font-size: 16px">{{$item['title']}}</h4>
                            @if($type=='Variety')
                                @foreach($product->specifications() as $specification)
                                    <span> {{$specification[0]}} :  {{$specification[1]}}</span>
                                @endforeach
                            @endif
                            <div class="d-flex" style="align-items: center;padding: .5rem 0">
                                <img src="{{asset('images/store.png')}}" alt="" style="width: 18px">
                                <span style="font-size: 14px;padding:0 .5rem">Inferno</span>
                            </div>
                            <div class="d-flex" style="align-items: center;padding: .5rem 0">
                                <img src="{{asset('images/truck.png')}}" alt="" style="width: 18px">
                                <span style="font-size: 14px;padding:0 .5rem">ارسال توسط اینفرنو</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
            </div>

                    <div class="col-12">
                        <div class="d-flex space-between" style="text-align: right;padding-top: 2rem;align-items: center">
                            <div class="d-flex space-between"
                                 style="border: 1px solid #434343;border-radius: 5px;padding: .5rem 0;align-items: center">
                                <div style="padding: 0 .5rem">
                                    <form action="{{route('cart.add',['id'=>$product->id])}}" method="post"
                                          id="add-to-cart-{{$product->id}}">
                                        @csrf
                                        <input type="hidden" name="type" value="{{$type}}">
                                        @if($product->inventory > $item['quantity'])
                                            <img src="{{asset('images/plus.png')}}" class="add-to-cart-btn"
                                                 style="width: 18px;cursor: pointer " alt=""
                                                 onclick='document.getElementById("add-to-cart-{{$product->id}}").submit()'>
                                        @else
                                        @endif
                                    </form>
                                </div>
                                <span style="padding: 0 .5rem;font-size: 16px">{{$item['quantity']}}</span>
                                <div style="padding: 0 .5rem">
                                    @if($item['quantity']==1)
                                        <form method="post" action="{{route('cart.remove.item',['item'=>$item['id']])}}"
                                              id="remove-from-cart-{{$product->id}}">
                                            @method('DELETE')
                                            @csrf
                                            <img src="{{asset('images/trash-can.png')}}"
                                                 onclick='document.getElementById("remove-from-cart-{{$product->id}}").submit()'
                                                 style="width: 18px;" alt="">
                                        </form>
                                    @else
                                        <form method="post" id="minus-item-{{$product->id}}" action="{{route('cart.add',['id'=>$product->id])}}">
                                            <input type="hidden" name="type" value="{{$type}}">
                                            <input type="hidden" name="number" value="{{-1}}">
                                            @csrf
                                            <img src="{{asset('images/minus.png')}}"
                                                 onclick='document.getElementById("minus-item-{{$product->id}}").submit()'
                                                 style="width: 18px;" alt="">
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <div style="padding: .5rem 0">
                                @if($product->discount > 0)
                                    <p style="font-size: 16px;color: #ef394e!important;margin: 0;">تخفیف {{($product->basePrice/100) * $product->discount}}</p>
                                @endif
                                <p style="padding: 0 1rem;font-size: 18px;margin: 0">{{($product->basePrice - (($product->basePrice/100)*$product->discount)) * $item['quantity']}}</p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            @php
                $total = Cart::all()->sum(function ($cart){
                    $type = isset($cart['Variety'])?'Variety':'Product';
                    return ($cart[$type]->basePrice-(($cart[$type]->basePrice/100)*$cart[$type]->discount))  * $cart['quantity'];
                });
            @endphp
            @if(Cart::all()->count()>0)
                <div
                    style="display: flex;width: 100%!important;position: fixed; bottom: 2.5rem;padding: 1rem 0;right: 0;background-color:black ">
                    <div style="padding: 0 1rem;margin: 0 1rem">
                        <form action="{{route('order.register')}}" method="post">
                            @csrf
                            <input type="submit" class="btn" value="تکمیل فرایند خرید"
                                   style="background-color: #fed332;color: #222020!important;width: 150px;font-size: 18px;">
                        </form>
                    </div>
                    <div>
                        <span>مبلغ قابل پرداخت</span>
                        <span><h3>{{$total}}</h3></span>
                    </div>
                </div>

            @else
                <h2 style="text-align: center"> سبدخرید شما خالی است </h2>
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













