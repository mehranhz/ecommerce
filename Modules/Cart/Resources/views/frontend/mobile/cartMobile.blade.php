@extends('frontend.layouts.mobile.mobilePage')
@section('css')
    <link rel="stylesheet" href="{{asset('css/mobile/cart.css')}}">
@endsection
@section('content')
    <section class="cart-section" id="cart" >
        <cart-component></cart-component>
    </section>

@endsection
@section('scripts')
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>

      {{--cart(--}}
      {{--    {--}}
      {{--        data() {--}}
      {{--            return {--}}
      {{--                cartItems: JSON.parse(JSON.stringify({!! htmlspecialchars_decode(Cart::all()) !!})),--}}
      {{--            }--}}
      {{--        }--}}
      {{--    }--}}
      {{--  );--}}
    </script>

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
