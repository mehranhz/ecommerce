@extends('frontend.layouts.mobilePage')
@section('content')
    <div class="container" style="margin-top: 4rem;">
        @foreach($orders as $order)
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
           <div style="display: flex;flex-direction: row-reverse;justify-content: space-between;align-items: center" >
               <div class="overflow-auto" style="display:flex;flex-direction: row-reverse">
                   @foreach($order->items() as $item)
                       <div style="padding:0 .5rem;border-left: 1px solid #777777">
                           <a  href="{{route('product.show',['product'=>$item['Product']->id])}}">
                               <img  src="{{$item['Product']->thumbnail}}" alt="" style="width: 64px;">
                           </a>
                       </div>
                   @endforeach
               </div>
               <span class="clickable" style="font-size: 20px;padding-right: 2rem"><</span>
           </div>
       </div>
        @endforeach
    </div>
@endsection
