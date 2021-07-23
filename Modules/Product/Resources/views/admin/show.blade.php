@extends('admin.panel')
@section('page')
    <div class="container  pd-v-3 h-100">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">مشخصات اصلی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">نقد و بررسی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">جدول مشخصات</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">


            <div class="tab-pane fade show pd-v-3 active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="product-header pd-v-1   ">

                    <div class="row">
                        <div class="col-xl-8">
                            <h1>عنوان محصول : {{$product->title}}</h1>
                            <h3>قیمت پایه : {{$product->basePrice}}</h3>
                            <h3>تخفیف : {{$product->discount}}%</h3>
                            <h3>
                                قیمت بعد از تخفیف : {{$product->basePrice - ($product->basePrice /100 * $product->discount)}}
                            </h3>
                            <h3>موجودی : {{$product->inventory}}</h3>
                        </div>
                        <div class="col-xl-4">
                            <img src="{{$product->thumbnail}}" alt="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade pd-v-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3>توضیحات کوتاه:</h3>
                <p class="pd-v-1">
                    {{$product->description}}
                </p>
                <hr class="light-hr">
                <h3>نقد و بررسی:</h3>
                <p class="pd-v-1">
                    {!! $product->review !!}
                </p>
            </div>

            <div class="tab-pane fade pd-v-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <table class="table table table-striped table-dark table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <td>مشخصات محصول</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($product->specifications)
                        @foreach($product->specifications as $item)
                            @if(is_array($item) && sizeof($item)==2)
                                <tr>
                                    <td>{{$item[0]}}</td>
                                    <td>{{$item[1]}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>












    </div>

@endsection
