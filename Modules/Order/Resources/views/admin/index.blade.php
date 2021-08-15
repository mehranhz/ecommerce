@extends('admin.panel')
@section('page')
    <div class="container pd-v-3">
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
            @foreach($orders as $order)
                <tr>

                    <td>
                        <a href="{{route('admin.orders.show',['order'=>$order->id])}}">
                            {{$order->id}}
                        </a>
                    </td>

                    <td>{{$order->user->name}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->getStatus()}}</td>

                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
