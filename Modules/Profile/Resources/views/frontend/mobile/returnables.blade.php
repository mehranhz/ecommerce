@extends('frontend.layouts.mobile.mobilePage')
@section('content')
    <div class="container" style="margin-top: 4rem;">
        @foreach($returnables as $order)
            <div class="card" style="background-color: black;padding: 1rem;margin-top: 1rem">
                <div style="display: flex;flex-direction: row-reverse;justify-content: space-between;">
                    <span class="clickable" style="font-size: 18px">inf-{{$order->id}}</span>
                    <span style="text-align: right;direction: rtl">  {{$order->price}} تومان </span>
                </div>
                <div class="d-flex" style="justify-content: space-between;align-items: center;flex-direction: row-reverse">
                    <span style="padding: 1rem 0 ;direction: rtl">26 مرداد 1400</span>
                    <span>
                   <a class="clickable" href="{{$order->status=='unpaid'?route('order.payment',['order'=>$order->id]):'#' }}">{{$order->getStatus()}}</a>

               </span>
                </div>
                <div style="display: flex;flex-direction: row-reverse;justify-content: space-between;align-items: flex-end" >
                    <div class="overflow-auto" style="display:flex;flex-direction: column;">
                        <form action="{{route('order.return',['order'=>$order->id])}}" method="post" id="return_{{$order->id}}">
                            @csrf
                            @foreach($order->items() as $item)
                               <div style="display: flex;justify-content: flex-end;align-items: center">
                                    <span style="color: #c8c8c8;font-size: 18px;padding:0 .5rem">
                                        {{$item['Product']->title}}
                                    </span>
                                   <div style="padding:.5rem;">
                                       <a href="{{route('product.show',['product'=>$item['Product']->id])}}">
                                           <img src="{{$item['Product']->thumbnail}}" alt="" style="width: 64px;">
                                       </a>

                                       <input type="checkbox" name="order_{{$order->id}}[]"
                                              value="{{$item['Product']->id}}">
                                   </div>
                               </div>
                            @endforeach
                        </form>
                    </div>

                </div>
                <span onclick="document.getElementById('return_'+{{$order->id}}).submit()" class="clickable" style="font-size: 20px;padding-right: 2rem">ثبت در خواست مرجوعی</span>
            </div>
        @endforeach
    </div>
@endsection
