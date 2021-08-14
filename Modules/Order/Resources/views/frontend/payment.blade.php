@extends('frontend.layouts.mobilePage')
@section('content')
<section style="background-color: #0c0c0ce8;min-height: 100vh;color: #FFFFFF;text-align: right;padding-top: 2rem">
    <div class="container pd-v-3">
        <div class="row">
            <div class="col-lg-6">
                {{--                <h3>تحویل سفارش به : {{$order->address->receiver}}</h3>--}}
                <h3>محل تحویل سفارش : {{$order->address->address}}</h3>
            </div>
            <div class="col-lg-6" style="padding-top: 1rem">
                <h3>مبلغ سفارش : {{$order->price}}</h3>
                <form action="{{route('payment.add')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$order->id}}" name="order">
                    <input type="submit" class="btn btn-md btn-success" value="پرداخت">
                </form>
            </div>
        </div>
        <div class="card pd-v-1 pd-h-1" style="margin-top: 1rem;color: black">
            <h4 style="padding: .5rem">انتخاب شیوه پرداخت</h4>
         <div class="d-flex" style="justify-content: flex-end;align-items: center;padding:.5rem  1rem">
             <span style="padding:0 .5rem ">شارژ کیف پول</span>
             <input type="checkbox">
         </div>
            <div class="d-flex" style="justify-content: flex-end;align-items: center;padding: .5rem 1rem">
                <span style="padding:0 .5rem ">پرداخت با کارت</span>
                <input type="checkbox">
            </div>
        </div>





        <div class="card pd-v-1 pd-h-1" style="margin-top: 1rem">
            <h4 style="color: black;padding: 1rem">اعمال کد تخفیف</h4>
            <div class="btn-group" style="direction: ltr;padding: 1rem">
                <input style="direction: rtl" class="form-control" type="text" placeholder="کد تخفیف">
                <input type="submit" class="btn btn-success" value="اعمال">
            </div>
        </div>
    </div>
</section>
@endsection
