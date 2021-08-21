@extends('admin.panel')
@section('page')
    <div class="container pd-v-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>id</td>
                <td>محصولات</td>
                <td>تاریخ</td>
{{--                <td>مبلغ</td>--}}
                <td>وضعیت</td>
            </tr>
            </thead>
            <tbody>
            @foreach($returns as $return)
                <tr>

                    <td>
                        <a href="{{route('admin.orders.show',['order'=>$return->order->id])}}">
                            {{$return->id}}
                        </a>
                    </td>

                    <td>
                        @foreach($return->products as $product)
                            {{$product->title}}-
                        @endforeach
                    </td>
                    <td>{{$return->created_at}}</td>
{{--                    <td>{{$order->price}}</td>--}}
                    <td>
                       <div class="d-flex space-between">
                           <span class="pd-h-1">
                               {{$return->getStatus()}}
                           </span>
                           <form action="{{route('admin.orders.changeReturnStatus',['return'=>$return->id])}}" method="post">
                               @csrf
                               @method('PATCH')

                               <div class="from-group">
                                   <select class="" name="status" id="" style="outline: 1px solid black;">
                                       <option value="waiting" {{$return->status=='waiting'?'selected':''}}>در انتظار پرداخت</option>
                                       <option value="accepted" {{$return->status=='accepted'?'selected':''}}>قبول شد</option>
                                       <option value="rejected" {{$return->status=='rejected'?'selected':''}}>رد شد</option>
                                       <option value="received" {{$return->status=='received'?'selected':''}}>دریافت شد</option>
                                       <option value="posted" {{$return->status=='posted'?'selected':''}}>توسط مشتری ارسال شد</option>
                                       <option value="refunded" {{$return->status=='refunded'?'selected':''}}>وجه بازگشت داده شد</option>
                                       <option value="outdated" {{$return->status=='outdated'?'selected':''}}>از تاریخ درخواست گذشته است</option>
                                   </select>

                                   <input type="submit" class="btn btn-sm btn-outline-success" value="اعمال">
                               </div>
                           </form>

                       </div>
                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
