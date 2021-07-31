@extends('admin.panel')

@section('page')

    <div class="container pd-v-3">

        <table class="table">
            <thead>
            <tr>
                <th>عنوان کالا</th>
                <th>تصویر</th>
                <th>قیمت</th>
                <th>تعداد</th>
                <th>قیمت نهایی</th>
            </tr>
            </thead>
            <tbody>
            @foreach(Cart::all() as $item)
                @php
                    $type = isset($item['Variety'])?'Variety':'Product';
                    $product = $item[$type];
                @endphp
                <tr>
                    <td>
                        {{$item['title']}}
                        <br>
                        {!! $item['specifications'] !!}
                    </td>
                    <td><img src="{{$item['thumbnail']}}" style="width: 100px" alt=""></td>
                    <td>{{$item['price']}}</td>
                    <td>
                        <select onchange="changeQuantity(event,'{{$item['id']}}')" name="number" id="">
                            @foreach(range(1,$product->inventory) as $num)
                                <option value="{{$num}}" {{$item['quantity'] == $num?'selected':''}}>{{$num}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{$item['price'] * $item['quantity']}}</td>
                    <td>
                        <form method="post" action="{{route('cart.remove.item',['item'=>$item['id']])}}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="x" style="color: red">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @php
            $total = Cart::all()->sum(function ($cart){
                $type = isset($cart['Variety'])?'Variety':'Product';
                return $cart[$type]->basePrice * $cart['quantity'];
            });
        @endphp
        <h3>قیمت کل {{$total}}</h3>
    </div>
@section('script')
    <script>
        function changeQuantity(event, id , cartName = null) {

            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type' : 'application/json'
                }
            })
            //
            $.ajax({
                type : 'POST',
                url : '/cart/quantity/change',
                data : JSON.stringify({
                    id : id ,
                    quantity : event.target.value,
                    // cart : cartName,
                    _method : 'patch'
                }),
                success : function(res) {
                    console.log(res)
                    location.reload();
                }
            });
        }

    </script>
@endsection
@endsection

