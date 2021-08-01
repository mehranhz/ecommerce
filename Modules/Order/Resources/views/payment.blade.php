@extends('admin.panel')
@section('page')
    <div class="container pd-v-3">
        <div class="row">
            <div class="col-lg-6">
                <h3>تحویل سفارش به : {{$order->address->receiver}}</h3>
                <h3>محل تحویل سفارش : {{$order->address->address}}</h3>
            </div>
            <div class="col-lg-6">
                <h3>مبلغ سفارش : {{$order->price}}</h3>
                <a href="" class="btn btn-md btn-success">پرداخت</a>
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

@endsection
