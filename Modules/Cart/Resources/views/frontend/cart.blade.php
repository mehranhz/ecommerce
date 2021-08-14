@extends('frontend.layouts.page')
@section('content')
    <section class="cart-section" style="min-height: 100vh">
        <div class="container pd-v-3">
            @foreach(Cart::all() as $item)
                @php
                    $type = isset($item['Variety'])?'Variety':'Product';
                    $product = $item[$type];
                @endphp
                <div class="row">
                    <div class="col-6">
                        <img src="{{$item['thumbnail']}}" style="width: 100%" alt="">

                        <div class="d-flex" style="text-align: right;padding-top: 2rem;align-items: center">
                            <select onchange="changeQuantity(event,'{{$item['id']}}')" name="number" id=""
                                    style="color: #222020!important;background-color: #fed332;font-size: 18px;padding:0 .5rem">
                                @foreach(range(1,$product->inventory) as $num)
                                    <option value="{{$num}}"
                                            {{$item['quantity'] == $num?'selected':''}} style="color: #222020!important;">{{$num}}</option>
                                @endforeach
                            </select>

                            <form method="post" action="{{route('cart.remove.item',['item'=>$item['id']])}}">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-sm btn-outline-dark" value="x"
                                       style="color: red !important;font-size: 20px">
                            </form>
                        </div>
                    </div>
                    <div class="col-6" style="text-align: right">
                        <h4>{{$item['title']}}</h4>
                        <span>{!! $item['specifications'] !!}</span>
                        <span style="padding: 0 1rem;font-size: 18px">{{$item['price'] * $item['quantity']}}</span>
                    </div>
                </div>

            @endforeach
            @php
                $total = Cart::all()->sum(function ($cart){
                    $type = isset($cart['Variety'])?'Variety':'Product';
                    return $cart[$type]->basePrice * $cart['quantity'];
                });
            @endphp
            @if(Cart::all()->count()>0)
{{--                <div--}}
{{--                    style="display: flex;width: 100%!important;position: fixed; bottom: 2.5rem;padding: 1rem 0;right: 0;background-color:black ">--}}
{{--                    <div style="padding: 0 1rem;margin: 0 1rem">--}}
{{--                        <form action="{{route('cart.register')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="submit" class="btn" value="تکمیل فرایند خرید"--}}
{{--                                   style="background-color: #fed332;color: #222020!important;width: 150px;font-size: 18px;">--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <span>مبلغ قابل پرداخت</span>--}}
{{--                        <span><h3>{{$total}}</h3></span>--}}
{{--                    </div>--}}
{{--                </div>--}}

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













