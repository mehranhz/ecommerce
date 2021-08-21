@extends('frontend.layouts.mobile.mobilePage')
@section('content')
<div class="container" style="margin-top: 5rem">
    <div class="card" style="background-color: black;padding:1rem ">
        <div class="user-info" style="display: flex;flex-direction: row-reverse;align-items: center">
            <img src="{{asset('img/mehran.jpg')}}" alt="" style="width: 60px;border-radius: 50px">
            <div style="text-align: right;padding: 0 1rem">
                <p style="color: #ffffff;font-size: 20px;font-weight: 600;margin: 0 !important;">مهران حسین زاده</p>
                <p>09360808510</p>
            </div>
        </div>
        <div class="wallet-info" style="display: flex;justify-content: space-between;flex-direction: row-reverse;padding: .5rem 0;border-bottom: 1px solid #777777">
            <div style="text-align: right">
                <p style="font-size: 20px;margin: 0!important;">
                    کیف پول
                </p>
                <a href="" class="clickable">افزایش موجودی</a>
            </div>
            <div>
                <span style="font-size: 18px"> موجودی : 0 تومان </span>
            </div>
        </div>
        <div class="wallet-info" style="display: flex;justify-content: space-between;flex-direction: row-reverse;padding: .5rem 0;border-bottom: 1px solid #777777">
            <div style="text-align: right">
                <p style="font-size: 18px;margin: 0!important;">
                    اینفرنو کلاب
                </p>

            </div>
            <div>
                <span style="font-size: 18px"> امتیاز : 150 </span>
            </div>
        </div>

        <div style="display: flex;justify-content: space-evenly;flex-direction: row-reverse;padding: 1rem 0">
            <button class="btn btn-outline-warning btn-md"> تغییر رمز عبور</button>
            <form action="{{route('logout')}}" method="post" >
                @csrf
                <input type="submit"class="btn btn-outline-warning btn-md" value="خروج از حساب">
            </form>
        </div>
    </div>

    <div class="card" style="background-color: black;padding:1rem;margin-top: 1rem ;">
        <div class="card" style="background-color: black;display: flex;flex-direction: column;justify-content: center;align-items: center">
            <h4 style="color: #ffffff">دعوت دوستان</h4>
            <a href="" class="clickable">
                <h3>به اینفرنو</h3>
            </a>
        </div>
    </div>
    <div class="card" style="background-color: black;padding:1rem;margin-top: 1rem; margin-bottom: 5rem !important;">
        <div style="display: flex;justify-content: space-between;flex-direction: row-reverse;align-items: center;border-bottom: 1px solid #777777;padding:1rem .5rem;font-size: 18px">
            <a href="{{route('profile.myOrders')}}" class="clickable">سفارش های من</a>
            <a href="" class="clickable"> < </a>
        </div>
        <div style="display: flex;justify-content: space-between;flex-direction: row-reverse;align-items: center;border-bottom: 1px solid #777777;padding:1rem .5rem;font-size: 18px">
            <a href="{{route('profile.orderReturn')}}" class="clickable"> درخواست مرجوعی </a>
            <a href="" class="clickable"> < </a>
        </div>
        <div style="display: flex;justify-content: space-between;flex-direction: row-reverse;align-items: center;border-bottom: 1px solid #777777;padding:1rem .5rem;font-size: 18px">
            <a href="" class="clickable"> لیست ها </a>
            <a href="" class="clickable"> < </a>
        </div>
        <div style="display: flex;justify-content: space-between;flex-direction: row-reverse;align-items: center;border-bottom: 1px solid #777777;padding:1rem .5rem;font-size: 18px">
            <a href="" class="clickable"> نقد و نظرات </a>
            <a href="" class="clickable"> < </a>
        </div>
        <div style="display: flex;justify-content: space-between;flex-direction: row-reverse;align-items: center;border-bottom: 1px solid #777777;padding:1rem .5rem;font-size: 18px">
            <a href="" class="clickable"> کارت های هدیه من </a>
            <a href="" class="clickable"> < </a>
        </div>
        <div style="display: flex;justify-content: space-between;flex-direction: row-reverse;align-items: center;border-bottom: 1px solid #777777;padding:1rem .5rem;font-size: 18px">
            <a href="" class="clickable"> آدرس های من </a>
            <a href="" class="clickable"> < </a>
        </div>
        <div style="display: flex;justify-content: space-between;flex-direction: row-reverse;align-items: center;border-bottom: 1px solid #777777;padding:1rem .5rem;font-size: 18px">
            <a href="" class="clickable">پیام های من</a>
            <a href="" class="clickable"> < </a>
        </div>
        <div style="display: flex;justify-content: space-between;flex-direction: row-reverse;align-items: center;border-bottom: 1px solid #777777;padding:1rem .5rem;font-size: 18px">
            <a href="" class="clickable"> اطلاعات شخصی من </a>
            <a href="" class="clickable"> < </a>
        </div>
    </div>
</div>
@endsection
