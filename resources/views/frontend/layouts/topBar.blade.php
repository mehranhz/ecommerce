<div class="top-bar" style="position: relative">
    <div class="row flex-row-reverse" style="padding: 1rem 0;background-color: black">
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ">
            <a href="{{route('index')}}">
                <h2 class="clickable">Knife Hub</h2>
            </a>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6  ">
            <input type="text" style="width: 100%;text-align: right;padding: 5px;border-radius: 5px" placeholder="جستجو محصول">
        </div>
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 ">
            <div class="d-flex" style="align-items: end;justify-content: center">
                <a href="{{route('cart.index')}}" style="padding: 0 1rem"  ><img src="{{asset('images/cart-2.png')}}" alt=""></a>
                <a href="{{route('profile')}}" style="padding: 0 1rem"><img src="{{asset('images/user-2.png')}}" alt=""></a>
            </div>
        </div>
    </div>
</div>
