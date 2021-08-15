@extends('admin.panel')
@section('page')
    <div class="container pd-v-3">
        <h3>مشخصات کلی</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>id</td>
                <td>کاربر</td>
                <td>تاریخ</td>
                <td>مبلغ</td>
                <td>وضعیت</td>
            </tr>
            </thead>
            <tbody>
            <tr>

                <td>
                    <a href="{{route('admin.orders.show',['order'=>$order->id])}}">
                        {{$order->id}}
                    </a>
                </td>

                <td>{{$order->user->name}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->price}}</td>
                <td>
                    <form action="{{route('admin.orders.update',['order'=>$order->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <select name="status" id="" style="outline: 1px solid black;">
                                <option value="unpaid" {{$order->status=='unpaid'?'selected':''}}>در انتظار پرداخت</option>
                                <option value="paid" {{$order->status=='paid'?'selected':''}}>در انتظار بررسی</option>
                                <option value="preparation" {{$order->status=='preparation'?'selected':''}}>در حال آماده سازی</option>
                                <option value="posted" {{$order->status=='posted'?'selected':''}}>ارسال شده</option>
                                <option value="received" {{$order->status=='received'?'selected':''}}>تحویل داده شده</option>
                                <option value="canceled" {{$order->status=='canceled'?'selected':''}}>لغو شده</option>
                            </select>
                            <input type="submit" value="اعمال" class="btn btn-sm btn-outline-success">
                        </div>

                    </form>
                </td>

            </tr>
            </tbody>
        </table>
        <h3>مشخصات تحویل گیرنده</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>کشور</td>
                <td>استان</td>
                <td>شهر</td>
                <td>آدرس</td>
                <td>تلفن</td>
                <td>گیرنده</td>
                <td>کد پستی</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$order->address->country}}</td>
                <td>{{$order->address->province}}</td>
                <td>{{$order->address->city}}</td>
                <td>{{$order->address->address}}</td>
                <td>{{$order->address->phone}}</td>
                <td>{{$order->address->receiver}}</td>
                <td>{{$order->address->zipcode}}</td>
            </tr>
            </tbody>
        </table>
        <h3>محصولات</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>id</td>
                <td>نام محصول</td>
                <td>تصویر</td>
                <td>تعداد</td>
            </tr>
            </thead>
            <tbody>
            @foreach($order->items() as $item)
                <tr>
                    <td>{{$item['Product']->id}}</td>
                    <td>{{$item['Product']->title}}</td>
                    <td><img src="{{$item['Product']->thumbnail}}"  style="width: 100px" alt=""></td>
                    <td>{{$item['quantity']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
