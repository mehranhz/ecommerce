@extends('frontend.layouts.page')
@section('content')
    <div class="container pd-v-3">
        <div class="row">
            <div class="col-lg-6">
{{--                <h3>تحویل سفارش به : {{$order->address->receiver}}</h3>--}}
                <h3>محل تحویل سفارش : {{$order->address->address}}</h3>
            </div>
            <div class="col-lg-6">
                <h3>مبلغ سفارش : {{$order->price}}</h3>
                <form action="{{route('payment.add')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$order->id}}" name="order">
                    <input type="submit" class="btn btn-md btn-success" value="پرداخت">
                </form>
            </div>
        </div>
        <div class="card pd-v-1 pd-h-1" style="margin-top: 1rem">
            <h4>انتخاب شیوه پرداخت</h4>
            <span>شارژ کیف پول</span>
            <span>پرداخت با کارت بانکی</span>
        </div>
        <div class="card pd-v-1 pd-h-1" style="margin-top: 1rem">
            <h4>اعمال کد تخفیف</h4>
            <div class="btn-group" style="direction: ltr">
                <input style="direction: rtl" class="form-control" type="text" placeholder="کد تخفیف">
                <input type="submit" class="btn btn-success" value="اعمال">
            </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    @include('sweet::alert')
@endsection
