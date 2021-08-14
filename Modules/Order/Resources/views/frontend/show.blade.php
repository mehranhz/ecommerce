@extends('frontend.layouts.mobilePage')
@section('content')
    <section style="background-color: #0c0c0ce8;color:#FFFFFF ;margin-top: 2rem;text-align: right;direction: rtl">
        <div class="container pd-v-3">
{{--            <table class="table table-dark table-bordered table-responsive">--}}
{{--                <thead></thead>--}}
{{--                <tbody>--}}
{{--                @foreach($order->items() as $item)--}}
{{--                    @php--}}
{{--                        $type = is_null($item['Variety'])?'Product' : 'Variety';--}}
{{--                    @endphp--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            {{$item['Product']->title}}--}}
{{--                            <br>--}}
{{--                            @if($type == 'Variety')--}}
{{--                                @foreach($item['Variety']->specifications() as $attribute)--}}
{{--                                    {{$attribute[0].' : '.$attribute[1] .' - ' }}--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                        <td><img src="{{$item['Product']->thumbnail}}" style="width: 100px" alt=""></td>--}}
{{--                        <td>{{$item[$type]->basePrice}}</td>--}}
{{--                        <td>{{$item['quantity']}}</td>--}}
{{--                        <td>{{$item[$type]->basePrice * $item['quantity']}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            <h3>قیمت کل {{$order->totalPrice()}}</h3>--}}

                @if(auth()->user()->addresses->count()>0)
                    <h3>انتخاب آدرس</h3>
                    <form action="{{route('order.addAddress',['order'=>$order->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <fieldset>
                                @foreach(auth()->user()->addresses as $address )

                                    <div style="display: flex;border: 1px solid lightgray;padding: 1rem">
                                        <input id="add-{{$address->id}}" name="address_option" type="radio" value="{{$address->id}}">
                                        <div style="padding: 1rem">
                                            <p>{{$address->address}}</p>
                                            <p>{{$address->receiver}}</p>
                                            <p>{{$address->phone}}</p>
                                        </div>
                                    </div>

                                @endforeach
                            </fieldset>
                        </div>
                        <input type="submit" class="btn btn-md btn-success" value="ادامه">
                    </form>
                @endif

            <div style="padding-top: 2rem">
                <h3>افزودن آدرس</h3>
                <form action="{{route('address.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="country">کشور</label>
                        <input type="text" class="form-control" name="country">
                        <label for="province">استان</label>
                        <input type="text" class="form-control" name="province">
                        <label for="city">شهر</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="form-group">
                        <label for="address">آدرس</label>
                        <textarea class="form-control" name="address" id="" cols="30" rows="10" placeholder="آدرس"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="receiver">تحویل گیرنده</label>
                        <input type="text" name="receiver" class="form-control">
                        <label for="phone">تلفن همراه</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">کد پستی</label>
                        <input type="text" name="zipcode" class="form-control">
                    </div>
                    <input type="submit" value="ذخیره آدرس" class="btn btn-md btn-success">
                </form>
            </div>


        </div>
    </section>

@endsection
